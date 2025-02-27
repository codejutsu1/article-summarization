<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function __construct(
        string $message,
    ) {
        parent::__construct(
            message: $message
        );
    }
}
