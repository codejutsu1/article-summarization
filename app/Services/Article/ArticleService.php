<?php

namespace App\Services\Article;

use App\Services\Article\Actions\ChatgptAction;
use App\Services\Article\Actions\CreateModelAction;

class ArticleService
{
    public function __construct(
        protected ChatgptAction $chatgptAction,
        protected CreateModelAction $createModelAction,
    ) {}

    public function summarize(string $text): void
    {
        $summary = $this->chatgptAction->execute(data: $text);

        $this->createModelAction->execute(data: $text, summary: $summary);
    }
}
