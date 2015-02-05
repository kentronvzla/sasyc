@if(isset($obj->id))
<i class="glyphicon glyphicon-edit"></i> Modificar {{$titulo}}
@else
<i class="glyphicon glyphicon-plus"></i> Agregar {{$titulo}}
@endif