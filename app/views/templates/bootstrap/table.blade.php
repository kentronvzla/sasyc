<table class="table table-striped bootstrap-datatable jqueryTable responsive">
    <thead>
        <tr>
            @foreach($prettyFields as $col)
            <th>{{$col}}</th>
            @endforeach
            @if($hasEdit || $hasDelete)
            <th>Acciones</th>
            @endif
        </tr>
    </thead
    <tbody>
        @foreach($collection as $object)
        <tr>
            @foreach($prettyFields as $key=>$col)
            <td>{{$object->getValueAt($key)}}</td>
            @endforeach
            @if($hasEdit || $hasDelete)
            <td>
                {{Form::open(array('url'=>$url."", 'method'=>'POST', 'class'=>'form-eliminar','id'=>'form-'.$object->id))}}
                {{Form::hidden('_method','DELETE')}}
                {{Form::hidden('id',$object->id)}}
                @if(count($appends)>0)
                @foreach($appends as $key=>$append)
                <a class="btn btn-primary btn-xs" href="{{$url}}/../{{$append}}?id={{$object->id}}"><i class="glyphicon glyphicon-{{$key}}"></i></a>
                @endforeach
                @endif
                @if($hasEdit)
                <a class="btn btn-primary btn-xs" href="{{$url}}/modificar/{{$object->id}}"><i class="glyphicon glyphicon-pencil"></i></a>
                @endif
                @if($hasDelete)
                <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
                @endif
                {{Form::close()}}
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@if($hasAdd)
@include('templates.bootstrap.btnagregar',array('url'=>$urlAdd,'nombre'=>$nombreAdd))
@endif