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
                <li>{{HTML::link('administracion/actualizaciones','Administración')}}</li>
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
                    <li class="divider"></li>
                    <li>{{HTML::link('solicitudes','Asignar a un Departamento')}}</li> 
                    <li>{{HTML::link('solicitudes','Asignar a un Analista')}}</li>
                    <li class="divider"></li>
                    <li><a href="#">Alarmas Pendientes</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Consulta <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">General</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Por Beneficio</a></li>
                    <li><a href="#">Por Solicitud</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Control de Casos</a></li> 
                    <li><a href="#">Casos por proceso</a></li>
                </ul>
            </li>
        </ul>


    </div>
     @unless(Request::is('/'))
    {{HTML::image('img/banner_ppal.jpg', 'Banner principal', ['class'=>'img-responsive', 'width'=>'100%'])}}
    @endunless
</div>
