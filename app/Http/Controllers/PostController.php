<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

use Spatie\RouteAttributes\Attributes\Resource;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
#[Middleware("auth")]
#[Resource(
    resource: 'posts', 
    shallow: true, 
    names: 'post',
)]
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //$post = Post::create(['title' => 'test', 'userid' => 1, 'note' => 'test' ]);
        return view('post.index', [ 'posts' => Post::paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): RedirectResponse
    {

        $post = new Post();
        $post->title = $request->title;
        $post->note = $request->note;
        $post->url = $request->url;
        $post->user_id = (int)$request->user()->id;

        $post->save();

        return Redirect::route('post.edit', $post->id)->with('status', 'post-updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.create', ['post' => $post ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->note = $request->note;
        $post->url = $request->url;

        $post->save();

        return Redirect::route('post.edit', $post->id)->with('status', 'post-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return Redirect::route('post.index')->with('status', 'post-deleted');
    }
}
