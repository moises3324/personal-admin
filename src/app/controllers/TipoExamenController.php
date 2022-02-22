<?php

include_once '../models/TipoExamen.php';
include_once '../services/TipoExamenService.php';

$model = new TipoExamen();
$service = new TipoExamenService();

$accion = "";
$id = "";
$nombre = "";
$descripcion = "";

if ($_POST) {
    $accion = $_POST['accion'] ?? null;
    $id = $_POST['tipo-examen-id'] ?? null;
    $nombre = $_POST['tipo-examen-nombre'] ?? null;
    $descripcion = $_POST['tipo-examen-descripcion'] ?? null;
    switch ($accion) {
        case 'create':
            $model->setNombre($nombre);
            $model->setDescripcion($descripcion);
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
            $model->setNombre($nombre);
            $model->setDescripcion($descripcion);
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
                    'nombre' => $model->getNombre(),
                    'descripcion' => $model->getDescripcion(),
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
            'nombre' => $row->getNombre(),
            'descripcion' => $row->getDescripcion(),
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
