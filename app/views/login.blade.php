<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>@yield('TituloWeb','SASYC')</title>
        <!--CSS-->
        {{HTML::style('css/bootstrap-united.min.css')}}
        {{HTML::style('css/charisma-app.css')}}
        {{HTML::style('bower_components/colorbox/example3/colorbox.min.css')}}
        {{HTML::style('css/jquery.noty.min.css')}}
        {{HTML::style('css/noty_theme_default.min.css')}}
        {{HTML::style('css/estilo_sasyc.css')}}

        <!--JS-->
        {{HTML::script('bower_components/jquery/jquery.min.js')}}
    </head>
    <body style="padding-top: 20%;">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title"><strong>Iniciar Sesión </strong></h3></div>
                <div class="panel-body">
                    @if($errors->has())
                    @foreach($errors->all() as $message)
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @endforeach
                    @endif
                    <form method="POST" action="{{url('login')}}">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña <a href="/sessions/forgot_password">(¿Olvidaste tu contraseña?)</a></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="mantener" type="checkbox">Mantener sesión iniciada
                            </label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js')}}
    </body>
</html>