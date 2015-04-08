<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('')}}">
            <i class="glyphicon glyphicon-home"></i>
        </a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{Sentry::getUser()->nombre}}</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>{{HTML::link('login/logout','Cerrar Sesión')}}</li>
                <li class="divider"></li>
                <li>{{HTML::link('administracion','Administración')}}</li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Aten. social y ciudadana <span
                            class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>{{HTML::link('solicitudes/nueva/','Nueva Solicitud')}}</li>
                    <li>{{HTML::link('solicitudes','Solicitudes')}}</li>
                    <li>{{HTML::link('solicitudes?estatus[]=ELD&cerrar=true','Cerrar solicitud')}}</li>
                    <li>{{HTML::link('solicitudes?estatus[]=ELA&estatus[]=REF&estatus[]=PEN&estatus[]=ACP&anulando=true','Anular solicitud')}}</li>
                    <li class="divider"></li>
                    <li>{{HTML::link('memorandum','Listar Memorandums')}}</li>
                    <li class="divider"></li>
                    <li>{{HTML::link('solicitudes?estatus=ELA&asignar=departamento','Asignar a un Departamento')}}</li>
                    <li>{{HTML::link('solicitudes?estatus=ELD&asignar=usuario','Asignar a un Analista')}}</li>
                    <li class="divider"></li>
                    <li>{{HTML::link('solicitudes?solo_asignadas=true','Mis Solicitudes')}}</li>
                    <li>{{HTML::link('solicitudes?estatus=EAA&solo_asignadas=true','Mis Solicitudes (Aceptar Asignacion)')}}</li>
                    <li>{{HTML::link('solicitudes?estatus=ACA&solo_asignadas=true','Mis Solicitudes (Solicitar Aprobación)')}}</li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                    <li><a href="#">Alarmas Pendientes</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Reportes <span
                            class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li>{{--HTML::link('reportes/general/','Casos Generales')--}}</li>
                    <li>{{HTML::link('reportes/resueltos/','Casos Resueltos')}}</li>
                    <li>{{HTML::link('reportes/pendientes/','Casos Pendientes')}}</li>
                    <li>{{HTML::link('reportes/estadisticassolicitud/','Busqueda Agrupada')}}</li>
                    <li>{{HTML::link('graficos/graficar/','Graficas Estadisticas')}}</li>
                </ul>
            </li>
        </ul>
    </div>
    @unless(Request::is('/'))
        {{HTML::image('img/banner_ppal.jpg', 'Banner principal', ['class'=>'img-responsive', 'width'=>'100%'])}}
    @endunless
</div>
