<?php
$glob = glob( base_path('modules/*/Http/Controllers') );
$dirs = [];
foreach( $glob as $g ) {
    $e = explode('/', $g );
    $dirs[ $g ] = ['namespace' => 'Modules\\'.$e[ count( $e ) - 3 ].'\Http\Controllers\\', 'middleware' => 'web' ];
}

return [
    /*
     *  Automatic registration of routes will only happen if this setting is `true`
     */
    'enabled' => true,

    /*
     * Controllers in these directories that have routing attributes
     * will automatically be registered.
     *
     * Optionally, you can specify group configuration by using key/values
     */
    'directories' => array_merge( $dirs, [

        app_path('Http/Controllers') => [
            'middleware' => ['web']
        ],

        /*
        app_path('Http/Controllers/Api') => [
           'prefix' => 'api',
           'middleware' => 'api',
        ],
        */
    ]),

    /**
     * This middleware will be applied to all routes.
     */
    'middleware' => [
        \Illuminate\Routing\Middleware\SubstituteBindings::class
    ]
];
