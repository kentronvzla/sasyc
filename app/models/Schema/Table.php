<?php

namespace SchemaHelper;

class Table extends \Eloquent {
    
    protected $table = "information_schema.tables";
    
    public static function getTablesCurrentDatabase() {
        return static::whereTableSchema('public')->select('table_name')->get();
    }
    
    public function columns(){
        return $this->hasMany('SchemaHelper\\Column','table_name','table_name');
    }
}
