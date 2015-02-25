<div class="col-xs-12 col-md-{{$numCols}}">
    <div class="form-group {{$errors->has($attrName) ? 'has-error has-feedback':''}}">
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
        @elseif($inputType=="file")
            {{ Form::file($attrName, $params)}}
        @elseif($inputType=="boolean")
            <label for="{{$params['id']}}">{{$params['placeholder']}}</label>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default {{Input::old($attrName,$attrValue,0)==1 ? "active":""}}">
                    {{ Form::radio($attrName,1,Input::old($attrName,$attrValue)==1, $params)}} Si
                </label>
                <label class="btn btn-default {{Input::old($attrName,$attrValue,0)==0 ? "active":""}}">
                    {{ Form::radio($attrName,0,Input::old($attrName,$attrValue,0)==0, $params)}} No
                </label>
            </div>
        @endif
        @if($errors->has($attrName))
            @foreach($errors->get($attrName) as $message)
                <span class="help-block">{{$message}}.</span>
            @endforeach
        @endif
    </div>
</div>