@extends('layouts.master')
@section('contenido')
<div class="col-xs-12 col-sm-12 col-md-12">
        <head>
            <link href='../css/morris.css' rel='stylesheet'>
            
            <script src="../bower_components/jquery/jquery.min.js"></script>
            <script src="../js/morris.min.js"></script>
            <script src="../js/morris.js"></script>
            <script src="../js/raphael.min.js"></script>
            <script src="../js/views/reportes/graficos.js"></script>

        </head>
        <body>           
            <div class="navbar navbar-default" role="navigation" style="background: white; border-color: white;">
                <div id="chartano" style="height: 250px;"></div>
            </div>

            <div class="morris-hover morris-default-style" style="left: 0px; top: 173px;">
                <div class="morris-hover-row-label"></div>
                <div class="morris-hover-point" style="color: #0b62a4">
                </div>
                <div class="morris-hover-point" style="color: #7a92a3">
                </div>                
            </div>
        </body>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="panel panel-danger">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordionlateral" href="#PanelPlanilla">
                <h4 class="panel-title">
                    <center>Obtener tabla de datos aquí</center>
                </h4>
            </div>
            <div class="row">
                <div class="col-lg-12"><br>
                        <button class="btn btn-primary" type="submit" name="formato_reporte" value="pdf"><i class="fa fa-file-pdf-o"></i> Generar en PDF</button>
                        <button class="btn btn-primary" type="submit" name="formato_reporte" value="xls"><i class="fa fa-file-excel-o"></i> Generar en Excel</button><br>
                    </div>
                </div>
        </div>
</div>
@endsection