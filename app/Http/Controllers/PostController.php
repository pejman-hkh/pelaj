<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

use Spatie\RouteAttributes\Attributes\Resource;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Middleware;

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
        return view('post.index', [ 'posts' => Post::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
