<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace {
/**
 * Area
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_ayuda_id
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Area whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class Area {}
}

namespace {
/**
 * AyudaCampos
 *
 * @property integer $ID
 * @property string $FORMULARIO
 * @property string $CAMPO
 * @property string $AYUDA
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereID($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereFORMULARIO($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereCAMPO($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereAYUDA($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereUpdatedAt($value)
 * @property integer $VERSION
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampos whereVERSION($value)
 * @property integer $id
 * @property string $formulario
 * @property string $campo
 * @property string $ayuda
 * @property integer $version
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereFormulario($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereCampo($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereAyuda($value)
 * @method static \Illuminate\Database\Query\Builder|\AyudaCampo whereVersion($value)
 */
	class AyudaCampo {}
}

namespace {
/**
 * Bitacora
 *
 * @property integer $id
 * @property integer $solicitud_id
 * @property string $fecha
 * @property string $nota
 * @property integer $usuario_id
 * @property string $memo
 * @property string $tipo
 * @property boolean $ind_activo
 * @property boolean $ind_alarma
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Usuario $usuario
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereNota($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUsuarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereMemo($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereTipo($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndActivo($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndAlarma($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUpdatedAt($value)
 * @property-read mixed $notafor
 * @property-read mixed $estatus_display
 * @property boolean $ind_atendida
 * @property-read mixed $vencida
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereIndAtendida($value)
 */
	class Bitacora {}
}

namespace {
/**
 * Configuracion
 *
 * @property integer $id
 * @property string $variable
 * @property string $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereVariable($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Configuracion whereVersion($value)
 */
	class Configuracion {}
}

namespace {
/**
 * Description of Defeventosasyc
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $tipo_doc
 * @property string $tipo_evento
 * @property boolean $ind_aprueba_auto
 * @property boolean $ind_doc_ext
 * @property boolean $ind_ctas_adic
 * @property boolean $ind_reng_adic
 * @property boolean $ind_detcomp_adic
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereTipoDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereTipoEvento($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndApruebaAuto($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndDocExt($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndCtasAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndRengAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereIndDetcompAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Defeventosasyc whereUpdatedAt($value)
 */
	class Defeventosasyc {}
}

namespace {
/**
 * Description of Departamento
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $supervisor_id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Usuario $supervisor
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereSupervisorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereUpdatedAt($value)
 * @property integer $version
 * @property-read \Illuminate\Database\Eloquent\Collection|\Usuario[] $usuarios
 * @method static \Illuminate\Database\Query\Builder|\Departamento whereVersion($value)
 */
	class Departamento {}
}

namespace {
/**
 * Description of Documentossasyc
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $documento_id
 * @property string $tipo_doc
 * @property string $tipo_evento
 * @property string $descripcion
 * @property string $fecha
 * @property string $estatus
 * @property integer $solicitud
 * @property string $ref_doc
 * @property integer $num_op
 * @property string $mensaje
 * @property integer $id_doc_ref
 * @property boolean $ind_aprueba_auto
 * @property boolean $ind_doc_ext
 * @property boolean $ind_ctas_adic
 * @property boolean $ind_reng_adic
 * @property boolean $ind_detcomp_adic
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Documento $documento
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereDocumentoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereTipoDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereTipoEvento($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereSolicitud($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereRefDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereNumOp($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereMensaje($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIdDocRef($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndApruebaAuto($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndDocExt($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndCtasAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndRengAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereIndDetcompAdic($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Documentossasyc whereUpdatedAt($value)
 */
	class Documentossasyc {}
}

namespace {
/**
 * Estado
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Estado whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Municipio[] $municipios
 * @property-read mixed $estatus_display
 */
	class Estado {}
}

namespace {
/**
 * EstadoCivil
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\EstadoCivil whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadoCivil whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadoCivil whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadoCivil whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadoCivil whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Persona[] $personas
 * @property-read mixed $estatus_display
 */
	class EstadoCivil {}
}

namespace {
/**
 * Description of FotosSolicitud
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property string $descripcion
 * @property string $foto
 * @property boolean $ind_reporte
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read mixed $url
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereFoto($value)
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereIndReporte($value)
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\FotoSolicitud whereUpdatedAt($value)
 */
	class FotoSolicitud {}
}

namespace {
/**
 * Grupo
 *
 * @property integer $id
 * @property string $name
 * @property string $permissions
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo wherePermissions($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Grupo whereVersion($value)
 */
	class Grupo {}
}

namespace {
/**
 * Memo
 *
 * @property integer $id
 * @property string $fecha
 * @property string $numero
 * @property string $origen
 * @property string $destino
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Memo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereNumero($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereOrigen($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereDestino($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereUpdatedAt($value)
 * @property string $asunto
 * @property integer $origen_id
 * @property integer $destino_id
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Memo whereAsunto($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereOrigenId($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereDestinoId($value)
 * @property integer $usuario_id
 * @property-read \Usuario $usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\Solicitud[] $solicitudes
 * @method static \Illuminate\Database\Query\Builder|\Memo whereUsuarioId($value)
 */
	class Memo {}
}

namespace {
/**
 * Municipio
 *
 * @property integer $id
 * @property integer $estado_id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Estado $estado
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Parroquia[] $parroquias
 * @property-read mixed $estatus_display
 */
	class Municipio {}
}

namespace {
/**
 * NivelAcademico
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereOrden($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class NivelAcademico {}
}

namespace Oracle{
/**
 * Description of Beneficiario
 *
 * @author Richard Arrieta
 * @property-read \Illuminate\Database\Eloquent\Collection|\Presupuesto[] $presupuestos
 * @property-read mixed $id
 * @property-read mixed $estatus_display
 */
	class Beneficiario {}
}

namespace Oracle{
/**
 * Description of ComprobDetAdic
 *
 * @author Reysmer Valle
 * @property-read mixed $estatus_display
 */
	class ComprobDetAdic {}
}

namespace Oracle{
/**
 * Description of CtasDocAdic
 *
 * @author Reysmer Valle
 * @property-read mixed $estatus_display
 */
	class CtasDocAdic {}
}

namespace Oracle{
/**
 * Description of Beneficiario
 *
 * @author Richard Arrieta
 * @property-read \Illuminate\Database\Eloquent\Collection|\Presupuesto[] $presupuestos
 * @property-read mixed $id
 * @property-read mixed $estatus_display
 * @property integer $BENEFICIARIO_ID
 * @property string $CCOSTO
 * @property string $COD_ACC_INT
 * @property string $DEPENDENCIA
 * @property string $DESCRIPCION
 * @property string $ESTATUS
 * @property string $FECHA
 * @property integer $ID
 * @property integer $ID_DOC
 * @property string $IND_REVERSO
 * @property string $MENSAJE
 * @property string $MONEDA
 * @property float $MONTO
 * @property string $REFERENCIA
 * @property integer $SOLICITUD_ID
 * @property string $TIPO_DOC
 * @property integer $VERSION
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereBENEFICIARIOID($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereCCOSTO($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereCODACCINT($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereDEPENDENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereDESCRIPCION($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereESTATUS($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereFECHA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereID($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereIDDOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereINDREVERSO($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereMENSAJE($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereMONEDA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereMONTO($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereREFERENCIA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereSOLICITUDID($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereTIPODOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\Documento whereVERSION($value)
 */
	class Documento {}
}

namespace Oracle{
/**
 * Description of DocumentosOrigen
 *
 * @author Reysmer Valle
 * @property-read mixed $estatus_display
 */
	class DocumentosOrigen {}
}

namespace Oracle{
/**
 * Description of RengSumAdic
 *
 * @author Reysmer Valle
 * @property-read mixed $id
 * @property-read mixed $estatus_display
 */
	class RengSumAdic {}
}

namespace Oracle{
/**
 * Description of TipoEvento
 *
 * @author Dhaily Robles
 * @property string $CODRUTA
 * @property string $DESCTIPODOC
 * @property string $INDREFDOC
 * @property string $TIPODOC
 * @property string $TIPODOCREF
 * @property string $TIPOEVENTO
 * @property-read \Illuminate\Database\Eloquent\Collection|\Defeventosasyc[] $defeventosasyc
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereCODRUTA($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereDESCTIPODOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereINDREFDOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereTIPODOC($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereTIPODOCREF($value)
 * @method static \Illuminate\Database\Query\Builder|\Oracle\TipoEvento whereTIPOEVENTO($value)
 */
	class TipoEvento {}
}

namespace {
/**
 * Organismo
 *
 * @property integer $id
 * @property string $nombre
 * @property boolean $ind_externo
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereIndExterno($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class Organismo {}
}

namespace {
/**
 * Parentesco
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereUpdatedAt($value)
 * @property string $inverso
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereInverso($value)
 */
	class Parentesco {}
}

namespace {
/**
 * Parroquia
 *
 * @property integer $id
 * @property integer $municipio_id
 * @property integer $municipio_id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Estado $municipio
 * @property-read \Municipio $municipio
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereMunicipioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class Parroquia {}
}

namespace {
/**
 * Persona
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $tipo_nacionalidad_id
 * @property integer $ci
 * @property string $sexo
 * @property integer $estado_civil_id
 * @property string $lugar_nacimiento
 * @property \Carbon\Carbon $fecha_nacimiento
 * @property integer $nivel_academico_id
 * @property integer $co_id
 * @property integer $parroquia_id
 * @property string $ciudad
 * @property string $zona_sector
 * @property string $calle_avenida
 * @property string $apto_casa
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $telefono_otro
 * @property string $email
 * @property string $twitter
 * @property boolean $ind_trabaja
 * @property string $ocupacion
 * @property float $ingreso_mensual
 * @property string $observaciones
 * @property string $ind_asegurado
 * @property string $seguro_id
 * @property string $cobertura
 * @property string $otro_apoyo
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoNacionalidad $tipoNacionalidad
 * @property-read \EstadoCivil $estadoCivil
 * @property-read \NivelAcademico $nivelAcademico
 * @property-read \Parentesco $co
 * @property-read \Estado $estado
 * @property-read \Municipio $municipio
 * @property-read \Parroquia $parroquia
 * @method static \Illuminate\Database\Query\Builder|\Persona whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereApellido($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTipoNacionalidadId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCi($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereSexo($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEstadoCivilId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereLugarNacimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereNivelAcademicoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereParentescoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereMunicipioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereParroquiaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCiudad($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereZonaSector($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCalleAvenida($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereAptoCasa($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoFijo($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoCelular($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTelefonoOtro($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereTwitter($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIndTrabaja($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereOcupacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIngresoMensual($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereIndAsegurado($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereEmpresaSeguro($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCobertura($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereOtroApoyo($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereComoConocioFps($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Persona[] $familiaresBeneficiario
 * @property-read \Illuminate\Database\Eloquent\Collection|\Persona[] $familiaresSolicitante
 * @property-read \Illuminate\Database\Eloquent\Collection|\Solicitud[] $solicitudes
 * @property-read mixed $edad
 * @property-read mixed $documento
 * @property-read mixed $nombre_completo
 * @property-read mixed $informacion_contacto
 * @property-read mixed $ingreso_mensual_for
 * @property-read mixed $estatus_display
 */
	class Persona {}
}

namespace {
/**
 * Presupuesto
 *
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $requerimiento_id
 * @property integer $proceso_id
 * @property integer $documento_id
 * @property string $moneda
 * @property integer $beneficiario_id
 * @property integer $cantidad
 * @property float $monto
 * @property float $montoapr
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $estatus_doc
 * @property-read \Solicitud $solicitud
 * @property-read \Proceso $proceso
 * @property-read \Requerimiento $requerimiento
 * @property-read \Oracle\Beneficiario $beneficiario
 * @property-read \Oracle\Documento $documento
 * @property-read mixed $monto_for
 * @property-read mixed $montoapr_for
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereRequerimientoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereProcesoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereDocumentoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereMoneda($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereBeneficiarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCantidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereMonto($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereMontoapr($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereSts($value)
 * @property string $cheque 
 * @property string $numop 
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereEstatusDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCheque($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereNumop($value)
 */
	class Presupuesto {}
}

namespace {
/**
 * Description of Proceso
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $defeventosasyc_id
 * @property boolean $ind_cantidad
 * @property boolean $ind_monto
 * @property boolean $ind_beneficiario
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereTipoDoc($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereIndCantidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereIndMonto($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereIndBeneficiario($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Proceso whereUpdatedAt($value)
 */
	class Proceso {}
}

namespace {
/**
 * Recaudo
 *
 * @property integer $id 
 * @property string $nombre 
 * @property string $descripcion 
 * @property boolean $ind_obligatorio 
 * @property boolean $ind_vence 
 * @property boolean $ind_activo 
 * @property integer $tipo_ayuda_id 
 * @property integer $version 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \TipoAyuda $tipoAyuda 
 * @property-read mixed $estatus_display 
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndObligatorio($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndVence($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndActivo($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereUpdatedAt($value)
 */
	class Recaudo {}
}

namespace {
/**
 * RecaudoSolicitud
 *
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $recaudo_id
 * @property boolean $ind_recibido
 * @property string $fecha_vencimiento
 * @property mixed $documento
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Recaudo $recaudo
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereRecaudoId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereIndRecibido($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereDocumento($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereUpdatedAt($value)
 * @property-read mixed $documento_link
 * @property-read mixed $estatus_display
 */
	class RecaudoSolicitud {}
}

namespace {
/**
 * Recepcion
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class Recepcion {}
}

namespace {
/**
 * Referente
 *
 * @property integer $id
 * @property string $nombre
 * @property string $cargo
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Referente whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereCargo($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class Referente {}
}

namespace {
/**
 * Requerimiento
 *
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $cod_item
 * @property string $cod_cta
 * @property string $tipo_requerimiento_id
 * @property integer $tipo_ayuda_id
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodItem($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodCta($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipoRequerimientoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereUpdatedAt($value)
 * @property-read \TipoRequerimiento $tipoRequerimiento
 * @property-read mixed $estatus_display
 * @property-read \Illuminate\Database\Eloquent\Collection|\Proceso')->withTimestamps([] $procesos
 */
	class Requerimiento {}
}

namespace SchemaHelper{
/**
 * SchemaHelper\Column
 *
 */
	class Column {}
}

namespace SchemaHelper{
/**
 * SchemaHelper\Table
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\SchemaHelper\\Column[] $columns
 */
	class Table {}
}

namespace {
/**
 * Solicitud
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $persona_beneficiario_id
 * @property integer $persona_solicitante_id
 * @property integer $area_id
 * @property integer $referente_id
 * @property integer $recepcion_id
 * @property integer $organismo_id
 * @property boolean $ind_mismo_benef
 * @property boolean $ind_inmediata
 * @property boolean $ind_beneficiario_menor
 * @property string $actividad
 * @property string $referencia
 * @property string $accion_tomada
 * @property string $necesidad
 * @property string $tipo_proc
 * @property integer $num_proc
 * @property string $facturas
 * @property string $observaciones
 * @property string $moneda
 * @property string $estatus
 * @property integer $usuario_asignacion_id
 * @property integer $usuario_autorizacion_id
 * @property \Carbon\Carbon $fecha_asignacion
 * @property \Carbon\Carbon $fecha_aceptacion
 * @property \Carbon\Carbon $fecha_aprobacion
 * @property \Carbon\Carbon $fecha_cierre
 * @property integer $tipo_vivienda_id
 * @property integer $tenencia_id
 * @property string $informe_social
 * @property float $total_ingresos
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Persona $personaBeneficiario
 * @property-read \Persona $personaSolicitante
 * @property-read \Area $area
 * @property-read \Referente $referente
 * @property-read \Recepcion $recepcion
 * @property-read \Organismo $organismo
 * @property-read \UsuarioAsignacion $usuarioAsignacion
 * @property-read \UsuarioAutorizacion $usuarioAutorizacion
 * @property-read \TipoVivienda $tipoVivienda
 * @property-read \Tenencia $tenencia
 * @property-read \Illuminate\Database\Eloquent\Collection|\FamiliaPersona[] $familiaPersonas
 * @property-read \Illuminate\Database\Eloquent\Collection|\Presupuesto[] $presupuestos
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAno($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePersonaBeneficiarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePersonaSolicitanteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAreaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferenteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereRecepcionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereOrganismoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndMismoBenef($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndInmediata($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndBeneficiarioMenor($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereActividad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferencia($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAccionTomada($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNecesidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNumProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFacturas($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereMoneda($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUsuarioAsignacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUsuarioAutorizacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaSolicitud($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAsignacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAceptacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAprobacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaCierre($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoViviendaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTenenciaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereInformeSocial($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTotalIngresos($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUpdatedAt($value)
 * @property integer $memo_id
 * @property string $beneficiario_json
 * @property string $solicitante_json
 * @property integer $departamento_id
 * @property-read \Departamento $departamento
 * @property-read \Illuminate\Database\Eloquent\Collection|\Bitacora[] $bitacoras
 * @property-read \Illuminate\Database\Eloquent\Collection|\RecaudoSolicitud')->orderBy('id[] $recaudosSolicitud
 * @property-read \Illuminate\Database\Eloquent\Collection|\FotoSolicitud')->orderBy('id[] $fotos
 * @property-read mixed $total_ingresos_for
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereMemoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereBeneficiarioJson($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereSolicitanteJson($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereDepartamentoId($value)
 * @method static \Solicitud ordenar()
 * @method static \Solicitud aplicarFiltro($filtro)
 * @method static \Solicitud eagerLoad()
 * @property string $referencia_externa
 * @property string $num_solicitud
 * @property-read mixed $tipo_proc_for
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferenciaExterna($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNumSolicitud($value)
 */
	class Solicitud {}
}

namespace {
/**
 * Tenencia
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class Tenencia {}
}

namespace {
/**
 * TipoAyuda
 *
 * @property integer $id
 * @property string $nombre
 * @property string $cod_acc_int
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereCodAccInt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Area[] $areas
 * @property-read mixed $estatus_display
 * @property-read \Illuminate\Database\Eloquent\Collection|\Recaudo[] $recaudos 
 */
	class TipoAyuda {}
}

namespace {
/**
 * TipoNacionalidad
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class TipoNacionalidad {}
}

namespace {
/**
 * TipoRequerimiento
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 * @property string $descripcion
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereDescripcion($value)
 */
	class TipoRequerimiento {}
}

namespace {
/**
 * TipoVivienda
 *
 * @property integer $id
 * @property string $nombre
 * @property integer $version
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereUpdatedAt($value)
 * @property-read mixed $estatus_display
 */
	class TipoVivienda {}
}

namespace {
/**
 * Usuario
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property boolean $activated
 * @property string $activation_code
 * @property string $activated_at
 * @property string $last_login
 * @property string $persist_code
 * @property string $reset_password_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $departamento_id
 * @property-read mixed $activatedfor
 * @property-read \Departamento $departamento
 * @property-read \Illuminate\Database\Eloquent\Collection|\Grupo[] $grupos
 * @property-read mixed $nombregrupo
 * @property-read mixed $idgrupo
 * @property-read mixed $estatus_display
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereActivated($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereActivationCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereActivatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereLastLogin($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario wherePersistCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereResetPasswordCode($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereDepartamentoId($value)
 * @property integer $version
 * @property-read mixed $grupos_display
 * @method static \Illuminate\Database\Query\Builder|\Usuario whereVersion($value)
 */
	class Usuario {}
}

