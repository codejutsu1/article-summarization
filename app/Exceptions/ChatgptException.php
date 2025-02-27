<?php

namespace App\Exceptions;

class ChatgptException extends CustomException
{
    public static function httpError(): self
    {
        return new self(
            message: 'Failed to fetch data from API'
        );
    }
}
