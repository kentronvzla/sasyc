<div class="col-xs-12 col-sm-{{$numCols}} col-md-{{$numCols}}">
    @if($errors->has($attrName))
    <div class="form-group has-error has-feedback">
        @else
        <div class="form-group">
            @endif
            @if($inputType=="text")
            {{ Form::text($attrName, Input::old($attrName,$attrValue), $params)}}
            @elseif($inputType=="select")
            {{ Form::select($attrName, $options, Input::old($attrName,$attrValue), $params)}}
            @elseif($inputType=="password")
            {{ Form::password($attrName, $params)}}
            @elseif($inputType=="multiselect")
            {{ Form::select($attrName,$options,Input::old($attrName,$attrValue), $params)}}
            @elseif($inputType=="textarea")
            {{ Form::textarea($attrName, Input::old($attrName,$attrValue), $params)}}
            @endif
            @if($errors->has($attrName))
            @foreach($errors->get($attrName) as $message)
            <span class="help-block">{{$message}}.</span>
            @endforeach
            @endif
        </div>
    </div>