<table class="table table-striped responsive">
    <thead>
        <tr>
            @foreach($prettyFields as $col)
            <th>{{$col}}</th>
            @endforeach
            @if(count($botones)>0)
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
            <td>
                @foreach($botones as $icon => $boton)
                <a class="btn btn-primary btn-xs glyphicon glyphicon-{{$icon}}" title="{{$boton}}" data-id='{{$object->id}}' data-url='{{$urlDelete}}'></a>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>