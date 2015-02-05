<div class="row">
    <div class="col-lg-12">
        <button type="submit" class="btn btn-primary {{$clase or ""}}"><i class="glyphicon glyphicon-{{$icon or "floppy-disk"}}"></i> {{$nombreSubmit or "Guardar"}}</button>
        @unless(isset($nomostrar))
        <button type="button" class="btn btn-default {{$btn_type or "btn-reset"}}"><i class="glyphicon glyphicon-trash"></i> Cancelar</button>
        @endunless
     </div>
</div>