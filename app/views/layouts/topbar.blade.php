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
                 @if(Usuario::puedeAcceder('GET.administracion'))
                <li>{{HTML::link('administracion','Administración')}}</li>
                @endif
            </ul>
        </div>
        <!-- user dropdown ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Aten. social y ciudadana <span
                            class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @if(Usuario::puedeAcceder('GET.solicitudes.nueva'))
                    <li>{{HTML::link('solicitudes/nueva/','Nueva Solicitud')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.ver'))
                    <li>{{HTML::link('solicitudes','Solicitudes')}}</li>
                    @endif
                    
                    <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.solicitudes.asignardepartamento'))
                    <li>{{HTML::link('solicitudes?estatus=ELA&asignar=departamento','Asignar a un Departamento')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.asignaranalista'))
                    <li>{{HTML::link('solicitudes?estatus=ELD&asignar=usuario','Asignar a un Analista')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.reasignaranalista'))
                    <li>{{HTML::link('solicitudes?estatus=EAA&reasignar=usuario','Reasignar a un Analista')}}</li>
                    @endif
                    <li class="divider"></li>
                     @if(Usuario::puedeAcceder('GET.memorandum.ver'))
                    <li>{{HTML::link('memorandum','Listar Memorandums')}}</li>
                     @endif
                     <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.solicitudes.aceptarasignacion'))
                    <li>{{HTML::link('solicitudes?estatus=EAA&solo_asignadas=true','Mis Solicitudes (Aceptar Asignacion)')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.solicitaraprobacion'))
                    <li>{{HTML::link('solicitudes?estatus=ACA&solo_asignadas=true','Mis Solicitudes (Solicitar Aprobación)')}}</li>
                    @endif
                    <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.solicitudes.cerrar'))
                    <li>{{HTML::link('solicitudes?estatus[]=ELD&cerrar=true','Cerrar solicitud')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.anular'))
                    <li>{{HTML::link('solicitudes?estatus[]=ELA&estatus[]=REF&estatus[]=PEN&estatus[]=ACP&anulando=true','Anular solicitud')}}</li>
                    @endif
                    <li class="divider"></li>
                    <li><a href="#">Alarmas Pendientes</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Reportes <span
                            class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    @if(Usuario::puedeAcceder('GET.reportes.resueltos'))
                    <li>{{HTML::link('reportes/resueltos/','Casos Resueltos')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.reportes.pendientes'))
                    <li>{{HTML::link('reportes/pendientes/','Casos Pendientes')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.reportes.estadisticassolicitud'))
                    <li>{{HTML::link('reportes/estadisticassolicitud/','Busqueda Agrupada')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.reportes.estadisticasgrafico'))
                   <li>{{HTML::link('reportes/estadisticasgrafico/','Graficas Estadisticas')}}</li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
    @unless(Request::is('/'))
        {{HTML::image('img/banner_ppal.jpg', 'Banner principal', ['class'=>'img-responsive', 'width'=>'100%'])}}
    @endunless
</div>
