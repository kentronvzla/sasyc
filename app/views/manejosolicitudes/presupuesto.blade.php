<table class="table">
    <tr>
        <th>Tipo</th>
        <th>Requerimiento</th>
        <th>Cantidad</th>
        <th>Beneficiario/Proveedor</th>
        <th>Monto</th>
        <th>Status</th>
        <th>Doc.</th>
    </tr>
    <tr>
        <td>
            OP   
        </td>
        <td>
            Citugia
        </td>
        <td>
            1
        </td> 
        <td>
            Clinicas Caracas
        </td>
        <td>
            1.500.000,00
        </td>
        <td>
            PEN
        </td>
        <td>
            287445
        </td>            
    </tr>
</table>
<div class="row">
    {{Form::btInput($presupuesto,'tipo_requerimiento_id',4)}}
    {{Form::btInput($presupuesto,'requerimiento_id',4)}}
    {{Form::btInput($presupuesto,'cantidad',4)}}
</div>
<div class="row">
    {{Form::btInput($presupuesto,'num_benef',6)}}
    {{Form::btInput($presupuesto,'monto',6)}}
</div>

<div class="col-xs-12 col-sm-12 col-md-6">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Fecha">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-6">        
    <div class="form-group">
        <select class="form-control" placeholder="Autorizador">
            <option value="" >Autorizador</option>
            <option value="" ></option>
            <option value="" ></option>
            <option value="" ></option>
            <option value="" ></option>
            <option value="" ></option>
            <option value="" ></option>
        </select> 
    </div> 
</div>  