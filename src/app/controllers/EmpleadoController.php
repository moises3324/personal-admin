<?php

include_once '../models/Empleado.php';
include_once '../services/EmpleadoService.php';

$model = new Empleado();
$service = new EmpleadoService();

$action = "";
$id = "";
$names = "";
$fatherLastName = "";
$motherLastName = "";
$rut = "";
$dateOfBirth = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST['empleado-id'] ?? null;
    $names = $_POST['empleado-names'] ?? null;
    $fatherLastName = $_POST['empleado-father-last-name'] ?? null;
    $motherLastName = $_POST['empleado-mother-last-name'] ?? null;
    $rut = $_POST['empleado-rut'] ?? null;
    $dateOfBirth = $_POST['empleado-date-of-birth'] ?? null;

    switch ($action) {
        case 'create':
            $model->setNames($names);
            $model->setFatherLastName($fatherLastName);
            $model->setMotherLastName($motherLastName);
            $model->setRut($rut);
            $model->setDateOfBirth($dateOfBirth);
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
            $model->setNames($names);
            $model->setFatherLastName($fatherLastName);
            $model->setMotherLastName($motherLastName);
            $model->setRut($rut);
            $model->setDateOfBirth($dateOfBirth);
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
                    'rut' => $model->getRut(),
                    'names' => $model->getNames(),
                    'fatherLastName' => $model->getFatherLastName(),
                    'motherLastName' => $model->getMotherLastName(),
                    'dateOfBirth' => $model->getDateOfBirth(),
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
            'rut' => $row->getRut(),
            'names' => $row->getNames(),
            'fatherLastName' => $row->getFatherLastName(),
            'motherLastName' => $row->getMotherLastName(),
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
