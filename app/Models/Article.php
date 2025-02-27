<?php

namespace App\Models;

use App\Enums\ArticleStatus;
use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use HasUuidColumn;

    protected $fillable = [
        'text',
        'summary',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => ArticleStatus::class,
        ];
    }
}
