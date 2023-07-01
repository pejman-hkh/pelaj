<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Manager extends Model
{
    use HasFactory;


    public static function getColumns( $modelClass ) {
        //$modelClass = '\App\Models\\'.$model;
        $nmodel = new $modelClass;
        $tableName = $nmodel->getTable();
        $dbName = env('DB_DATABASE', 'forge');
  
        //in laravel there is not method for get columns with ORDINAL_POSITION priority so i use this that should change for work with another databases ....
        if( env('DB_CONNECTION') == 'sqlite' ) {
            $columns = \DB::select("PRAGMA table_info($tableName)" );
            $ret = [];
            foreach( $columns as $column ) {
                if( $column->name == 'id' )
                    continue;
 
                $type = $column->type;
                if( $column->type == 'varchar' ) {
                    $type = 'string';
                } else if( $column->type == 'INTEGER' ) {
                    $type = 'integer';
                } else if( $column->type == 'TEXT' ) {
                    $type = 'text';
                }

                $ret[] = [ $column->name, $type, $column->type ];
            }

            return $ret;
        } else {

            $columns = \DB::select("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = ? and table_schema = ? order by ORDINAL_POSITION asc", [$tableName, $dbName ]);

            $ret = [];
            foreach( $columns as $column ) {
                $ret[] = [ $column->COLUMN_NAME, Schema::getColumnType($tableName, $column->COLUMN_NAME ), $column->DATA_TYPE ];
            }
        }
        return $ret;
    }

    public static function getModelNames(): array
    {
        $path = app_path('Models') . '/*.php';
        $ret = collect(glob($path))->map(function ($file) { 
            $model = basename($file, '.php'); 
            if( $model === 'Manager' ) return ''; 
            return $model; 
        })->toArray();

        $priority = ['Menu', 'Post', 'Cat', 'Comment', 'Contact' ];

        $modulesModels = collect(glob( base_path('modules/*/App/Models/*.php') ))->map( function( $file ){ $e = explode( '/', $file ); $ret = $e[count($e)-4].'_'.basename( $file, '.php'); return $ret; })->toArray();
 
        return array_unique( array_merge(  $priority, $ret, $modulesModels ) );
    }
}
