<?php

namespace App\Http\Helpers\Database;

use Illuminate\Support\Facades\DB;

abstract class Table
{
    private static $lastId = 1;

    public static function getLastId($tableName)
    {
        $table = DB::table($tableName)->latest('id');
        $tableExists = $table->exists();
        self::$lastId = $tableExists ? $table->first()->id : self::$lastId;

        return self::$lastId++;
    }
}
