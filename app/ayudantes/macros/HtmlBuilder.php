<?php

/**
 * Description of HtmlMacros
 *
 * @author nadinarturo
 */

namespace Ayudantes\Macros;

class HtmlBuilder extends \Illuminate\Html\HtmlBuilder {

    function button($href, $icon, $title, $modal = false) {
        return '<a class="btn btn-primary btn-xs '.($modal ? 'abrir-modal':'').'" href="'.url($href).'" title="'.$title.'" target="_blank">'.\HTML::icon($icon).'</a>';
    }

    function buttonText($href, $icon, $title, $modal = false) {
        return '<a class="btn btn-primary '.($modal ? 'abrir-modal':'').'" href="'.url($href).'" title="'.$title.'" target="_blank">'.\HTML::icon($icon).' '.$title.'</a>';
    }
    
    function icon($icon) {
        return '<span class="fa fa-' . $icon . '"></span>';
    }

    function simpleTable($collection, $modelName, $botones = [], $urlDelete = "", $href = [], $datatable = false) {
        $model = new $modelName();
        $data['prettyFields'] = $model->getPublicFields();
        $data['collection'] = $collection;
        $data['botones'] = $botones;
        $data['urlDelete'] = $urlDelete;
        $data['href'] = $href;
        $data['datatable'] = $datatable;
        return \View::make('templates.bootstrap.simpleTable', $data);
    }

    function tableModel($collection, $modelName, $hasDelete = true, $hasEdit = true, $hasAdd = true, $hasModal = false) {
        $model = new $modelName();
        $data['prettyFields'] = $model->getPublicFields();
        $data['collection'] = $collection;
        $ruta = \Route::getCurrentRoute();
        $data['url'] = url($ruta->getPath());
        $data['hasEdit'] = $hasEdit;
        $data['hasDelete'] = $hasDelete;
        $data['hasAdd'] = $hasAdd;
        $data['hasModal'] = $hasModal;
        if ($hasAdd) {
            $data['urlAdd'] = $data['url'] . '/modificar';
            $data['nombreAdd'] = $model->getPrettyName();
        }
        return \View::make('templates.bootstrap.table', $data);
    }

    function imageLink($hrefLink, $toltip, $urlImage) {
        return "<a href='" . url($hrefLink) . "'>"
                . "<img src='" . url($urlImage) . "' title='$toltip'></a>";
    }

    function jqplugin($name, $jsincludes = array()) {
        $css = $js = "";
        if (file_exists(public_path('css/' . $name . '.min.css'))) {
            $css = \HTML::style('css/' . $name . '.min.css');
        }
        if (file_exists(public_path('js/jqplugins/' . $name . '.min.js'))) {
            $js = \HTML::script('js/jqplugins/' . $name . '.min.js');
        }
        foreach ($jsincludes as $jsinclude) {
            $js .= \HTML::script($jsinclude);
        }
        return $css . $js;
    }

    function bootstrap() {
        return \HTML::style('css/bootstrap.css') . \HTML::script('js/jquery.min.js') . \HTML::script('js/bootstrap.min.js');
    }

    function opcionMenu($link, $nombre, $icono, $header = false) {
        if ($header) {
            return "<a href='#'><i class='glyphicon glyphicon-$icono'></i><span> $nombre</span></a>";
        } else {
            return "<a class='ajax-link' href='" . url($link) . "'><i class='glyphicon glyphicon-$icono'></i><span> $nombre</span></a>";
        }
    }

    function btnAgregar($url, $nombre) {
        $data['url'] = $url;
        $data['nombre'] = $nombre;
        return View::make('templates.bootstrap.btnagregar', $data);
    }

}
