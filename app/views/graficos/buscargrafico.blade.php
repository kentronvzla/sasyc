@extends('layouts.master')
@section('contenido')
{{Form::busqueda(['url'=>'reportes/datos','method'=>'POST'])}}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Búsqueda
                </h4>
            </div>
            <div class="row">
				<div class="panel-body">
					@include('solicitudes.busqueda')
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-danger">
								<div class="panel-heading">
									<h4 class="panel-title">
										Indicar columna para agrupar
									</h4>
								</div>
								<div class="panel-body">
									<div id="contenedor-tablas">
										<div class="row" id="plantilla-fila">
											<div class="col-xs-12 col-md-12">
												<div class="form-group">
													 {{Form::select('group_by', $columnas_agrupables, '', ['placeholder'=>'Agrupación','class'=>'form-control','required'])}}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<button type="button" class="btn btn-primary graficar_datos"><i class="glyphicon glyphicon-search"></i> Generar en Gráfico</button>
							<!--<button class="btn btn-primary" type="submit" name="formato_reporte" value="vista"><i class="fa fa-file-excel-o"></i> Generar en Gráfico</button>
							<button type="button" class="btn btn-primary grafico" name="formato_reporte" ><i class="glyphicon glyphicon-search"></i> Generar gráfico</button>-->
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <head>

            </head>
            <body>
                <div class="navbar navbar-default" role="navigation" style="background: white; border-color: white;">
                    <div id="chartgrupo" style="height: 250px;"></div>
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
@section('javascript')
{{HTML::script('js/morris.min.js')}}
{{HTML::script('js/morris.js')}}
{{HTML::script('js/raphael.min.js')}}
{{HTML::script('js/views/reportes/graficos.js')}}
@stop
{{Form::close()}}
@endsection