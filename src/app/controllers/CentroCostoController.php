<?php

include_once '../models/CentroCosto.php';
include_once '../services/CentroCostoService.php';

$model = new CentroCosto();
$service = new CentroCostoService();

$action = "";
$id = "";
$name = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST['centro-costo-id'] ?? null;
    $name = $_POST['centro-costo-name'] ?? null;
    switch ($action) {
        case 'create':
            $model->setName($name);
            if ($service->add($model)) {
                echo 'Successful';
            } else {
                echo 'Error';
            }
            break;
        case 'delete':
            if ($service->delete($id)) {
                echo 'Successful';
            } else {
                echo 'Error';
            }
            break;
        case 'update':
            echo $id;
            $model->setId((int)$id);
            $model->setName($name);
            if ($service->update($model)) {
                echo 'Successful';
            } else {
                echo 'Error';
            }
            break;
        case 'getOne':
            $model = $service->getOneById($id);
            if ($model != null) {
                $json = array();
                $json[] = array(
                    'id' => $model->getId(),
                    'name' => $model->getName(),
                );
                $jsonstring = json_encode($json[0]);
                echo $jsonstring;
            }else{
                echo 'error';
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
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
