<table class="table" border='1'>
    <tr>
        <td>
            <strong>Tipo de vivienda:</strong>
        </td>
        <td>
           {{$solicitud->TipoVivienda->nombre}}
        </td>
         <td>
           {{$solicitud->TipoVivienda->version}}
        </td>
    </tr>
    <tr>
        <td>
            <strong>Tipo de Tenencia:</strong>
        </td>
        <td>
           {{$solicitud->Tenencia->nombre}}
        </td>
         <td>
           {{$solicitud->Tenencia->version}}
        </td>
    </tr>
</table>