
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
                <i class="glyphicon glyphicon-user"></i>&nbsp;
                <span class="hidden-sm hidden-xs">{{Sentry::getUser()->nombre}}</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>{{HTML::link('login/logout','Cerrar Sesión')}}</li>
                @if(Usuario::puedeAcceder('GET.administracion'))
                <li class="divider"></li>

                <li>{{HTML::link('administracion','Administración')}}</li>
                @endif
            </ul>
        </div>
        <?php
        $id = Sentry::getUser()->id;
        $hoy = date('Y-m-d');
        $alerta = Bitacora::where('usuario_id', '=', $id)->where('ind_atendida', '=', 'false')
                        ->where('ind_alarma', '=', 'true')->where('fecha', '<=', $hoy)
                        ->get()->count();
        ?>

        @if ($alerta >= 1)
        <div class="btn-group pull-right" >
            <button  style="background-color:#aea79f" class="btn btn-default">
                @if(Usuario::puedeAcceder('GET.alertas'))
                {{HTML::button('alertas' , 'bell', 'Alertas', true)}}
                @endif   
                <span class="notification red">{{$alerta}}</span>
            </button>

        </div>
        @endif    
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
                    <li>{{HTML::link('solicitudes','Consultar Solicitudes')}}</li>
                    @endif

                    <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.solicitudes.asignardepartamento'))
                    <li>{{HTML::link('solicitudes?estatus=ELA&asignar=departamento','Asignar a Departamento')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.asignaranalista'))
                    <li>{{HTML::link('solicitudes?estatus=ELD&asignar=usuario','Asignar Analista')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.reasignaranalista'))
                    <li>{{HTML::link('solicitudes?estatus=EAA&asignar=usuario','Reasignar Analista')}}</li>
                    @endif
                    <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.memorandum.ver'))
                    <li>{{HTML::link('memorandum','Consultar Memorandums')}}</li>
                    @endif
                    <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.solicitudes.aceptarasignacion'))
                    <li>{{HTML::link('solicitar?estatus=EAA&solo_asignadas=true&usuario_asignacion_id='."$id",'Aceptar Asignacion')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.solicitaraprobacion'))
                    <li>{{HTML::link('aceptar?estatus[]=ACA&estatus[]=DEV&solo_asignadas=true&usuario_asignacion_id='."$id",'Solicitar Aprobación')}}</li>
                    @endif
                    <li class="divider"></li>
                    @if(Usuario::puedeAcceder('GET.solicitudes.cerrar'))
                    <li>{{HTML::link('solicitudes?estatus=APR&cerrar=true','Cerrar solicitud')}}</li>
                    @endif
                    @if(Usuario::puedeAcceder('GET.solicitudes.anular'))
                    <li>{{HTML::link('solicitudes?estatus[]=ELA&estatus[]=ELD&estatus[]=EAA&estatus[]=ART&estatus[]=ECA&estatus[]=DEV&anulando=true','Anular solicitud')}}</li>
                    @endif
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
            @if(Usuario::puedeAcceder('GET.documentossasyces.ver'))
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Documentos<span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">

                    <li>{{HTML::link('documentos','Consulta de Documentos')}}</li>

                </ul>
            </li>
            @endif
        </ul>
    </div>
    @unless(Request::is('/'))
    {{HTML::image('img/banner_ppal.jpg', 'Banner principal', ['class'=>'img-responsive', 'width'=>'100%'])}}
    @endunless
</div>
