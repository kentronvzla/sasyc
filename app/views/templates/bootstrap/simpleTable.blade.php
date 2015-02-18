<table class="table table-striped responsive {{$datatable ?'jqueryTable':''}}">
    <thead>
        <tr>
            @foreach($prettyFields as $col)
            <th>{{$col}}</th>
            @endforeach
            @if(count($botones)>0 || count($href)>0)
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
            @if(count($botones)>0)
            <td>
                @foreach($botones as $icon => $boton)
                <a class="btn btn-primary btn-xs glyphicon glyphicon-{{$icon}}" title="{{$boton}}" data-id='{{$object->id}}' data-url='{{$urlDelete}}'></a>
                @endforeach
            </td>
            @endif
            @if(count($href)>0)
            <td>
                @foreach($href as $icon => $link)
                <a target="_blank" class="btn btn-primary btn-xs glyphicon glyphicon-{{$icon}}" href="{{url($link)}}/{{$object->id}}"></a>
                @endforeach
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>