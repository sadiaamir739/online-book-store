<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class InjectChatbot
{
    public function handle(Request $request, Closure $next): SymfonyResponse
    {
        $response = $next($request);

        if (! $response instanceof Response || ! str_contains((string) $response->headers->get('content-type'), 'text/html')) {
            return $response;
        }

        $content = $response->getContent();
        $widget = view('partials.chatbot')->render();

        if (is_string($content) && str_contains($content, '</body>')) {
            $response->setContent(str_replace('</body>', $widget.'</body>', $content));
        } elseif (is_string($content)) {
            $response->setContent($content.$widget);
        }

        return $response;
    }
}
