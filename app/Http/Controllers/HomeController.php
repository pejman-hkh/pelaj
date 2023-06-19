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
        return view('welcome', [ 'posts' => Post::paginate(5) ]);
    }
}
