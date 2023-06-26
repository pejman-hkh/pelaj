<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Models\Manager;

use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Put;
use Spatie\RouteAttributes\Attributes\Post;
use Illuminate\View\View;
use Spatie\RouteAttributes\Attributes\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

#[Middleware(["auth", \App\Http\Middleware\Manager::class] )]
class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    #[Get('/manager/index/{model?}')]
    public function index( String $model, Request $request )
    {
        if( in_array( $model, Manager::getModelNames() ) ) {
            $modelClass = '\App\Models\\'.$model;
            if( $task = $request->get('task') ) {

                if( method_exists( $modelClass, $task ) )
                    $modelClass::$task();

                return Redirect::to( url('/').'/manager/index/'.$model )->with('status', $model.'-task-'.$task );  
            }

            $nmodel = new $modelClass;

            $columns = Manager::getColumns( $model );

            $query = $modelClass::select("*");

            foreach( $columns as $column ) {
                if( $request->{$column[0]} ) {
                    if ( in_array( $column[1], ['string', 'text', 'longtext' ] )) {
                        $query->where( $column[0], "like", '%'.($request->{$column[0]}).'%');
                    } else {
                        $query->where( $column[0], $request->{$column[0]});
                    }
                }
            }



            if( isset( $modelClass::$listExceptColumns ) ) foreach( $columns as $key => $column ) {
                if( in_array( $column[0], @$modelClass::$listExceptColumns ) ) {
                    unset( $columns[ $key ]);
                }
            }


            $lists = $query->paginate(5);

            return view('manager.index', [ 'listTasks' => $nmodel->listTasks?:[], 'editorColumns' => [], 'modelName' => $model, 'model' => $nmodel, 'columns' => $columns, 'lists' => $lists ] );
        } else {
            abort( 404 );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    #[Get('/manager/create/{model?}')]
    public function create( String $model ): View
    {
        if( in_array( $model, Manager::getModelNames() ) ) {
            $modelClass = '\App\Models\\'.$model;
            $nmodel = new $modelClass;
    
            $columns = Manager::getColumns( $model );

            if( isset( $modelClass::$formExceptColumns ) ) foreach( $columns as $key => $column ) {
                if( in_array( $column[0], @$modelClass::$formExceptColumns ) ) {
                    unset( $columns[ $key ]);
                }
            }

            return view('manager.create', [ 'editorColumns' => isset($modelClass::$formEditorColumns)?@$modelClass::$formEditorColumns:[], 'modelName' => $model, 'columns' => $columns, 'model' =>  $nmodel ] );
        } else {
            abort( 404 );
        }     
    }

    /**
     * Store a newly created resource in storage.
     */
    #[Post('/manager/create/{model?}')]
    public function store(Request $request, string $model )
    {
        if( ! in_array( $model, Manager::getModelNames() ) ) {
            abort(404);
            return;
        }

        $modelClass = '\App\Models\\'.$model;
        $nmodel = new $modelClass;
        if( method_exists( $nmodel, 'formStore') ) {
            $nmodel->formStore( $request );
            return Redirect::to( url('/').'/manager/index/'.$model )->with('status', $model.'-updated');    
        } else {        
            $columns = Manager::getColumns( $model );

            $hasPriority = false;
            foreach( $columns as $column ) {
                if( $column[0] == 'priority' ) {
                    $hasPriority = true;
                }
                if( $column[0] == 'created_at' || $columns[0] == 'updated_at' ) continue;
                $cl = $column[0];
                if( $column[1] == 'integer' || $column[1] == 'boolean' ) {
                    echo( $column[0] );
                    $nmodel->$cl = (int)$request->$cl;
                } else {
                    $nmodel->$cl = $request->$cl;
                }
            }

            $nmodel->user_id = (int)$request->user()->id;

            $nmodel->save();
            $id = $nmodel->id;
            if( $hasPriority ) {
                $nmodel->priority = $id;
                $nmodel->save();
            }

            return Redirect::to( url('/').'/manager/edit/'.$model.'/'.$id )->with('status', $model.'-updated');    
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    #[Get('/manager/edit/{model?}/{id?}')]
    public function edit(String $model, $id ): View
    {
        if( in_array( $model, Manager::getModelNames() ) ) {
            $columns = Manager::getColumns( $model );
            $modelClass = '\App\Models\\'.$model;
            if( isset( $modelClass::$formExceptColumns ) ) foreach( $columns as $key => $column ) {
                if( in_array( $column[0], @$modelClass::$formExceptColumns ) ) {
                    unset( $columns[ $key ]);
                }
            }

            $nmodel = $modelClass::findOrFail( $id );
      
            return view('manager.create', [ 'editorColumns' => isset($modelClass::$formEditorColumns)?@$modelClass::$formEditorColumns:[], 'modelName' => $model, 'columns' => $columns, 'model' =>  $nmodel ] );
        } else {
            abort( 404 );
        }        
    }

    /**
     * Update the specified resource in storage.
     */
    #[Put('/manager/edit/{model?}/{id?}')]
    public function update( Request $request, String $model, $id)
    {

        if( ! in_array( $model, Manager::getModelNames() ) ) {
            abort(404);
            return;
        }

        $modelClass = '\App\Models\\'.$model;
        $nmodel = $modelClass::findOrFail( $id );
        $columns = Manager::getColumns( $model );

        foreach( $columns as $column ) {
            if( $column[0] == 'created_at' || $columns[0] == 'updated_at' ) continue;
            $cl = $column[0];
            $nmodel->$cl = $request->$cl;
        }

        $nmodel->user_id = (int)$request->user()->id;

        $nmodel->save();

        return Redirect::to( url('/').'/manager/edit/'.$model.'/'.$id )->with('status', $model.'-updated');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
