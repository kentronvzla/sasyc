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
 * Description of Area
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $tipo_ayuda_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Area whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Area whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Area whereVersion($value)
 */
	class Area {}
}

namespace {
/**
 * Description of Bitacora
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property string $fecha
 * @property string $nota
 * @property integer $usuario_id
 * @property string $memo
 * @property string $tipo
 * @property boolean $ind_activo
 * @property boolean $ind_alarma
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
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Bitacora whereVersion($value)
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
 */
	class Configuracion {}
}

namespace {
/**
 * Description of Documento
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $tipo
 * @property string $descripcion
 * @property string $fecha
 * @property string $estatus
 * @property boolean $ind_reverso
 * @property integer $solicitud_id
 * @property string $mensaje
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @method static \Illuminate\Database\Query\Builder|\Documento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereTipo($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereIndReverso($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereMensaje($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Documento whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Documento whereVersion($value)
 */
	class Documento {}
}

namespace {
/**
 * Description of Estado
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Estado whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Estado whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Estado whereVersion($value)
 */
	class Estado {}
}

namespace {
/**
 * Description of EstadosCivil
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\EstadosCivil whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadosCivil whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadosCivil whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\EstadosCivil whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\EstadoCivil whereVersion($value)
 */
	class EstadoCivil {}
}

namespace {
/**
 * Description of FamiliaPersona
 *
 * @author Nadin Yamani
 * @property integer $persona_beneficiario_id
 * @property integer $persona_familia_id
 * @property string $parentesco
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \PersonaBeneficiario $personaBeneficiario
 * @property-read \PersonaFamilia $personaFamilia
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona wherePersonaBeneficiarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona wherePersonaFamiliaId($value)
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereParentesco($value)
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereUpdatedAt($value)
 * @property integer $id
 * @property integer $parentesco_id
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereParentescoId($value)
 * @method static \Illuminate\Database\Query\Builder|\FamiliaPersona whereVersion($value)
 */
	class FamiliaPersona {}
}

namespace {
/**
 * Description of InformesSocial
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $tipo_vivienda_id
 * @property integer $tendencia_id
 * @property string $observaciones
 * @property float $total_ingresos
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \TipoVivienda $tipoVivienda
 * @property-read \Tendencia $tendencia
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereTipoViviendaId($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereTendenciaId($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereTotalIngresos($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\InformesSocial whereUpdatedAt($value)
 */
	class InformesSocial {}
}

namespace {
/**
 * Description of Memo
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $fecha
 * @property string $numero
 * @property string $origen
 * @property string $destino
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Memo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereFecha($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereNumero($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereOrigen($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereDestino($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Memo whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Memo whereVersion($value)
 */
	class Memo {}
}

namespace {
/**
 * Description of Municipio
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $estado_id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Estado $estado
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Municipio whereVersion($value)
 */
	class Municipio {}
}

namespace {
/**
 * Description of NivelesAcademico
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property integer $orden
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereOrden($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\NivelesAcademico whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\NivelAcademico whereVersion($value)
 */
	class NivelAcademico {}
}

namespace {
/**
 * Description of Organismo
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property boolean $ind_externo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereIndExterno($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Organismo whereVersion($value)
 */
	class Organismo {}
}

namespace {
/**
 * Description of Parentesco
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Parentesco whereVersion($value)
 */
	class Parentesco {}
}

namespace {
/**
 * Description of Parroquia
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Estado $estado
 * @property-read \Municipio $municipio
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereEstadoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereMunicipioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Parroquia whereVersion($value)
 */
	class Parroquia {}
}

namespace {
/**
 * Description of Persona
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $tipo_nacionalidad_id
 * @property integer $ci
 * @property string $sexo
 * @property integer $estado_civil_id
 * @property string $lugar_nacimiento
 * @property string $fecha_nacimiento
 * @property integer $nivel_academico_id
 * @property integer $parentesco_id
 * @property integer $estado_id
 * @property integer $municipio_id
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
 * @property string $empresa_seguro
 * @property string $cobertura
 * @property string $otro_apoyo
 * @property string $como_conocio_fps
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoNacionalidad $tipoNacionalidad
 * @property-read \EstadoCivil $estadoCivil
 * @property-read \NivelAcademico $nivelAcademico
 * @property-read \Parentesco $parentesco
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
 * @method static \Illuminate\Database\Query\Builder|\Persona whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Persona whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Persona whereVersion($value)
 */
	class Persona {}
}

namespace {
/**
 * Description of Presupuesto
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $solicitud_id
 * @property integer $requerimiento_id
 * @property integer $tipo_requerimiento_id
 * @property string $cod_item
 * @property string $cod_cta
 * @property integer $num_benef
 * @property integer $cantidad
 * @property float $monto
 * @property string $estatus
 * @property integer $id_doc_proc
 * @property integer $id_sol_sum
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Requerimiento $requerimiento
 * @property-read \TipoRequerimiento $tipoRequerimiento
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereRequerimientoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereTipoRequerimientoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCodItem($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCodCta($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereNumBenef($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCantidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereMonto($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereIdDocProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereIdSolSum($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Presupuesto whereVersion($value)
 */
	class Presupuesto {}
}

namespace {
/**
 * Description of Recaudo
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property boolean $ind_obligatorio
 * @property boolean $ind_vence
 * @property boolean $ind_activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndObligatorio($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndVence($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereIndActivo($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Recaudo whereVersion($value)
 */
	class Recaudo {}
}

namespace {
/**
 * Description of RecaudoSolicitud
 *
 * @author Nadin Yamani
 * @property integer $solicitud_id
 * @property integer $recaudo_id
 * @property boolean $ind_recibido
 * @property string $fecha_vencimiento
 * @property mixed $documento
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Solicitud $solicitud
 * @property-read \Recaudo $recaudo
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereSolicitudId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereRecaudoId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereIndRecibido($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereFechaVencimiento($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereDocumento($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereUpdatedAt($value)
 * @property integer $id
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\RecaudoSolicitud whereVersion($value)
 */
	class RecaudoSolicitud {}
}

namespace {
/**
 * Description of Recepcion
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Recepcion whereVersion($value)
 */
	class Recepcion {}
}

namespace {
/**
 * Description of Referente
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $cargo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Referente whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereCargo($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Referente whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Referente whereVersion($value)
 */
	class Referente {}
}

namespace {
/**
 * Description of Requerimiento
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $cod_item
 * @property string $cod_cta
 * @property string $tipo
 * @property integer $tipo_ayuda_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \TipoAyuda $tipoAyuda
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodItem($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCodCta($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipo($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Requerimiento whereVersion($value)
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
 * Description of Solicitud
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property integer $ano
 * @property string $descripcion
 * @property integer $persona_beneficiario_id
 * @property integer $persona_solicitante_id
 * @property integer $tipo_ayuda_id
 * @property integer $area_id
 * @property integer $referente_id
 * @property integer $recepcion_id
 * @property integer $organismo_id
 * @property boolean $ind_mismo_benef
 * @property boolean $ind_inmediata
 * @property string $actividad
 * @property string $referencia
 * @property string $accion_tomada
 * @property string $necesidad
 * @property string $tipo_proc
 * @property integer $num_proc
 * @property string $facturas
 * @property string $observaciones
 * @property string $moneda
 * @property integer $prioridad
 * @property string $estatus
 * @property integer $usuario_asignacion_id
 * @property integer $usuario_autorizacion_id
 * @property \Carbon\Carbon $fecha_solicitud
 * @property \Carbon\Carbon $fecha_asignacion
 * @property \Carbon\Carbon $fecha_aceptacion
 * @property \Carbon\Carbon $fecha_aprobacion
 * @property \Carbon\Carbon $fecha_cierre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Persona $personaBeneficiario
 * @property-read \Persona $personaSolicitante
 * @property-read \TipoAyuda $tipoAyuda
 * @property-read \Area $area
 * @property-read \Referente $referente
 * @property-read \Recepcion $recepcion
 * @property-read \Organismo $organismo
 * @property-read \UsuarioAsignacion $usuarioAsignacion
 * @property-read \UsuarioAutorizacion $usuarioAutorizacion
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAno($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereDescripcion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePersonaBeneficiarioId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePersonaSolicitanteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoAyudaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAreaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferenteId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereRecepcionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereOrganismoId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndMismoBenef($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndInmediata($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereActividad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereReferencia($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereAccionTomada($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNecesidad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereNumProc($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFacturas($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereObservaciones($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereMoneda($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud wherePrioridad($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereEstatus($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUsuarioAsignacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUsuarioAutorizacionId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaSolicitud($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAsignacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAceptacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaAprobacion($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereFechaCierre($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereUpdatedAt($value)
 * @property boolean $ind_beneficiario_menor
 * @property integer $tipo_vivienda_id
 * @property integer $tendencia_id
 * @property string $informe_social
 * @property float $total_ingresos
 * @property integer $version
 * @property-read \Illuminate\Database\Eloquent\Collection|\FamiliaPersona[] $familiaPersonas
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereIndBeneficiarioMenor($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTipoViviendaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTendenciaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereInformeSocial($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereTotalIngresos($value)
 * @method static \Illuminate\Database\Query\Builder|\Solicitud whereVersion($value)
 */
	class Solicitud {}
}

namespace {
/**
 * Description of Tenencia
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\Tenencia whereVersion($value)
 */
	class Tenencia {}
}

namespace {
/**
 * Description of TipoAyuda
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property string $cod_acc_int
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereCodAccInt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\TipoAyuda whereVersion($value)
 */
	class TipoAyuda {}
}

namespace {
/**
 * Description of TipoNacionalidad
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\TipoNacionalidad whereVersion($value)
 */
	class TipoNacionalidad {}
}

namespace {
/**
 * Description of TipoRequerimiento
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\TipoRequerimiento whereVersion($value)
 */
	class TipoRequerimiento {}
}

namespace {
/**
 * Description of TipoVivienda
 *
 * @author Nadin Yamani
 * @property integer $id
 * @property string $nombre
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereNombre($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereUpdatedAt($value)
 * @property integer $version
 * @method static \Illuminate\Database\Query\Builder|\TipoVivienda whereVersion($value)
 */
	class TipoVivienda {}
}

