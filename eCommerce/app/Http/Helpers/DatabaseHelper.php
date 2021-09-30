<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

abstract class DatabaseHelper
{
    public static function getLastTableId($tableName)
    {
        $table = DB::table($tableName)->latest('id');
        $tableExists = $table->exists();
        $lastId = $tableExists ? $table->first()->id : 1;

        return $lastId++;
    }
}
