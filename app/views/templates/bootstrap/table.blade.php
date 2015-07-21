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
    </thead>
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
                @if($hasEdit)
                    @if($hasModal)
                        <a class="btn btn-primary btn-xs abrir-modal" href="{{$url}}/modificar/{{$object->id}}" target="_blank"><i class="fa fa-pencil"></i></a>
                    @else
                        <a class="btn btn-primary btn-xs" href="{{$url}}/modificar/{{$object->id}}"><i class="fa fa-pencil"></i></a>
                    @endif
                @endif
                @if($hasDelete)
                <button type="submit" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></button>
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