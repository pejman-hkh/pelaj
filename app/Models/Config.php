<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Config extends Model
{
    use HasFactory;

    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    
    public static function keyPair() {
        $configs = Config::all();
        $ret = [];
        foreach( $configs as $config ) {
            $ret[ $config->key ] = $config->val;
        }

        return (object) $ret;
    }
}
