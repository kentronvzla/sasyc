<div class="navbar navbar-default" role="navigation">
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('')}}"><span>Sasyc</span></a>

        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Nombre Usuario</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li>{{HTML::link('usuario/perfil','Mi Perfil')}}</li>
                <li class="divider"></li>
                <li>{{HTML::link('usuario/logout','Cerrar Sesión')}}</li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li><a href="{{url('usuario/registro')}}"><i class="glyphicon glyphicon-globe"></i> Registrarme</a></li>
            <li><a href="{{url('usuario/login')}}"><i class="glyphicon glyphicon-log-in"></i> Iniciar Sesión</a></li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Acerca de nosotros <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                </ul>
            </li>
        </ul>

    </div>
</div>