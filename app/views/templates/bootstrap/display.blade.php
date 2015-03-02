<div class="col-xs-12 col-sm-{{$numCols}} col-md-{{$numCols}}">
    @if($inline)
        <b>{{$params['placeholder']}}:</b> {{$attrValue}}
    @else
        <div class="form-group">
            {{Form::label($params['id'], $params['placeholder'], ['class'=>'control-label'])}}
            <p>{{$attrValue}}</p>
        </div>
    @endif
</div>