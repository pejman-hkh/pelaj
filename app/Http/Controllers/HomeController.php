<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Get;
use App\Models\Post;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([ \App\Http\Middleware\ShareViewSite::class ])]
class HomeController extends Controller
{
    #[Get('/', name : 'home')]
    public function index( Request $request ): View
    {
        return view('Site::welcome', [ 'posts' => Post::where('status', 1)->orderBy('id', 'desc')->paginate(5) ]);
    }

    #[Get('/cat/{id}')]
    public function cat( Request $request, $catid ): View 
    {
        return view('Site::welcome', ['posts' => Post::where('status', 1)->where('cat_id', $catid )->orderBy('id', 'desc')->paginate(5)  ]);
    }
}
