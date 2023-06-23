<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\View;

class ShareViewSite
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    public function handle(Request $request, Closure $next): Response
    {

        View::addNamespace('Site', config('view.paths')[0].'/theme/'.config('view.site') );

        $menus = \App\Models\Menu::all();
        $menuPosition = [];
        foreach( $menus as $menu ) {
            $menuPosition[ $menu->position ][] = $menu;
        }

        $catid = 0;
        if( $request->route()->uri == 'cat/{id}' ){
            $catid = $request->route()->parameters['id'];
        }

        $this->view->share( [
            'menus' => $menuPosition,
            'cats' => \App\Models\Cat::where("cat_id", $catid )->get(),
            'configs' => \App\Models\Config::keyPair()
        ]);        

        return $next($request);
    }
}
