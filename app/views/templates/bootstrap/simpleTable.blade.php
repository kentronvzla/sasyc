<div class="table-responsive">
    <table class="table table-striped  {{$datatable ?'jqueryTable':''}}">
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
                    <td class="{{$object->isDecimalField($key) ? 'decimal-format':''}}">
                            @if($object->isBooleanField($key))
                                {{$object->getValueAt($key) == 't' ? 'SI':'NO'}}
                            @else
                                {{$object->getValueAt($key)}}
                            @endif  
                    </td>
                @endforeach
                @if(count($botones)>0)
                    <td>
                        @foreach($botones as $icon => $boton)
                            <a class="btn btn-primary btn-xs fa fa-{{$icon}}" title="{{$boton}}" data-id='{{$object->id}}' data-url='{{$urlDelete}}'></a>
                        @endforeach
                    </td>
                @endif
                @if(count($href)>0)
                    <td>
                        @foreach($href as $icon => $link)
                            <a target="_blank" class="btn btn-primary btn-xs fa fa-{{$icon}}" href="{{url($link)}}/{{$object->id}}"></a>
                        @endforeach
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>