<?php

namespace SchemaHelper;

/**
 * SchemaHelper\Table
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\SchemaHelper\\Column[] $columns
 */
class Table extends \Eloquent {
    
    protected $table = "information_schema.tables";
    
    public static function getTablesCurrentDatabase() {
        return static::whereTableSchema('public')->select('table_name')->get();
    }
    /**
     * 
     * @return type
     */
    public function columns(){
        return $this->hasMany('SchemaHelper\\Column','table_name','table_name');
    }
}
