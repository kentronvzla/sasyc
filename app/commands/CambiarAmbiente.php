<?php

use Illuminate\Console\Command;

class CambiarAmbiente extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'ambiente';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando que cambia el ambiente de una aplicacion';

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
        $ambiente = $this->ask("DESARROLLO, PRUEBA, PRODUCCION? ");
        Configuracion::set('ambiente', $ambiente);
        $this->info("Se cambio el ambiente correctamente a $ambiente");
    }

}
