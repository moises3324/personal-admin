<?php

include_once '../models/Examen.php';
include_once '../services/ExamenService.php';

$model = new Examen();
$service = new ExamenService();

$accion = "";
$id = "";
$fecha_vencimiento = "";
$tipo_examen_id = "";
$empleado_id = "";

if ($_POST) {
    $accion = $_POST['accion'] ?? null;
    $id = $_POST[''] ?? null;
    $fecha_vencimiento = $_POST[''] ?? null;
    $tipo_examen_id = $_POST[''] ?? null;
    $empleado_id = $_POST[''] ?? null;

    switch ($accion) {
        case 'create':
            $model->setFechaVencimiento($fecha_vencimiento);
            $model->setTipoExamenId($tipo_examen_id);
            $model->setEmpleadoId($empleado_id);
            if ($service->add($model)) {
                echo 'Registro agregado correctamente';
            }
            break;
        case 'delete':
            if ($service->delete($id)) {
                echo 'Registro eliminado correctamente';
            }
            break;
        case 'update':
            $model->setId((int)$id);
            $model->setFechaVencimiento($fecha_vencimiento);
            $model->setTipoExamenId($tipo_examen_id);
            $model->setEmpleadoId($empleado_id);
            if ($service->update($model)) {
                echo 'Registro actualizado correctamente';
            }
            break;
        case 'getOne':
            $model = $service->getOneById($id);
            if ($model != null) {
                $json = array();
                $json[] = array(
                    'id' => $model->getId(),
                    'fecha_vencimiento' => $model->getFechaVencimiento(),
                    'tipo_examen_id' => $model->getTipoExamenId(),
                    'empleado_id' => $model->getEmpleadoId()
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
    foreach ($service->getAll() as $row) {
        $json[] = array(
            'id' => $row->getId(),
            'fecha_vencimiento' => $row->getFechaVencimiento(),
            'tipo_examen_id' => $row->getTipoExamenId(),
            'empleado_id' => $row->getEmpleadoId()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
