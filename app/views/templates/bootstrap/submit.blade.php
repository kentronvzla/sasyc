<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-{{$icon or "floppy-disk"}}"></i> {{$nombreSubmit or "Guardar"}}</button>
        @unless(isset($nomostrar))
        <button type="button" class="btn btn-default btn-volver"><i class="glyphicon glyphicon-backward"></i> Volver</button>
        @endunless
     </div>
</div>