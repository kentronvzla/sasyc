<?php

class ActualizacionesController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getIndex($mensaje = "") {
        $data['mensaje'] = $mensaje;
        try {
            $curl = AyudanteCurl::getVersiones();
            $data['versiones'] = $curl->respuestaObj->versiones;
            $data['version'] = AyudanteCurl::getUltimaVersion();
        } catch (CurlException $e) {
            $data['versiones'] = array();
            $data['version'] = null;
            $data['mensaje'] = $e->mensaje;
        }
        return View::make('actualizacion.actualizaciones', $data);
    }

    public function getInstalar($paso, $version) {
        $data['version'] = $version;
        ini_set('max_execution_time', '999');
        $data['paso'] = $paso;
        switch ($paso) {
            case 1:
                try {
                    $curl = new AyudanteCurl();
                    $curl->descargarArchivo(Configuracion::get('urlactualizacion') . 'archivo?CLAVEPROYECTO=' . Configuracion::get('claveproyecto') . '&IDVERSION=' . $version, base_path('actualizacion.zip'));
                    $path = base_path('actualizacion.zip');
                    $ext = base_path() . '/';
                    $zip = new ZipArchive();
                    $res = $zip->open($path);
                    if ($res === true) {
                        $data["correcto"] = true;
                        $data['mensaje'] = "Se descargó la actualización correctamente. Presione continuar para respaldar la versión actual.";
                    } elseif ($res == ZipArchive::ER_NOZIP) {
                        $data["correcto"] = false;
                        $data['mensaje'] = "El archivo de actualización esta dañado. Intente la descarga nuevamente.";
                    } else {
                        $data["correcto"] = false;
                        $data['mensaje'] = "Ha ocurrido un error inesperado con la descarga del archivo, intente descargar nuevamente si el error persiste contactar a kentron.";
                    }
                } catch (CurlException $e) {
                    $data['mensaje'] = $e->mensaje;
                }
                return View::make('actualizacion.paso', $data);
            case 2:
                $zip = new \Chumper\Zipper\Zipper();
                $dir = base_path();
                $rutaFinal = base_path('respaldo.zip');
                File::delete($rutaFinal);
                $zip->make($rutaFinal);
                $zip->add($dir);
                $zip->close();
                if (file_exists($rutaFinal)) {
                    $data['correcto'] = true;
                    $data['mensaje'] = "Se respaldo correctamente la aplicación, presione continuar para instalar la actualización";
                } else {
                    $data['correcto'] = false;
                    $data['mensaje'] = "Ocurrio un error al tratar de respaldar la aplicación";
                }
                return View::make('actualizacion.paso', $data);
            case 3:
                $path = base_path('actualizacion.zip');
                $ext = base_path() . '/';
                $zip = new ZipArchive();
                $res = $zip->open($path);
                if ($res === true) {
                    File::deleteDirectory(app_path('ayudantes'));
                    File::deleteDirectory(app_path('commands'));
                    File::deleteDirectory(app_path('lang'));
                    File::deleteDirectory(app_path('start'));
                    File::deleteDirectory(app_path('tests'));
                    File::deleteDirectory(app_path('database'));
                    File::deleteDirectory(app_path('models'));
                    File::deleteDirectory(app_path('controllers'));
                    File::deleteDirectory(app_path('views'));
                    for ($i = 0; $i < $zip->numFiles; $i++) {
                        if (strpos($zip->getNameIndex($i), "config/database.php") === false) {
                            File::delete($ext . $zip->getNameIndex($i));
                            $zip->extractTo($ext, array($zip->getNameIndex($i)));
                        }
                    }
                    $zip->close();
                    $data['correcto'] = true;
                    $data['mensaje'] = "Se actualizo correctamente la aplicación, presione continuar para actualizar el framework de la aplicación.";
                    File::delete($path);
                } elseif ($res == ZipArchive::ER_NOZIP) {
                    $data['correcto'] = false;
                    $data['mensaje'] = "El archivo de actualización esta dañado. Porfavor contactar a kentron.";
                } else {
                    $data['correcto'] = false;
                    $data['mensaje'] = "Ha ocurrido un error inesperado tratando de descomprimir la actualización.";
                }
                return View::make('actualizacion.paso', $data);
            case 4:
                try {
                    chdir(base_path());
                    $data['mensaje'] = shell_exec("composer update");
                    $data['mensaje'] = shell_exec("php composer.phar update");
                    $data['mensaje'] .= shell_exec("php artisan migrate --force");
                    $data['mensaje'] = str_replace('\n', '<br>', $data['mensaje']);
                    $data['mensaje'].="Se actualizo el framework de la aplicación correctamente.";
                    $curl = AyudanteCurl::getVersion($version);
                    $data['correcto'] = true;
                    Configuracion::set('version', $curl->respuestaObj->version->VERSION);
                } catch (CurlException $e) {
                    $data['correcto'] = false;
                    $data['mensaje'] = $e->mensaje;
                }
                return View::make('actualizacion.paso', $data);
            case 5:
                $data['mensaje'] = "Se completo el proceso de actualizacion correctamente.";
                $data['correcto'] = true;
                return View::make('actualizacion.paso', $data);
        }
    }

    public static function verificarActualizaciones() {
        try {
            $mensaje = "";
            $version = AyudanteCurl::getUltimaVersion();
            $verInstalada = Configuracion::get('version');
            if (is_object($version) && $version->VERSION > $verInstalada) {
                $mensaje = "El sistema tiene una nueva actualización, disponible desde el: " . $version->updated_at;
            } else if (!is_object($version)) {
                $mensaje = $version;
            }
        } catch (CurlException $e) {
            $mensaje = $e->mensaje;
        }
        return $mensaje;
    }

    public function getRespaldar() {
        Artisan::call('db:backup');
    }

}
