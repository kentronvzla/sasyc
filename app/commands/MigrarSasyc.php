<?php

use Illuminate\Console\Command;

class GenerarControladores extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generar:controladores';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que genera los controladores de configuracion a partir de los modelos';

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
        $namespace = "Tablas";
        //borrramos generaciones previas
        File::deleteDirectory(app_path('contraladores_generados'));
        //creamos el directorio en app..
        File::makeDirectory(app_path('contraladores_generados'), 777);
        $this->info("Buscando modelos");
        $models = File::files(app_path('models'));
        foreach ($models as $model) {
            if (File::isFile($model)) {
                $baseText = File::get(app_path('controllers/templates/Template.txt'));
                $controllerName = str_plural_spanish(str_replace('.php', '', basename($model))) . 'Controller';
                $this->info("Generando controller: " . $controllerName);
                //replace class name..
                $baseText = str_replace('@class_name@', $controllerName, $baseText);
                //replace namespace..
                $baseText = str_replace('@namespace@', $namespace, $baseText);
                File::put(app_path('contraladores_generados/' . $controllerName . '.php'), $baseText);
            }
        }
    }

}
