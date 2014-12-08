<div class="row">
    @foreach($errors->all() as $mensaje)
    <div class="col-lg-4">
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{$mensaje}}
        </div>
    </div>
    @endforeach
</div>