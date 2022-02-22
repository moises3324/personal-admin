<?php

include_once '../models/Contratacion.php';
include_once '../services/ContratacionService.php';

$contratacion = new Contratacion();
$contratacionService = new ContratacionService();

$accion = "";
//variables empleado
$id = "";
$fecha_termino = "";
$tipo_contrato_id = "";
$centro_costo_id = "";
$empleado_id = "";

if ($_POST) {
    $accion = $_POST['accion'] ?? null;
    $id = $_POST['contratacion-id'] ?? null;
    $fecha_termino = $_POST['contratacion-fecha-termino'] ?? null;
    $tipo_contrato_id = $_POST['contratacion-tipo-contrato-id'] ?? null;
    $centro_costo_id = $_POST['contratacion-centro-costo-id'] ?? null;
    $empleado_id = $_POST['contratacion-empleado-id'] ?? null;

    switch ($accion) {
        case 'delete':
            if ($$contratacion->delete($id)) {
                echo 'Registro eliminado correctamente';
            }
            break;
        case 'update':
            $contratacion->setId((int)$id);
            $contratacion->setFechaTermino($fecha_termino);
            $contratacion->setTipoContratoId($tipo_contrato_id);
            $contratacion->setCentoCostoId($centro_costo_id);
            $contratacion->setEmpleadoId($empleado_id);
            if ($empleadoService->update($contratacion)) {
                echo 'Registro actualizado correctamente';
            }
            break;
        case 'getOne':
            $contratacion = $contratacionService->getOneById($id);
            if ($contratacion != null) {
                $json = array();
                $json[] = array(
                    'id' => $contratacion->getId(),
                    'fecha_termino' => $contratacion->getFechaTermino(),
                    'tipo_contrato_id' => $contratacion->getTipoContratoId(),
                    'centro_costo_id' => $contratacion->getCentroCostoId(),
                    'empleado_id' => $contratacion->getEmpleadoId()
                );
                $jsonstring = json_encode($json[0]);
                echo $jsonstring;
            }
            break;
        case 'getOneByEmpleadoId':
            $contratacion = $contratacionService->getOneByIdEmpleado($empleado_id);
            if ($contratacion != null) {
                $json = array();
                $json[] = array(
                    'id' => $contratacion->getId(),
                    'fecha_termino' => $contratacion->getFechaTermino(),
                    'tipo_contrato_id' => $contratacion->getTipoContratoId(),
                    'centro_costo_id' => $contratacion->getCentroCostoId(),
                    'empleado_id' => $contratacion->getEmpleadoId()
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
    foreach ($contratacionService->getAll() as $row) {
        $json[] = array(
            'id' => $row->getId(),
            'fecha_termino' => $row->getFechaTermino(),
            'tipo_contrato_id' => $row->getTipoContratoId(),
            'centro_costo_id' => $row->getCentroCostoId(),
            'empleado_id' => $row->getEmpleadoId()
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
}
