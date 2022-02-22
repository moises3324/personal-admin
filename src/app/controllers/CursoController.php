<?php

include_once '../models/Curso.php';
include_once '../services/CursoService.php';

$model = new Curso();
$service = new CursoService();

$accion = "";
$id = "";
$fecha_vencimiento = "";
$tipo_curso_id = "";
$empleado_id = "";

if ($_POST) {
    $accion = $_POST['accion'] ?? null;
    $id = $_POST[''] ?? null;
    $fecha_vencimiento = $_POST[''] ?? null;
    $tipo_curso_id = $_POST[''] ?? null;
    $empleado_id = $_POST[''] ?? null;

    switch ($accion) {
        case 'create':
            $model->setFechaVencimiento($fecha_vencimiento);
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
            $model->setFechaVencimiento($fecha_vencimiento);
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
                    'fecha_vencimiento' => $model->getFechaVencimiento(),
                    'tipo_curso_id' => $model->getTipoCursoId(),
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
            'tipo_curso_id' => $row->getTipoCursoId(),
            'empleado_id' => $row->getEmpleadoId()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
