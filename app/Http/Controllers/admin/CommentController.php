<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Spatie\RouteAttributes\Attributes\Resource;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

#[Middleware("auth")]
#[Resource(
    resource: 'comments', 
    shallow: true, 
    names: 'comment',
)]
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('comment.index', [ 'comments' => Comment::paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create', ['comment' => new Comment ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $comment = new Comment();
        $comment->title = $request->title;
        $comment->url = $request->url;
        $comment->position = $request->position;
        $comment->user_id = (int)$request->user()->id;

        $comment->save();

        return Redirect::route('comment.edit', $comment->id)->with('status', 'comment-updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comment.create', ['comment' => $comment ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
  
        $comment->title = $request->title;
        $comment->url = $request->url;
        $comment->position = $request->position;

        $comment->save();

        return Redirect::route('comment.edit', $comment->id)->with('status', 'comment-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return Redirect::route('comment.index')->with('status', 'comment-deleted');
    }
}
