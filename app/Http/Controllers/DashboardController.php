<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;

#[Middleware(['auth', 'verified'])]
class DashboardController extends Controller
{
    #[Get('/dashboard', name : 'dashboard')]
    public function index( Request $request ): View
    {
        return view('dashboard');
    }
}