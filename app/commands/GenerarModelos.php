<?php

use Illuminate\Console\Command;

class GenerarModelos extends Command {

    private static $common_hidden = ['id', 'created_at', 'updated_at'];

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generar:modelos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que genera los modelos a partir de la base de datos.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire() {
        //borrramos generaciones previas
        File::deleteDirectory(app_path('modelos_generados'));
        //creamos el directorio en app..
        File::makeDirectory(app_path('modelos_generados'), 777);
        $tablas = SchemaHelper\Table::getTablesCurrentDatabase();
        $this->info("Buscando tablas..");
        foreach ($tablas as $tabla) {
            $this->info("Generando Modelo de la tabla: " . $tabla->table_name);
            //class name
            $class_name = ucfirst(camel_case(str_singular_spanish($tabla->table_name)));
            $baseString = File::get(app_path('models/Schema/Template.txt'));
            //replace class name..
            $baseString = str_replace('@class_name@', $class_name, $baseString);
            //replace table name..
            $baseString = str_replace('@table_name@', $tabla->table_name, $baseString);
            //replace pretty name..
            $baseString = str_replace('@pretty_name@', $tabla->table_name, $baseString);
            //find columns.
            $columns = $tabla->columns()->whereNotIn('column_name', static::$common_hidden)->get();
            //generate fillable
            $baseString = str_replace('@fillable@', $this->generarFillable($columns), $baseString);
            //generate pretty fields string.
            $baseString = str_replace('@pretty_fields@', $this->generarPrettyFields($columns), $baseString);
            //generate rules..
            $baseString = str_replace('@rules@', $this->genenarRules($columns), $baseString);
            //generate belongs to..
            $baseString = str_replace('@belongs_to@', $this->generarBelongsTo($columns), $baseString);
            File::put(app_path('modelos_generados/' . $class_name . '.php'), $baseString);
        }
        $this->info("Generación terminada.");
    }

    private function generarFillable($columns) {
        $columnsString = "";
        foreach ($columns as $column) {
            $columnsString.="'{$column->column_name}', ";
        }
        return $columnsString;
    }

    private function generarPrettyFields($columns) {
        $prettyString = "";
        foreach ($columns as $column) {
            $prettyString.="'{$column->column_name}'=>'{$column->column_name}', " . PHP_EOL;
        }
        return $prettyString;
    }

    private function genenarRules($columns) {
        $rules = "";
        foreach ($columns as $column) {
            $rules.="'{$column->column_name}'=>'";
            //if not null?.
            if ($column->is_nullable == "NO") {
                $rules .="required|";
            }
            //datatype..
            switch ($column->data_type) {
                case "integer":
                case "smallint":
                case "bigint":
                    $rules .="integer|";
                    break;
            }
            $rules = rtrim($rules, '|');
            $rules.="', " . PHP_EOL;
        }
        return $rules;
    }

    private function generarBelongsTo($columns) {
        $belongs = "";
        foreach ($columns as $column) {
            //siguiendo los estandares de laravel..
            if (ends_with($column->column_name, '_id')) {
                $func = File::get(app_path('models/Schema/BelongsTo.txt'));
                $model_name = ucfirst(camel_case(str_replace('_id', '', $column->column_name)));
                //replace model name
                $func = str_replace('@model_name@', $model_name, $func);
                //replace func name
                $func = str_replace('@function_name@', lcfirst($model_name), $func);
                $belongs.=$func;
            }
        }
        return $belongs;
    }

    private function generarHasMany($tables) {

    }

}
