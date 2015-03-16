  <div class="panel panel-danger">
    <div class="panel-heading" data-toggle="collapse" data-parent="#PanelBeneficiario" href="#PanelBeneficiario">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#PanelBeneficiario" href="#PanelBeneficiario">
                Por Beneficiario
            </a>
        </h4>
    </div>
    <div id="PanelBeneficiario" class="panel-collapse collapse">
        <div class="panel-body">
             <div class="row">
                {{Form::btInput($persona, 'nombre', 6)}}
                {{Form::btInput($persona, 'apellido', 6)}}
            </div>
            <div class="row">
                {{Form::btInput($persona, 'ci', 6)}}
                {{Form::btInput($persona, 'sexo', 6)}}
            </div>
        </div>
    </div>
</div>