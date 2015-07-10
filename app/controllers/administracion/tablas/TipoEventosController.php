<?php

namespace Administracion\Tablas;

/**
 * Description of TipoEventosControllerController
 *
 * @author Dhaily Robles
 */
class TipoEventosController extends \Administracion\TablasBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function getIndex() {
        $data['tipoeventos'] = \Oracle\TipoEvento::all();
        $picks = \Defeventosasyc::select('tipo_doc')->get();
        foreach ($picks as $todo) {
            $arreglo = $todo['attributes'];
            $primero = array_shift($arreglo);
            $prueba[] = $primero;
            $data['evento'] = $prueba;
        }
        $ruta = \Route::getCurrentRoute();
        $data['url'] = url($ruta->getPath());
        return \View::make('administracion.tablas.tipoEventos', $data);
    }

    public function getModifica($tipo_doc, $tipo_evento, $id = 0) {
        $tipoeven = \Defeventosasyc::whereTipoDoc($tipo_doc)->whereTipoEvento($tipo_evento)->get();
        if (!$tipoeven->isEmpty()) {
            $data['defeventosasyc'] = \Defeventosasyc::findorNew($id)->whereTipoDoc($tipo_doc)
                            ->whereTipoEvento($tipo_evento)->get();
            $data['descripcion'] = \Oracle\TipoEvento::select('desctipodoc')
                            ->where('tipodoc', '=', $tipo_doc)->where('tipoevento', '=', $tipo_evento)->get();
            return \View::make('administracion.tablas.tipoEventosform', $data);
        } else {
            $data['defeventosasyc'] = \Defeventosasyc::Create(array('tipo_doc'
                        => $tipo_doc, 'tipo_evento' => $tipo_evento));
            $data['descripcion'] = \Oracle\TipoEvento::select('desctipodoc')
                            ->where('tipodoc', '=', $tipo_doc)->where('tipoevento', '=', $tipo_evento)->get();
            return \View::make('administracion.tablas.defeventosasycesform', $data);
        }
    }

    public function postIndex() {
        $evento = \Defeventosasyc::findOrNew(\Input::get('id'));
        $data = \Input::all();
        if ($evento->isValid($data)) {
            $var = 'Tipo de Documento';
            $evento->fill($data);
            $evento->save();
            $this->afterPostIndex($evento);
            return \Redirect::to(('administracion/tablas/tipoEventos'))
                            ->with('mensaje', 'Se guardo el ' . $var
                                    . ' correctamente.');
        } else {
            return \Redirect::back()->withInput()
                            ->withErrors($evento->getErrors());
        }
    }

}
