<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Manager extends Model
{
    use HasFactory;


    public static function getColumns( $model ) {
        $modelClass = '\App\Models\\'.$model;
        $nmodel = new $modelClass;
        $tableName = $nmodel->getTable();
        $dbName = env('DB_DATABASE', 'forge');
  
        $columns = \DB::select("SELECT COLUMN_NAME, DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = ? and table_schema = ? order by ORDINAL_POSITION asc", [$tableName, $dbName ]);
        $ret = [];
        foreach( $columns as $column ) {
            $ret[] = [ $column->COLUMN_NAME, Schema::getColumnType($tableName, $column->COLUMN_NAME ), $column->DATA_TYPE ];
        }
        return $ret;
    }

    public static function getModelNames(): array
    {
        $path = app_path('Models') . '/*.php';
        $ret = collect(glob($path))->map(function ($file) { $model = basename($file, '.php'); if( $model !== 'Manager' ) return $model; })->toArray();

        return $ret;
    }


}
