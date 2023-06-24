<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cat extends Model
{
    use HasFactory;
    
    public static $formExceptColumns = [
        'user_id',
    ];

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    function getLinkAttribute() {
        return url('/').'/cat/'.$this->id;
    }

    function cat(): BelongsTo {
        return $this->belongsTo(Cat::class);
    }

    public function getListTitleAttribute() {
        return $this->title;
    }

    function getCatidArrayAttribute() {
        $cats = Cat::all();
        $ret = [];
        foreach( $cats as $cat ) {
            $ret[ $cat->id ] = $cat->title;
        }

        return $ret;
    }

}
