<?php

namespace App\Services\Article\Actions;

use App\Models\Article;

class CreateModelAction
{
    public function execute(string $data, string $summary): void
    {
        Article::create([
            'text' => $data,
            'summary' => $summary,
        ]);
    }
}
