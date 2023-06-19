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
    #[Get('/{any}')]
    function index( Request $request ) {
        $path = substr( $request->getPathInfo(), 1 );

        if( substr( $path, 0, 4 ) == 'post' )
            $post = Post::where('id', (int)substr( $path, 5 ) )->first();
        else
            $post = Post::where('url', $path)->first();
        
        if( @$post->id ) {
            return view('Site::post', ['post' => $post ]);
        }
        abort(404);
    }
}
