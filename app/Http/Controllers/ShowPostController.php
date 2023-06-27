<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Spatie\RouteAttributes\Attributes\Where;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Where('any', '.*')]
#[Middleware([\App\Http\Middleware\ShareViewSite::class])]
class ShowPostController extends Controller
{

    #[Get('post/{id}')]
    function show( Request $request, $id ) {
        $post = Post::where('id', $id )->first();
        if( @$post->id ) {
            return view('Site::post', ['post' => $post ]);
        }
        abort(404);
    }
        
    #[Get('/{any}')]
    function index( Request $request ) {
        $path = substr( $request->getPathInfo(), 1 );
        $post = Post::where('url', $path)->first();
        
        if( @$post->id ) {
            return view('Site::post', ['post' => $post ]);
        }
        abort(404);
    }

}
