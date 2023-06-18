<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class TestController extends Controller
{
    //
    function index( Request $request ) {
        $path = substr( $request->getPathInfo(), 1 );
        $post = Post::where('url', $path)->first();
        if( @$post->id ) {
            return view('post', ['post' => $post ]);
        }
        abort(404);
    }
}
