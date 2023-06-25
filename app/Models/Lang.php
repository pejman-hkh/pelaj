<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    use HasFactory;

    function generateJsonFile() {
        $this->generate('en');
        $this->generate('fa');
    }    
    
    function generate( $lang = 'en' ) {
        $langs = Lang::all();
        $file = base_path('lang').'/'.$lang.'.json';
 
        $json = json_decode( file_get_contents( $file ), 1 );

        if( count( $langs ) == count( $json ) ) {
            return;
        }

        foreach( $langs as $lang ) {
            if( ! @$json[ $lang->key ] )
                $json[ $lang->key ] = $lang->key;
        }

        file_put_contents( $file, json_encode( $json, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE ) );
    }
}
