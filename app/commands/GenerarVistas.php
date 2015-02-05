<?php

use Illuminate\Console\Command;

class GenerarVistas extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generar:vistas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que genera las vistas a partir de los modelos';

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
        File::deleteDirectory(app_path('vistas_generadas'));
        //creamos el directorio en app..
        File::makeDirectory(app_path('vistas_generadas'), 777);
        $this->info("Buscando modelos");
        $models = File::files(app_path('models'));
        foreach ($models as $model) {
            if (File::isFile($model)) {
                $modelName = str_replace('.php', '', basename($model));
                if ($modelName != 'BaseModel') {
                    $modelInstance = new $modelName;
                    $collectionName = lcfirst(str_plural_spanish($modelName));
                    $baseText = File::get(app_path('controllers/templates/View.txt'));
                    $baseText = str_replace('@model_name@', $modelName, $baseText);
                    $baseText = str_replace('@pretty_name@', $modelInstance->getPrettyName(), $baseText);
                    $baseText = str_replace('@collection_name@', $collectionName, $baseText);

                    $basePath = app_path('vistas_generadas');
                    $this->info("Generando vista: " . $collectionName);
                    //File::put($basePath . '/' . $collectionName . '.blade.php', $baseText);

                    $baseText = File::get(app_path('controllers/templates/Form.txt'));
                    $baseText = str_replace('@var_name@', lcfirst($modelName), $baseText);
                    $baseText = str_replace('@pretty_name@', $modelInstance->getPrettyName(), $baseText);
                    $baseText = str_replace('@collection_name@', $collectionName, $baseText);

                    $fieldsStr = "";
                    $fields = $modelInstance->getFillable();
                    foreach ($fields as $key) {
                        $fieldsStr.="{{Form::btInput($" . lcfirst($modelName) . ", '" . $key . "', 6)}}" . PHP_EOL;
                    }
                    $baseText = str_replace('@fields@', $fieldsStr, $baseText);
                    $basePath = app_path('vistas_generadas');
                    $this->info("Generando formulario: " . $collectionName);
                    File::put($basePath . '/' . $collectionName . 'form.blade.php', $baseText);
                }
            }
        }
    }

}
