<?php

namespace Administracion;

abstract class TablasBaseController extends \BaseController {

    protected $collectionName;
    protected $modelName;
    protected $folder;
    protected $folderUrlFormat;
    protected static $eagerLoading = [];

    public function __construct() {
        $this->collectionName = null;
        $this->modelName = null;
        $this->folder = null;
        $this->folderUrlFormat = null;
        parent::__construct();
    }

    public function getIndex() {
        if (count(static::$eagerLoading) == 0) {
            $data[$this->getCollectionName()] = $this->executeFunction('orderBy', 'id')->get();
        } else {
            $data[$this->getCollectionName()] = $this->executeFunction('with', static::$eagerLoading[0]);
            if (isset(static::$eagerLoading[1])) {
                $data[$this->getCollectionName()] = $data[$this->getCollectionName()]->with(static::$eagerLoading[1]);
            }
            $data[$this->getCollectionName()] = $data[$this->getCollectionName()]->orderBy('id')->get();
        }
        return \View::make($this->getFolder(), $data);
    }

    public function postIndex() {
        $var = $this->executeFunction('findOrNew', \Input::get('id'));
        $var->fill(\Input::all());
        if ($var->save()) {
            $this->afterPostIndex($var);
            return \Redirect::to($this->getFolder(false))
                            ->with('mensaje', 'Se guardo el ' .
                                    call_user_func(array($var, 'getPrettyName')) .
                                    ' correctamente.');
        } else {
            return \Redirect::back()->withInput()
                            ->withErrors($var->getErrors());
        }
    }

    public function deleteIndex() {
        $var = $this->executeFunction('find', \Input::get('id'));
        if ($var->delete()) {
            if (\Request::ajax()) {
                return \Response::json(array('mensaje' => 'Se borró el ' .
                            call_user_func(array($var, 'getPrettyName')) . ' correctamente.'));
            }
            return \Redirect::to($this->getFolder(false))
                            ->with('mensaje', 'Se borró el ' .
                                    call_user_func(array($var, 'getPrettyName')) . ' correctamente.');
        }
        if (\Request::ajax()) {
            return \Response::json(array('errores' => $var->getErrors()));
        }
        return Redirect::to($this->getFolder(false))->withErrors($var->getErrors());
    }
    

    public function getModificar($id = 0) {
        $data[$this->getVarName()] = $this->executeFunction('findOrNew', $id);
        return \View::make($this->getFolder() . 'form', $data);
    }

    public function getFolder($formatFolder = true) {
        if (is_null($this->folder)) {
            $folder = str_replace('Controller', '', get_class($this));
            $aux = "";
            $arr = explode("\\", $folder);
            foreach ($arr as $section) {
                $aux .=lcfirst($section) . '.';
            }
            $aux = substr($aux, 0, -1);
            $this->folder = $aux;
            $this->folderUrlFormat = camel_case(str_replace('.', '/', $aux));
        }
        if ($formatFolder) {
            return $this->folder;
        } else {
            return $this->folderUrlFormat;
        }
    }

    public function getVarName() {
        return lcfirst($this->getModelName());
    }

    public function getModelName() {
        if (is_null($this->modelName)) {
            $className = class_basename(get_class($this));
            $className = str_replace('Controller', '', $className);
            $className = str_singular_spanish($className);
            $this->modelName = ucfirst($className);
        }
        return $this->modelName;
    }

    public function getCollectionName() {
        if (is_null($this->collectionName)) {
            $modelName = $this->getModelName();
            $this->collectionName = lcfirst(str_plural_spanish($modelName));
        }
        return $this->collectionName;
    }

    private function executeFunction($function, $param = null) {
        $modelName = $this->getModelName();
        if ($param !== null) {
            return call_user_func(array($modelName, $function), $param);
        } else {
            return call_user_func(array($modelName, $function));
        }
    }

    protected function afterPostIndex($variable) {
        
    }

}
