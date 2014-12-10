<div class="navbar navbar-default" role="navigation">
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('')}}"><span>SASYC</span></a>

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="{{url('usuario/registro')}}"><i class="glyphicon glyphicon-home"></i> Registrarme</a></li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-list"></i> Aten. social y ciudadana <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Nueva Solicitud</a></li> 
                    <li><a href="#">Anular Solicitud</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Asig. Dptto</a></li> 
                    <li class="divider"></li>
                    <li><a href="#">Modificar Caso</a></li>
                    <li><a href="#">Cerar Caso</a></li>
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
             <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-warning-sign"></i> Ayuda <span
                        ></span></a>
            </li>
        </ul>
        
        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Nombre Usuario</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>{{HTML::link('usuario/logout','Cambiar Clave')}}</li>
                <li>{{HTML::link('usuario/logout','Ayuda')}}</li>
                <li>{{HTML::link('usuario/logout','Cerrar Sesión')}}</li>
                <li class="divider"></li>
                <li>{{HTML::link('administracion/actualizaciones','Administracion')}}</li>
            </ul>
        </div>
        <!-- user dropdown ends -->

    </div>
</div>