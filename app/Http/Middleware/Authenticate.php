<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Models\Manager;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function handle( $request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);
        
        view()->share( 'models',  $models = Manager::getModelNames() );

        $menu = [];
        foreach( $models as $model ) {
            if( strstr( $model, '_' ) ) {
                $e = explode('_', $model );
                $menu[$e[0]][] = $model;
            } else {
                $menu[ $model ] = $model;
            }
        }

        view()->share( 'modelsMenu',  $menu );
        return $next($request);
    }

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
