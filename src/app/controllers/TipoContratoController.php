<?php

include_once '../models/TipoContrato.php';
include_once '../services/TipoContratoService.php';

$model = new TipoContrato();
$service = new TipoContratoService();

$action = "";
$id = "";
$name = "";
$description = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST['tipo-contrato-id'] ?? null;
    $name = $_POST['tipo-contrato-name'] ?? null;
    $description = $_POST['tipo-contrato-description'] ?? null;
    switch ($action) {
        case 'create':
            $model->setName($name);
            $model->setDescription($description);
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
            $model->setName($name);
            $model->setDescription($description);
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
                    'name' => $model->getName(),
                    'description' => $model->getDescription(),
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
            'name' => $row->getName(),
            'description' => $row->getDescription(),
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
