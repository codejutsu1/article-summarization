<?php

use App\Services\Article\Actions\ChatgptAction;
use App\Services\Article\Actions\CreateModelAction;
use App\Services\Article\ArticleService;

it('summarizes text and creates a model', function () {
    $text = 'This is a long text that needs summarizing.';
    $summary = 'Shortened text.';

    $chatgptAction = Mockery::mock(ChatgptAction::class);
    $createModelAction = Mockery::mock(CreateModelAction::class);

    app()->instance(ChatgptAction::class, $chatgptAction);
    app()->instance(CreateModelAction::class, $createModelAction);

    $articleService = app(ArticleService::class);

    $chatgptAction->shouldReceive('execute')
        ->once()
        ->with($text)
        ->andReturn($summary);

    $createModelAction->shouldReceive('execute')
        ->once()
        ->with($text, $summary)
        ->andReturnUsing(function ($text, $summary) {
            return \App\Models\Article::create([
                'text' => $text,
                'summary' => $summary,
            ]);
        });

    $articleService->summarize($text);

    $this->assertDatabaseHas('articles', [
        'text' => $text,
        'summary' => $summary,
    ]);
});
