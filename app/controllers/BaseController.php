<?php

class BaseController extends Controller {

    public function __construct() {
        $this->beforeFilter('auth');
        $this->beforeFilter('verificarPermiso');
    }

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}
