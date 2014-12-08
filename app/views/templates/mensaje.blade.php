@if(Session::has('mensaje'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{Session::pull('mensaje')}}
</div>
@endif
@include('templates.errores')