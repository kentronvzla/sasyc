@if(isset($obj->id))
<h2><i class="glyphicon glyphicon-edit"></i> Modificar el {{$titulo}}</h2>
@else
<h2><i class="glyphicon glyphicon-plus"></i> Agregar nuevo {{$titulo}}</h2>
@endif