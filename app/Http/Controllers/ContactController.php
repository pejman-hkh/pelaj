<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware([ \App\Http\Middleware\ShareViewSite::class ])]
class ContactController extends Controller
{
    #[Get('contact')]
    public function index( Request $request ): View
    {
        return view('Site::contact', [
            'user' => $request->user()
        ]);
    }
}
