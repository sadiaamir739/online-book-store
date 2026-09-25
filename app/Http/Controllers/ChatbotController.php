<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function message(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
            'history' => ['sometimes', 'array', 'max:12'],
            'history.*.role' => ['required', 'in:user,model'],
            'history.*.text' => ['required', 'string', 'max:2000'],
        ]);

        $apiKey = config('services.gemini.key');

        if (! $apiKey) {
            return response()->json([
                'message' => 'The book assistant is not configured yet. Please try again later.',
            ], 503);
        }

        $contents = collect($validated['history'] ?? [])
            ->map(fn (array $item) => [
                'role' => $item['role'],
                'parts' => [['text' => $item['text']]],
            ])
            ->push([
                'role' => 'user',
                'parts' => [['text' => $validated['message']]],
            ])
            ->values()
            ->all();

        try {
            $model = config('services.gemini.model', 'gemini-flash-latest');

            $response = Http::timeout(30)
                ->retry(2, 500, throw: false)
                ->post('https://generativelanguage.googleapis.com/v1beta/models/'.$model.':generateContent?key='.urlencode($apiKey), [
                    'system_instruction' => [
                        'parts' => [[
                            'text' => 'You are the friendly Online Book Store assistant. Help visitors discover books, stories, poems, categories, and reading features. Be concise, warm, and useful. Do not claim to access private orders, accounts, or inventory that was not provided. If asked something unrelated to books or this store, politely redirect the conversation.',
                        ]],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'maxOutputTokens' => 500,
                    ],
                ]);

            if ($response->failed()) {
                Log::warning('Gemini chatbot request failed.', [
                    'status' => $response->status(),
                    'body' => $response->json('error.message'),
                ]);

                return response()->json([
                    'message' => 'I am having trouble connecting right now. Please try again in a moment.',
                ], 502);
            }

            $message = $response->json('candidates.0.content.parts.0.text');

            if (! is_string($message) || trim($message) === '') {
                return response()->json([
                    'message' => 'I could not find an answer just now. Please ask me another way.',
                ], 502);
            }

            return response()->json(['message' => trim($message)]);
        } catch (\Throwable $exception) {
            Log::error('Gemini chatbot exception.', [
                'exception' => get_class($exception),
                'message' => 'The Gemini request could not be completed.',
            ]);

            return response()->json([
                'message' => 'The assistant is temporarily unavailable. Please try again shortly.',
            ], 502);
        }
    }
}
