<?php

include_once '../models/Curso.php';
include_once '../services/CursoService.php';

$model = new Curso();
$service = new CursoService();

$action = "";
$id = "";
$date_of_expiration = "";
$tipo_curso_id = "";
$empleado_id = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST[''] ?? null;
    $date_of_expiration = $_POST[''] ?? null;
    $tipo_curso_id = $_POST[''] ?? null;
    $empleado_id = $_POST[''] ?? null;

    switch ($action) {
        case 'create':
            $model->setDateOfExpiration($date_of_expiration);
            $model->setTipoCursoId($tipo_curso_id);
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
            $model->setTipoCursoId($tipo_curso_id);
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
                    'tipo_curso_id' => $model->getTipoCursoId(),
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
            'tipo_curso_id' => $row->getTipoCursoId(),
            'empleado_id' => $row->getEmpleadoId()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
