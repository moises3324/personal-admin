<?php

include_once '../models/Empleado.php';
include_once '../models/Contratacion.php';
include_once '../services/EmpleadoContratacionService.php';

$empleado = new Empleado();
$contratacion = new Contratacion();
$empleadoContratacionService = new EmpleadoContratacionService();

$accion = "";
//variables empleado
$empleado_id = "";
$empleado_rut = "";
$empleado_nombres = "";
$empleado_apellido_paterno = "";
$empleado_apellido_materno = "";
//variables contratacion
$contratacion_tipo_contrato_id = "";
$contratacion_centro_costo_id = "";
$contratacion_fecha_termino = "";

if ($_POST) {
    $accion = $_POST['accion'] ?? null;
    $empleado_id = $_POST['empleado-id'] ?? null;
    $empleado_rut = $_POST['empleado-rut'] ?? null;
    $empleado_nombres = $_POST['empleado-nombres'] ?? null;
    $empleado_apellido_paterno = $_POST['empleado-apellido-paterno'] ?? null;
    $empleado_apellido_materno = $_POST['empleado-apellido-materno'] ?? null;
    $contratacion_tipo_contrato_id = $_POST['contratacion-tipo-contrato-id'] ?? null;
    $contratacion_centro_costo_id = $_POST['contratacion-centro-costo-id'] ?? null;
    $contratacion_fecha_termino = $_POST['contratacion-fecha-termino'] ?? null;

    switch ($accion) {
        case 'create':
            $empleado->setRut($empleado_rut);
            $empleado->setNombres($empleado_nombres);
            $empleado->setApellidoPaterno($empleado_apellido_paterno);
            $empleado->setApellidoMaterno($empleado_apellido_materno);
            $contratacion->setTipoContratoId($contratacion_tipo_contrato_id);
            $contratacion->setCentoCostoId($contratacion_centro_costo_id);
            $contratacion->setFechaTermino($contratacion_fecha_termino);
            if ($empleadoContratacionService->add($empleado, $contratacion)) {
                echo 'Registro agregado correctamente';
            }
            break;
        default:
            echo 'Opción no válida';
    }
}
