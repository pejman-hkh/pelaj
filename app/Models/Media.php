<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Media extends Model
{
    use HasFactory;

    function formStore( Request $request ) {

        $files = $request->file('file');

        if($request->hasFile('file'))
        {
            $config = Config::keyPair();
            foreach ($files as $file) {
                $extension =  $file->clientExtension();
                $allowedExtensions = explode(",",$config->allowedExtensions );

                if( in_array( $extension, $allowedExtensions ) ) {
                    $dir = public_path() . '/media/';
                    $name = $file->getClientOriginalName();
                    if( file_exists( $dir.$name ) ) {
                        continue;
                    }
                    
                    $media = new Media;
                    $media->file = $name;
                    $media->save();
                    $file->move( $dir, $name );
                }
            }
        }
    }

    public $listDisableEdit = true;

    function getLinkAttribute() {
        return url('/').'/media/'.$this->file;
    }

    function getFileTitleAttribute() {
        return ['<a href="'.$this->link.'" target="_blank">'.$this->file.'</a>'];
    }
}
