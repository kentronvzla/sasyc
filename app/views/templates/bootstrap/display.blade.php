<div class="col-xs-12 col-sm-{{$numCols}} col-md-{{$numCols}}">
    @if($inline)
        <div class="row">
            {{Form::label($params['id'], $params['placeholder'], ['class'=>'control-label col-md-2'])}}
            <p class="col-md-10">{{$attrValue}}</p>
        </div>
    @else
        <div class="form-group">
            {{Form::label($params['id'], $params['placeholder'], ['class'=>'control-label'])}}
            <p>{{$attrValue}}</p>
        </div>
    @endif
</div>