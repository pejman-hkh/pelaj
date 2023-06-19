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
        'position',
        'url',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    function getDateAttribute() {
        return new \Carbon\Carbon( $this->created_at );
    }

    function getLinkAttribute() {
        return url('/').'/'.$this->url;
    }
    
    function getPositionsAttribute() {
        $place = 1;
        return [
            (object)[ 'val' => $place++, 'title' => __('Top')],
            (object)[ 'val' => $place++, 'title' => __('TopCenter')],
            (object)[ 'val' => $place++, 'title' => __('Right')],
            (object)[ 'val' => $place++, 'title' => __('Left')],
            (object)[ 'val' => $place++, 'title' => __('Bottom')],
            (object)[ 'val' => $place++, 'title' => __('Footer')],
        ];
    }

}
