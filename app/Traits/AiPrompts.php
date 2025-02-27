<?php

namespace App\Traits;

trait AiPrompts
{
    public function summaryPrompt(): string
    {
        return "Deliver a concise summary of no more than 100 words, focusing on the key points and essential details from either the provided article or URL. If it's a URL, please retrieve and summarize its content.";
    }
}
