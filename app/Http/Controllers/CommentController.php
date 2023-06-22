<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Support\Facades\Redirect;

#[Middleware([ \App\Http\Middleware\ShareViewSite::class ])]
class CommentController extends Controller
{
    #[Post('comment')]
    public function store( Request $request )
    {
        $comment = new \App\Models\Comment;
        $comment->post_id = $request->postid;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->note = $request->note;
        $comment->user_id = (int)$request->user()->id;
        $comment->save();

        $post = \App\Models\Post::findOrFail( $request->postid );

        return Redirect::to( $post->link );  
    }
}
