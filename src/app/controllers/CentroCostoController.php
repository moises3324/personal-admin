<?php

include_once '../models/CentroCosto.php';
include_once '../services/CentroCostoService.php';

$model = new CentroCosto();
$service = new CentroCostoService();

$action = "";
$id = "";
$name = "";
$description = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST['centro-costo-id'] ?? null;
    $name = $_POST['centro-costo-name'] ?? null;
    $description = $_POST['centro-costo-description'] ?? null;
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
