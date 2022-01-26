<?php

include_once '../models/Examen.php';
include_once '../services/ExamenService.php';

$model = new Examen();
$service = new ExamenService();

$action = "";
$id = "";
$date_of_expiration = "";
$tipo_examen_id = "";
$empleado_id = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST[''] ?? null;
    $date_of_expiration = $_POST[''] ?? null;
    $tipo_examen_id = $_POST[''] ?? null;
    $empleado_id = $_POST[''] ?? null;

    switch ($action) {
        case 'create':
            $model->setDateOfExpiration($date_of_expiration);
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
            $model->setDateOfExpiration($date_of_expiration);
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
                    'date_of_expiration' => $model->getDateOfExpiration(),
                    'tipo_examen_id' => $model->getTipoExamenId(),
                    'empleado_id' => $model->getEmpleadoId()
                );
                $jsonstring = json_encode($json[0]);
                echo $jsonstring;
            }
            break;
        default:
            echo 'No valid option';
    }
} else {
    $json = array();
    foreach ($service->getAll() as $row) {
        $json[] = array(
            'id' => $row->getId(),
            'date_of_expiration' => $row->getDateOfExpiration(),
            'tipo_examen_id' => $row->getTipoExamenId(),
            'empleado_id' => $row->getEmpleadoId()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
