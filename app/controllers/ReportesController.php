<?php

class ReportesController extends BaseController {

    private $reporte;
    Private $punto;
    Private $memo;
    private static $columnas_agrupables = [
        '' => 'Seleccione',
        'municipios.estado_id' => 'Estado',
        'areas.tipo_ayuda_id' => 'Tipo de ayuda',
        'solicitudes.area_id' => 'Área',
        'presupuestos.beneficiario_id' => 'Beneficiario',
        'presupuestos.requerimiento_id' => 'Requerimiento',
        'solicitudes.estatus' => 'Estatus',
        'solicitudes.recepcion_id' => 'Recepcion',
        'personas.sexo' => 'Sexo',
        'especial_mes' => 'Mes',
    ];
    
    private static $columnas_agrupables_grafico = [
        '' => 'Seleccione',
        'estados.estado_id' => 'Estado',
        'areas.tipo_ayuda_id' => 'Tipo de ayuda',
        'solicitudes.area_id' => 'Área',
        'presupuestos.requerimiento_id' => 'Requerimiento',
        'solicitudes.estatus' => 'Estatus',
        'solicitudes.recepcion_id' => 'Recepcion',
        'personas.sexo' => 'Sexo',
        'especial_mes' => 'Mes',
        'especial_ano' => 'Año',
    ];
        
    private static $columnas_descripciones = [
        '' => 'Seleccione',
        'estados.estado_id' => 'estados.nombre',
        'areas.tipo_ayuda_id' => 'tipo_ayudas.nombre',
        'solicitudes.area_id' => 'areas.nombre',
        'presupuestos.requerimiento_id' => 'requerimientos.nombre',
        'solicitudes.estatus' => 'solicitudes.estatus',
        'solicitudes.recepcion_id' => 'recepciones.nombre',
        'personas.sexo' => 'personas.sexo',
        'especial_mes' => 'to_char(solicitudes.created_at,\'MM / YYYY\')',
        'especial_ano' => 'extract(year from solicitudes.created_at)'
    ];
    private static $columnas_orden = [
        '' => 'Seleccione',
        'solicitudes.referencia_externa' => 'Referencia externa',
    ];
    private static $columnas_orden_1 = [
        '' => 'Seleccione',
        'solicitudes.referencia_externa' => 'Referencia externa',
    ];

    public function __construct(\ayudantes\Reporte $reporte) {
        require_once '../public/EnLetras.php';
        $this->reporte = $reporte;
        $this->memo='M';
        $this->punto='P';
        parent::__construct();
    }

    public function getEstadisticassolicitud() {
        $data['columnas_agrupables'] = static::$columnas_agrupables;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('reportes.estadisticassolicitud', $data);
    }

    public function postEstadisticassolicitud() {
        $data['cont'] = 0;
        $data['acum'] = 0;
        $data['anterior'] = "";
        $data['cantReportes'] = count(Input::get('group_by_1'));
        for ($i = 0; $i < $data['cantReportes']; $i++) {
            $data['titulo'][$i] = Input::get('titulo_reporte')[$i];

            $data['solicitudes'][$i] = Solicitud::aplicarFiltro(Input::except(['group_by_1', 'group_by_2', 'group_by_3', 'titulo_reporte', 'formato_reporte']));
            $data['columnas'][$i] = [];
            $strSelect = '';
            //se aplican los group by
            for ($j = 1; $j <= 3; $j++) {
                $columna = Input::get('group_by_' . $j, '')[$i];
                if (!empty($columna)) {
                    if ($columna == 'especial_mes') {
                        $strSelect .= 'extract(month from solicitudes.created_at) as especial_mes, ';
                    } else {
                        $strSelect .= $columna . ',';
                    }
                    $data['columnas'][$i][$columna] = static::$columnas_agrupables[$columna];
                    $data['solicitudes'][$i]->groupBy($columna);
                    $data['solicitudes'][$i]->orderBy($columna);
                    //se debe ordenar por la primera columna.
                    if ($j == 1) {
                        if (str_contains($columna, '.')) {
                            $data['primera_columna'][$i] = explode('.', $columna)[1];
                        } else {
                            $data['primera_columna'][$i] = $columna;
                        }
                    }
                }
            }
              $data['solicitudes'][$i] = $data['solicitudes'][$i]
              ->selectRaw($strSelect . 'SUM(presupuestos.monto) as monto, COUNT(distinct solicitudes.id) as cantidad')
              ->get(); 

        }

        return $this->reporte->generar('reportes.html.estadisticassolicitud', $data, 'L');
    }

    public function getResueltos() {
        $data['columnas_orden'] = static::$columnas_orden;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('reportes.resueltos', $data);
    }

    public function postResueltos() {
        $columna = Input::get('order_by');
        $data['total'] = 0;
        $data['anterior'] = "";
        $data['cantReportes'] = count(Input::get('order_by'));
        $data['solicitudes'] = Solicitud::aplicarFiltro(Input::except('formato_reporte', 'order_by'));
        $data['solicitudes'] = $data['solicitudes']
                ->where(function($query) {
                     $query->where('estatus', '=', 'APR');
                })
                ->orderBy($columna, 'ASC')
                ->get();

        $data['parametro'] = $this->parametro_de_orden($data, (explode('.', $columna)[1]));

        return $this->reporte->generar('reportes.html.resueltos', $data, 'L');
    }

    public function getPendientes() {

        $data['columnas_orden'] = static::$columnas_orden_1;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('reportes.pendientes', $data);
    }

    public function postPendientes() {
        $columna = Input::get('order_by');
        $data['total'] = 0;
        $data['cantReportes'] = count(Input::get('order_by'));
        $data['solicitudes'] = Solicitud::aplicarFiltro(Input::except('formato_reporte', 'order_by'));
        $data['solicitudes'] = $data['solicitudes']
                ->orderBy($columna, 'ASC')
                ->get();
        $data['orden'] = $columna;
        $data['parametro'] = $this->parametro_de_orden($data, (explode('.', $columna)[1]));

        return $this->reporte->generar('reportes.html.pendientes', $data, 'L');
    }

    public function getPuntomemo($id) {
        $total1 = 0;
        $total2 = 0;
        $data['solicitud'] = Solicitud::findOrFail($id);
        foreach ($data['solicitud']->presupuestos as $resultado) {
            $total1 = $total1 + $resultado->monto;
            $total2 = $total2 + $resultado->montoapr;
        }

        $data['montoASCII'] = $this->montos_punto_memo($total1);
        $data['montoASCIIapr'] = $this->montos_punto_memo($total2);

        // se pide el reporte
        if ($data['solicitud']->tipo_proc ==$this->punto) {
            return $this->reporte->generar('reportes.html.punto', $data, 'P');
        } elseif ($data['solicitud']->tipo_proc == $this->memo) {
            return $this->reporte->generar('reportes.html.memo', $data, 'P');
        }

        //echo $data['montoASCII']."<br>".$data['montoASCIIapr'];
    }

    private function montos_punto_memo($monto) {
        // se convierte el monto a valor en letra
        $V = new EnLetras();
        $valor = explode(".", $monto);
        if (count($valor) > 1) {
            $con = strtoupper($V->ValorEnLetras($valor[0], " Bsf Con "));
            return $con . strtoupper($V->ValorEnLetras($valor[1], " Centimos")) . " ( Bsf. " . $monto . " )";
        } else {
            return strtoupper($V->ValorEnLetras($valor[0], " Bsf")) . " ( Bsf. " . $monto . " )";
        }
    }

    private function parametro_de_orden($data, $columna) {
        $contador = 0;
        $arreglo [] = array();
        foreach ($data['solicitudes'] as $resultado) {
            foreach ($resultado->presupuestos as $key => $presupuesto) {
                if ($columna == "referencia_externa") {
                    $arreglo[$contador] = $presupuesto->solicitud->referencia_externa;
                }
                if ($columna == "estatus") {
                    $arreglo[$contador] = $presupuesto->solicitud->estatus;
                }
                if ($columna == "nombre") {
                    $arreglo[$contador] = $presupuesto->solicitud->requerimiento;
                }
                $contador++;
            }
        }
        return $arreglo;
    }

    public function getEstadisticasgrafico() {
        $data['columnas_agrupables'] = static::$columnas_agrupables_grafico;
        $data['solicitud'] = new Solicitud();
        $data['persona'] = new Persona();
        $data['presupuesto'] = new Presupuesto();
        return View::make('graficos.estadisticagrafico', $data);
    }

    public function postDatos() {
        $data['solicitudes'] = Solicitud::aplicarFiltro(Input::except(['group_by', 'formato_reporte']));
        $data['columnas'] = [];
        $strSelect = '';
        //se aplican los group by
        $columna = Input::get('group_by');
        if (!empty($columna)) {
            $data['columnas'][$columna] = static::$columnas_agrupables_grafico[$columna];
            $descripciones = static::$columnas_descripciones[$columna];
            $data['solicitudes']->groupBy('grupo');
            $data['solicitudes']->orderBy('grupo');

            //se debe ordenar por la primera columna.
            if (str_contains($columna, '.')) {
                $data['primera_columna'] = explode('.', $columna);
            } else {
                $data['primera_columna'] = $columna;
            }
        }

        $data['solicitudes'] = $data['solicitudes']
                ->selectRaw($descripciones . ' as grupo, SUM(presupuestos.montoapr) as monto, COUNT(distinct solicitudes.id) as cantidad')
                ->get();

        return Response::json($data['solicitudes']);
    }
}
