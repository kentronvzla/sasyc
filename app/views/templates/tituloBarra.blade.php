@if(isset($obj->id))
<i class="glyphicon glyphicon-edit"></i> Modificar el {{$titulo}}
@else
<i class="glyphicon glyphicon-plus"></i> Agregar nuevo {{$titulo}}
@endif