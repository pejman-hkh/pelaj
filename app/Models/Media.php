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
            foreach ($files as $file) {
                $extension =  $file->clientExtension();
                $config = Config::$keyPair;
                $allowedExtensions = explode(",",$config->allowedExtensions );

                if( in_array( $extension, $allowedExtensions ) ) {
                    $media = new Media;
                    $media->file = $name = $file->getClientOriginalName();

                    $media->save();
                    $file->move(public_path() . '/media/', $name );
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
