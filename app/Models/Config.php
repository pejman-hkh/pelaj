<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    public static function keyPair() {
        $configs = Config::all();
        $ret = [];
        foreach( $configs as $config ) {
            $ret[ $config->key ] = $config->val;
        }

        return (object) $ret;
    }
}
