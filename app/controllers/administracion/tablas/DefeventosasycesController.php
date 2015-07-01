<?php namespace Administracion\Tablas;

/**
 * Description of DefeventosasycesController
 *
 * @author Nadin Yamani
 */
class DefeventosasycesController extends \Administracion\TablasBaseController {
    
 
    
 public function postIndex() {
     
       $evento = \Defeventosasyc::findOrNew(\Input::get('id'));
       $data = \Input::all();
       if ($evento->isValid($data))
        {
            $var= 'Tipo de Documento';
            $evento->fill($data);
            $evento->save();
            return \Redirect::to(('administracion/tablas/tipoEventos'))
                            ->with('mensaje', 'Se guardo el ' . $var
                                    .' correctamente.');
        }
        else
        {
            return \Redirect::back()->withInput()
                            ->withErrors($evento->getErrors());
         }
        }
    }