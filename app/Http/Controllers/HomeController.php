<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Get;
use App\Models\Post;

class HomeController extends Controller
{
    #[Get('/')]
    public function index( Request $request ): View
    {
        return view('welcome', [ 'posts' => Post::paginate(5) ]);
    }
}