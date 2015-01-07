<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>@yield('titulo','Sasyc')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema para la gestión de citas medicas">

        <!--CSS-->
        {{HTML::style('css/bootstrap-united.min.css')}}
        {{HTML::style('css/charisma-app.css')}}
        {{HTML::style('bower_components/fullcalendar/dist/fullcalendar.min.css')}}
        {{HTML::style('bower_components/fullcalendar/dist/fullcalendar.print.min.css',array('media'=>'print'))}}
        {{HTML::style('bower_components/colorbox/example3/colorbox.min.css')}}
        {{HTML::style('css/jquery.noty.min.css')}}
        {{HTML::style('css/noty_theme_default.min.css')}}
        {{HTML::style('css/elfinder.min.css')}}
        {{HTML::style('css/elfinder.theme.min.css')}}
        {{HTML::style('css/uploadify.min.css')}}
        <!--JS-->
        {{HTML::script('bower_components/jquery/jquery.min.js')}}
    </head>
    <body>
        <noscript>
        <div class="alert alert-block col-md-12">
            <h4 class="alert-heading">Uppss!</h4>

            <p>Debes tener <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                habilitado para poder navegar en este sitio.</p>
        </div>
        </noscript>
        @include('layouts.topbar')
        <div class="ch-container">
            <div class="row">
                <div class="col-sm-2 col-lg-2">
                    <div class="sidebar-nav">
                        <div class="nav-canvas">
                            <div class="nav-sm nav nav-stacked">

                            </div>
                            <ul class="nav nav-pills nav-stacked main-menu">
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="content" class="col-lg-12 col-sm-12">
                    @yield('contenido')
                </div>
            </div>
            <footer class="row">
                <div class="col-lg-12">
                    <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; 2014 - {{date('Y')}}</p>
                    <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                            href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
                </div>
            </footer>
        </div>

        <h4><div id="contenedorEspera" class="alert alert-warning navbar-fixed-top" style="display: none;"></div></h4>
        <h4><div id="contenedorCorrecto" class="alert alert-success navbar-fixed-top" style="display: none;"></div></h4>
        <h4><div id="contenedorError" class="alert alert-danger navbar-fixed-top" style="display: none;"></div></h4>

        <script>
            var baseUrl = '{{url("")}}/';
        </script>
        {{HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js')}}
        {{HTML::script('js/jquery.cookie.min.js')}}
        {{HTML::script('bower_components/moment/min/moment.min.js')}}
        {{HTML::script('bower_components/fullcalendar/dist/fullcalendar.min.js')}}
        {{HTML::script('bower_components/chosen/chosen.jquery.min.js')}}
        {{HTML::script('bower_components/colorbox/jquery.colorbox-min.js')}}
        {{HTML::script('js/jquery.noty.min.js')}}
        {{HTML::script('js/jquery.raty.min.js')}}
        {{HTML::script('js/jquery.uploadify-3.1.min.js')}}
        {{HTML::script('js/jquery.history.min.js')}}

        {{HTML::script('js/datatables.min.js')}}
        {{HTML::script('js/datatables.bootstrap.min.js')}}

        {{HTML::style('css/datatables.bootstrap.min.css')}}
        {{HTML::style('css/datatables.min.css')}}        

        {{HTML::style('css/datepicker.min.css')}}
        {{HTML::script('js/datepicker.min.js')}}

        {{HTML::style('bower_components/chosen/chosen.min.css')}}

        {{HTML::script('js/charisma.js')}}
        <div class="modal fade" id="modalConfirmacion">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Ventana de confirmación</h4>
                    </div>
                    <div class="modal-body">
                        <p id='mensajeModalConfirmacion'></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button id="okModalConfirmacion" type="button" class="btn btn-danger">Si</button>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('mensaje'))
        <script>
            $(document).ready(function() {
                mostrarMensaje("{{Session::pull('mensaje')}}");
            });
        </script>
        @endif
    </body>
</html>