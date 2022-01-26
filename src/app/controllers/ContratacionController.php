<?php

include_once '../models/Contratacion.php';
include_once '../services/ContratacionService.php';

$model = new Contratacion();
$service = new ContratacionService();

$action = "";
$id = "";
$start_date = "";
$end_date = "";
$tipo_contrato_id = "";
$centro_costo_id = "";
$empleado_id = "";

if ($_POST) {
    $action = $_POST['action'] ?? null;
    $id = $_POST[''] ?? null;
    $start_date = $_POST[''] ?? null;
    $end_date = $_POST[''] ?? null;
    $tipo_contrato_id = $_POST[''] ?? null;
    $centro_costo_id = $_POST[''] ?? null;
    $empleado_id = $_POST[''] ?? null;

    switch ($action) {
        case 'create':
            $model->setStartDate($start_date);
            $model->setEndDate($end_date);
            $model->setTipoContratoId($tipo_contrato_id);
            $model->setCentoCostoid($centro_costo_id);
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
            $model->setStartDate($start_date);
            $model->setEndDate($end_date);
            $model->setTipoContratoId($tipo_contrato_id);
            $model->setCentoCostoid($centro_costo_id);
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
                    'start_date' => $model->getStartDate(),
                    'end_date' => $model->getEndDate(),
                    'tipo_contrato_id' => $model->getTipoContratoId(),
                    'centro_costo_id' => $model->getCentroCostoId(),
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
            'start_date' => $row->getStartDate(),
            'end_date' => $row->getEndDate(),
            'tipo_contrato_id' => $row->getTipoContratoId(),
            'centro_costo_id' => $row->getCentroCostoId(),
            'empleado_id' => $row->getEmpleadoId()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
