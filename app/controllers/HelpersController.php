<?php

class HelpersController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getEdad() {
        try {
            $cb_date = Carbon::createFromFormat('d/m/Y', Input::get('fecha_nacimiento'));
            return Response::json(['edad' => $cb_date->age]);
        } catch (InvalidArgumentException $e) {
            return Response::json(['edad' => '']);
        }
    }

}
