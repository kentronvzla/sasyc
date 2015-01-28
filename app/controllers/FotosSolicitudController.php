<?php

class FotosSolicitudController extends BaseController {

    public function __construct() {
        parent::__construct();
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
        }
        return View::make('manejosolicitudes.galeriafotos', $data);
    }

    public function getDescargar($foto_id) {
        $foto = FotoSolicitud::findOrFail($foto_id);
        $path = storage_path('adjuntos' . DIRECTORY_SEPARATOR . $foto->solicitud_id . DIRECTORY_SEPARATOR . $foto->foto);
        
        $filetime = filemtime($path);
        $etag = md5($filetime . $path);
        $time = gmdate('r', $filetime);
        $expires = gmdate('r', $filetime);
        $length = filesize($path);

        $headers = array(
            'Content-Disposition' => 'inline; filename="' . $foto->foto . '"',
            'Last-Modified' => $time,
            'Cache-Control' => 'must-revalidate',
            'Expires' => $expires,
            'Pragma' => 'public',
            'Etag' => $etag,
        );
        return Response::download($path, $foto->foto, $headers);
    }

}
