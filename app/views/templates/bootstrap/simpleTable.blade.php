<table class="table table-striped responsive">
    <thead>
        <tr>
            @foreach($prettyFields as $col)
            <th>{{$col}}</th>
            @endforeach
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($collection as $object)
        <tr>
            @foreach($prettyFields as $key=>$col)
            <td>{{$object->getValueAt($key)}}</td>
            @endforeach
            <td>
                @if(isset($parentId))
                <button class="btn btn-primary btn-xs btn-edit" data-id="{{$object->id}}" data-url="{{$url}}/modificar/{{$parentId}}"><span class="glyphicon glyphicon-pencil"></span></button>
                @else
                <button class="btn btn-primary btn-xs btn-edit" data-id="{{$object->id}}" data-url="{{$url}}/modificar"><span class="glyphicon glyphicon-pencil"></span></button>
                @endif
                <button class="btn btn-danger btn-xs btn-delete" data-id="{{$object->id}}" data-url="{{$url}}"><span class="glyphicon glyphicon-trash"></span></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>