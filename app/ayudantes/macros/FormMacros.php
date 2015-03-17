<?php

/**
 * Description of FormMacros
 *
 * @author nadinarturo
 */

namespace Ayudantes\Macros;

class FormBuilder extends \Illuminate\Html\FormBuilder {

    protected $buscando = false;

    public function open(array $options = array()){
        $this->buscando = false;
        return parent::open($options);
    }

    public function busqueda($params){
        $this->buscando = true;
        return parent::open($params);
    }

    public function multiselect($obj, $relation, $numCols = 12){
        $related = $obj->{$relation}()->getRelated();
        $data['options'] = call_user_func(array(get_class($related), 'getCombo'));
        unset($data['options']['']);
        $data['params']['multiple'] = 'multiple';
        $data['params']['class'] = 'advanced-select';
        $data['params']['id'] = $relation;
        $data['params']['style'] = 'width: 100%;';
        $data['attrName'] = $relation.'[]';
        $data['values'] = $obj->{$relation}->lists('id');
        $data['numCols'] = $numCols;
        $data['params']['data-placeholder'] = $obj->getDescription($relation);
        return \View::make('templates.bootstrap.multiselect', $data)->render();
    }

    public function display($obj, $attrName, $numCols = 12, $inline = false) {
        $data['numCols'] = $numCols;
        $data['attrName'] = $attrName;
        $data['params']['id'] = str_replace('[]', '', $attrName);
        $data['attrValue'] = $obj->getValueAt($data['params']['id'], true);
        $data['params']['placeholder'] = $obj->getDescription($attrName);
        $data['inline'] = $inline;
        return \View::make('templates.bootstrap.display', $data);
    }

    public function concurrencia($obj) {
        return $this->hidden('version', \Input::old('version', $obj->version));
    }

    public function btSelect($attrName, $values, $value, $numCols = 12, $required = true) {
        $data['numCols'] = $numCols;
        $data['attrName'] = $attrName;
        $data['params']['class'] = 'form-control';
        $data['attrValue'] = $value;
        $data['params']['id'] = $attrName;
        $data['options'] = $values;
        if ($required) {
            $data['params']['required'] = 'true';
        }
        $data['inputType'] = "select";
        return \View::make('templates.bootstrap.input', $data);
    }

    function btInput($obj, $attrName, $numCols = 12, $type = 'text'
        , $html = [], $options = []) {
        $data['params'] = $html;
        if (!isset($data['params']['class'])) {
            $data['params']['class'] = '';
        }
        if ($obj->isDecimalField($attrName)) {
            $data['params']['class'] = 'decimal-format ';
        } else if ($obj->isRelatedField($attrName) && $type == 'text') {
            $type = 'select';
            $options = $obj->getRelatedOptions($attrName);
            if (count($options) > 30) {
                $data['params']['class'] = ' advanced-select ';
                $data['params']['style'] = 'width: 100%;';
            }
        } else if ($obj->isDateField($attrName) && $type == "text") {
            $data['params']['class'] = 'jqueryDatePicker ';
            $data['attrValue'] = $obj->getValueAt($attrName);
            if (method_exists($data['attrValue'], 'format')) {
                $data['attrValue'] = $data['attrValue']->format('d/m/Y');
            }
        } else if ($obj->isBooleanField($attrName) && $type == "text") {
            $type = 'boolean';
        }
        $data['numCols'] = $numCols;
        $data['attrName'] = $attrName;
        if (!isset($data['attrValue'])) {
            $data['attrValue'] = $obj->getValueAt(str_replace('[]', '', $attrName), false);
        }
        $data['params']['id'] = str_replace('->', '_', str_replace('[]', '', $attrName));
        $data['params']['class'] .= 'form-control';
        $data['params']['placeholder'] = $obj->getDescription($attrName);
        if ($obj->isRequired($attrName) && $type!='password') {
            $data['params']['required'] = 'true';
        }
        $data['inputType'] = $type;
        $data['options'] = $options;
        if ($type == "textarea") {
            $data['params']['rows'] = 4;
        }
        if($this->buscando){
            unset($data['params']['required']);
            if($type == 'select' && !isset($html['data-child'])){
                $data['params']['multiple'] = 'multiple';
                $data['params']['style'] = 'width: 100%;';
                $data['inputType'] = 'multiselect';
                $data['params']['class'] .= ' advanced-select ';
                $data['attrName'] = $obj->getTable().'.'.$data['attrName'].'[]';
                unset($data['options']['']);
            }else{
                $data['attrName'] = $obj->getTable().'.'.$data['attrName'];
            }

        }
        $data['params']['data-placeholder'] = $data['params']['placeholder'];
        return \View::make('templates.bootstrap.input', $data);
    }

    function submitBt($btn_type = "btn-volver") {
        return \View::make('templates.bootstrap.submit', ['btn_type' => $btn_type]);
    }

}
