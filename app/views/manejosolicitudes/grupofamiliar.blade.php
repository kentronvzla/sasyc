{{Form::open(['url'=>'personas/crear/'.$beneficiario->id,'id'=>'form-familiares','class'=>'saveajax'])}}                                         
<div id="lista_familia">
    <div class="lista">
        @if($familiares->count()>0)
        @foreach($familiares as $fam)
        <div class="row filaLista">
            <div class="col-xs-12 col-sm-4 col-md-2">
                <b>{{$fam->ci}}</b>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2">
                {{$fam->nombre}}
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2">
                {{$fam->apellido}}
            </div>
            <div class="col-xs-12 col-sm-3 col-md-1">
                {{$fam->sexo}}
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2">
                {{$fam->estadoCivil->nombre or ''}}
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2">
                {{Parentesco::find($fam->pivot->parentesco_id)->nombre}}
            </div>
            <div class="col-xs-12 col-sm-3 col-md-1">
                {{$fam->ingreso_mensual}}
            </div>
        </div>
        @endforeach
        @else
        <div class="row tituloLista">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h4>Aun no ha agregado un familiar</h4>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="row">
    {{Form::btInput($familiar,'tipo_nacionalidad_id',4)}}
    {{Form::btInput($familiar,'ci',4)}}
    {{Form::btInput($familiar,'sexo',4)}}
</div>
<div class="row">
    {{Form::btInput($familiar,'nombre',6)}}
    {{Form::btInput($familiar,'apellido',6)}}
</div>
<div class="row">
    {{Form::btInput($familiar,'estado_civil_id',6)}}
    {{Form::btSelect('parentesco_id', Parentesco::getCombo("Parentesco"), 0, 6)}}
</div>
<div class="row">
    {{Form::btInput($familiar,'ocupacion',6)}}
    {{Form::btInput($familiar,'ingreso_mensual',6)}}
</div>  
@include('templates.bootstrap.submit')
{{Form::close()}}