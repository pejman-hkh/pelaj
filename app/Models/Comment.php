<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    public static $listExceptColumns = [
        'note',
        'answer',
    ];

    function getStatusTitleAttribute() {
        return $this->statusArray[ $this->status ];
    }

    function getStatusArrayAttribute() {
        return [
            __('Hidden'),
            __('Published'),
        ];
    }

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

}
