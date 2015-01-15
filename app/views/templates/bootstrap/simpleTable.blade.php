<table class="table table-striped responsive">
    <thead>
        <tr>
            @foreach($prettyFields as $col)
            <th>{{$col}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach($collection as $object)
        <tr>
            @foreach($prettyFields as $key=>$col)
            <td>{{$object->getValueAt($key)}}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>