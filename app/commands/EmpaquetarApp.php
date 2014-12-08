<?php

use Illuminate\Console\Command;

class EmpaquetarApp extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'empaquetar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que empaqueta la aplicación y la envia al servidor de kentron.';

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
        try {
            if (Configuracion::get('ambiente') != "DESARROLLO") {
                $this->error("Solo se pueden empaquetar aplicaciones en desarrollo.");
                return;
            }
            $this->info("Si continua se comprimira la aplicacion y se enviara a los servidores de kentron.");
            if ($this->confirm("Desea continuar (yes|no)?", false)) {
                File::delete(base_path('paquete.zip'));
                File::delete(base_path('respaldo.zip'));
                File::delete(base_path('actualizacion.zip'));
                $this->info("Comprimiendo aplicacion...");
                $dir = base_path();
                $rutaFinal = base_path('paquete.zip');
                $zip = new \Chumper\Zipper\Zipper();
                $zip->make($rutaFinal);
                $zip->add($dir);
                
                $zip->close();
                if (file_exists($rutaFinal)) {
                    $this->info("Se respaldo correctamente la aplicacion");
                    $this->info("Buscando informacion del proyecto..");
                    $curl = AyudanteCurl::getProyecto();
                    $idProyecto = $curl->respuestaObj->proyecto->ID;
                    $this->info("Nombre del proyecto: " . $curl->respuestaObj->proyecto->NOMBPROYECTO);
                    $this->info("Descripcion del proyecto: " . $curl->respuestaObj->proyecto->DESCPROYECTO);
                    if ($this->confirm("Desea enviar la actualizacion? (yes|no)")) {
                        $version = AyudanteCurl::getUltimaVersion("PRUEBA");
                        if (isset($version->VERSION)) {
                            $this->info("La ultima version es: " . $version->VERSION);
                            $this->info("La version es: " . ($version->ESTABLE == TRUE) ? "Estable" : "De prueba");
                            $this->info("La version actual de este proyecto es: " . Configuracion::get('version'));
                        } else {
                            $this->info($version);
                        }
                        do {
                            $ver = $this->ask("Indique la version de esta actualizacion: ");
                            $comentario = $this->ask("Indique un comentario acerca de la actualizacion: ");
                            do {
                                $estable = $this->ask("La version es estable: (yes|no).");
                            } while ($estable != "yes" && $estable != "no");
                            if ($estable == "yes") {
                                $estable = true;
                            } else {
                                $estable = false;
                            }
                            $seenvio = AyudanteCurl::enviarVersion($idProyecto, $ver, $comentario, $estable);
                        } while ($seenvio === false);
                        Configuracion::set('version', $ver);
                        $this->info("Se envio la actualizacion correctamente");
                        File::delete($rutaFinal);
                    } else {
                        File::delete($rutaFinal);
                    }
                } else {
                    $this->error("Ocurrio un error al tratar de respaldar la aplicacion");
                }
            }
        } catch (CurlException $e) {
            File::delete(base_path('paquete.zip'));
            $this->error($e->mensaje);
        }
    }

    public function anadirArchivo($zipper, $dir) {
        $archivos = $zipper->add(array_diff(scandir($dir), array('..', '.', 'vendor', 'nbproject', 'workbench')));
    }

}
