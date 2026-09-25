<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request as HttpRequest;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ChatbotTest extends TestCase
{
    use RefreshDatabase;

    public function test_chatbot_returns_gemini_response(): void
    {
        config(['services.gemini.key' => 'test-key']);
        config(['services.gemini.model' => 'gemini-flash-latest']);

        Http::fake([
            'generativelanguage.googleapis.com/*' => Http::response([
                'candidates' => [[
                    'content' => [
                        'parts' => [['text' => 'Try a mystery story with a clever twist.']],
                    ],
                ]],
            ]),
        ]);

        $response = $this->postJson(route('chatbot.message'), [
            'message' => 'Recommend me something mysterious.',
            'history' => [],
        ]);

        $response
            ->assertOk()
            ->assertJson(['message' => 'Try a mystery story with a clever twist.']);

        Http::assertSent(function (HttpRequest $request) {
            $data = $request->data();

            return str_contains($request->url(), 'generativelanguage.googleapis.com')
                && str_contains($request->url(), 'key=test-key')
                && $data['contents'][0]['parts'][0]['text'] === 'Recommend me something mysterious.';
        });
    }

    public function test_chatbot_widget_is_injected_into_html_pages(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('data-chatbot', false)
            ->assertSee('Book Store Assistant');
    }
}
