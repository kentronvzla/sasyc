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
            //generate columns array string..
            $columnsString = "";
            $columns = $tabla->columns()->whereNotIn('column_name', static::$common_hidden)->get();
            foreach ($columns as $column) {
                $columnsString.="'{$column->column_name}', ";
            }
            $baseString = str_replace('@columns@', $columnsString, $baseString);

            //generate pretty fields string.
            $prettyString = "";
            foreach ($columns as $column) {
                $prettyString.="'{$column->column_name}'=>'{$column->column_name}', " . PHP_EOL;
            }
            $baseString = str_replace('@pretty_fields@', $prettyString, $baseString);

            //generate rules..
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
            $baseString = str_replace('@rules@', $rules, $baseString);
            File::put(app_path('modelos_generados/' . $class_name . '.php'), $baseString);
        }
        $this->info("Generación terminada.");
    }

}
