<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'user_id',
        'note',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function getDateAttribute() {
        return new \Carbon\Carbon( $this->created_at );
    }

    function getLinkAttribute() {
        return $this->url?url('/').'/'.$this->url:url('/').'/post/'.$this->id;
    }
}
