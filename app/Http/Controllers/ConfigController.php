<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConfigRequest;
use App\Http\Requests\UpdateConfigRequest;
use App\Models\Config;
use Spatie\RouteAttributes\Attributes\Resource;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

#[Middleware("auth")]
#[Resource(
    resource: 'configs', 
    shallow: true, 
    names: 'config',
)]
class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('config.index', [ 'configs' => Config::paginate(5) ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('config.create', ['config' => new Config ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConfigRequest $request)
    {
        $config = new Config();
        $config->key = $request->key;
        $config->val = $request->val;
        $config->user_id = (int)$request->user()->id;

        $config->save();

        return Redirect::route('config.edit', $config->id)->with('status', 'config-updated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Config $config)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Config $config)
    {
        return view('config.create', ['config' => $config ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigRequest $request, Config $config)
    {
  
        $config->key = $request->key;
        $config->val = $request->val;
        $config->user_id = (int)$request->user()->id;
        
        $config->save();

        return Redirect::route('config.edit', $config->id)->with('status', 'config-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Config $config)
    {
        $config->delete();
        return Redirect::route('config.index')->with('status', 'config-deleted');
    }
}
