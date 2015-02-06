<?php

class FotosSolicitudController extends BaseController {

    public function __construct() {
        parent::__construct();
    }

    public function deleteFoto() {
        $foto = FotoSolicitud::findOrFail(Input::get('id'));
        $solicitud_id = $foto->solicitud_id;
        $foto->delete();
        $data['mensaje'] = "Se eliminó la foto correctamente";
        $data['vista'] = $this->getModificar(null, $solicitud_id)->render();
        return Response::json($data);
    }

    public function postModificar() {
        $fotoSolicitud = FotoSolicitud::findOrNew(Input::get('id'));
        $fotoSolicitud->fill(Input::all());
        if ($fotoSolicitud->save()) {
            $data['mensaje'] = 'Datos guardados correctamente';
            $data['vista'] = $this->getModificar(null, $fotoSolicitud->solicitud_id)->render();
            return Response::json($data);
        }
        return Response::json(['errores' => $fotoSolicitud->getErrors()], 400);
    }

    public function getModificar($foto_id = null, $solicitud_id = null) {
        $data['foto'] = FotoSolicitud::findOrNew($foto_id);
        if ($foto_id == null) {
            $data['solicitud'] = Solicitud::findOrFail(Input::get('solicitud_id', $solicitud_id));
            $data['fotos'] = $data['solicitud']->fotos;
        } else {
            $data['fotos'] = $data['foto']->solicitud->fotos;
            $data['solicitud'] = $data['foto']->solicitud;
        }
        return View::make('solicitudes.galeriafotos', $data);
    }

    public function getDescargar($foto_id) {
        $foto = FotoSolicitud::findOrFail($foto_id);
        $path = storage_path('adjuntos' . DIRECTORY_SEPARATOR . $foto->solicitud_id . DIRECTORY_SEPARATOR . $foto->foto);

        $length = filesize($path);
        $file = new Symfony\Component\HttpFoundation\File\File($path);

        $headers = array(
            'Content-Disposition' => 'inline; filename="' . $foto->foto . '"',
            'Content-Type' => $file->getMimeType(),
            'Content-Length' => $length,
        );
        return Response::make(File::get($path), 200, $headers);
    }

}
