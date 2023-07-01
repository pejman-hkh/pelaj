<?php

namespace Modules\Shop\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Support\Facades\Redirect;

#[Middleware([ \App\Http\Middleware\ShareViewSite::class ])]
class TestController extends \App\Http\Controllers\Controller
{
    #[Get('shop', name : 'shop')]
    public function index( Request $request ): View
    {
        return view('Site::contact', [
            'user' => $request->user()
        ]);
    }
 
}