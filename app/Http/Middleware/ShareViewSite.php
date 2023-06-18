<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Support\ViewErrorBag;

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
        $this->view->share(
            'menu', ['test']
        );        

        $this->view->share(
            'config', ['config']
        );
        return $next($request);
    }
}
