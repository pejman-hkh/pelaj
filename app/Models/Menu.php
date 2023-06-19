<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function getDateAttribute() {
        return new \Carbon\Carbon( $this->created_at );
    }

}
