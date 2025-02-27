<?php

namespace App\Services\Article\Actions;

use App\Traits\AiPrompts;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class ChatgptAction
{
    use AiPrompts;

    public function execute(string $data): string
    {
        $prompt = $this->summaryPrompt();

        $token = config('openai.secret_key');

        $response = Http::withToken($token)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini-2024-07-18',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => $prompt,
                ],
                [
                    'role' => 'user',
                    'content' => $data,
                ],
            ],
            'response_format' => [
                'type' => 'json_schema',
                'json_schema' => [
                    'name' => 'summary',
                    'schema' => [
                        'type' => 'object',
                        'properties' => [
                            'summary' => [
                                'type' => 'string',
                            ],
                        ],
                        'required' => [
                            'summary',
                        ],
                        'additionalProperties' => false,
                    ],
                    'strict' => true,
                ],
            ],
        ]);

        $summary = Arr::get($response->json(), 'choices.0.message.content', null);

        $response = json_decode($summary);

        return $response->summary;
    }
}
