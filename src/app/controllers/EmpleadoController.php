<?php

include_once '../models/Empleado.php';
include_once '../services/EmpleadoService.php';

$empleado = new Empleado();
$empleadoService = new EmpleadoService();

$accion = "";
//variables empleado
$empleado_id = "";
$empleado_rut = "";
$empleado_nombres = "";
$empleado_apellido_paterno = "";
$empleado_apellido_materno = "";

if ($_POST) {
    $accion = $_POST['accion'] ?? null;
    $empleado_id = $_POST['empleado-id'] ?? null;
    $empleado_rut = $_POST['empleado-rut'] ?? null;
    $empleado_nombres = $_POST['empleado-nombres'] ?? null;
    $empleado_apellido_paterno = $_POST['empleado-apellido-paterno'] ?? null;
    $empleado_apellido_materno = $_POST['empleado-apellido-materno'] ?? null;

    switch ($accion) {
        case 'delete':
            if ($$empleadoService->delete($empleado_id)) {
                echo 'Registro eliminado correctamente';
            }
            break;
        case 'update':
            $empleado->setId((int)$empleado_id);
            $empleado->setNombres($nombres);
            $empleado->setApellidoPaterno($apellido_paterno);
            $empleado->setApellidoMaterno($apellido_materno);
            $empleado->setRut($rut);
            if ($empleadoService->update($empleado)) {
                echo 'Registro actualizado correctamente';
            }
            break;
        case 'getOne':
            $empleado = $empleadoService->getOneById($empleado_id);
            if ($empleado != null) {
                $json = array();
                $json[] = array(
                    'id' => $empleado->getId(),
                    'rut' => $empleado->getRut(),
                    'nombres' => $empleado->getNombres(),
                    'apellido_paterno' => $empleado->getApellidoPaterno(),
                    'apellido_materno' => $empleado->getApellidoMaterno()
                );
                $jsonstring = json_encode($json[0]);
                echo $jsonstring;
            }
            break;
        default:
            echo 'Opción no válida';
    }
} else {
    $json = array();
    foreach ($empleadoService->getAll() as $row) {
        $json[] = array(
            'id' => $row->getId(),
            'rut' => $row->getRut(),
            'nombres' => $row->getNombres(),
            'apellido_paterno' => $row->getApellidoPaterno(),
            'apellido_materno' => $row->getApellidoMaterno()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
