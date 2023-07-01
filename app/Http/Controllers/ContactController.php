<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Support\Facades\Redirect;

#[Middleware([ \App\Http\Middleware\ShareViewSite::class ])]
class ContactController extends Controller
{
    #[Get('contact', name : 'contact')]
    public function index( Request $request ): View
    {
        return view('Site::contact', [
            'user' => $request->user(),
            'contact' => \App\Models\Post::where('url', 'contact')->first(),
        ]);
    }
    #[Post('contact')]
    public function store( StoreContactRequest $request )
    {
        $contact = new \App\Models\Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->note = $request->note;
        $contact->status = 0;
        $contact->user_id = (int)$request->user()->id;
        $contact->save();


        return Redirect::to( route('contact') );  
    }
}
