<?php
include_once '../config/Connection.php';
include_once '../models/Empleado.php';
include_once '../models/Contratacion.php';

class EmpleadoContratacionService
{
    public function add(Empleado $empleado, Contratacion $contratacion): bool
    {
        //Empleado info
        $rut = $empleado->getRut();
        $nombres = $empleado->getNombres();
        $apellido_paterno = $empleado->getApellidoPaterno();
        $apellido_materno = $empleado->getApellidoMaterno();

        //Contratacion info
        $fecha_termino = $contratacion->getFechaTermino();
        $tipo_contrato_id = $contratacion->getTipoContratoId();
        $centro_costo_id = $contratacion->getCentroCostoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $queryEmpleado = "INSERT INTO empleado 
                    VALUES(null, 
                        :rut, 
                        :nombres, 
                        :apellido_paterno, 
                        :apellido_materno
                        )";
            $stmt = $transaction->prepare($queryEmpleado);
            $stmt->bindParam(":rut", $rut);
            $stmt->bindParam(":nombres", $nombres);
            $stmt->bindParam(":apellido_paterno", $apellido_paterno);
            $stmt->bindParam(":apellido_materno", $apellido_materno);
            $stmt->execute();
            
            $empleado_id = $transaction->lastInsertId();
            $queryContratacion = "INSERT INTO contratacion 
                                    VALUES(null,
                                        :fecha_termino, 
                                        :tipo_contrato_id, 
                                        :centro_costo_id, 
                                        :empleado_id
                                        )";
            $stmt = $transaction->prepare($queryContratacion);
            $stmt->bindParam(":fecha_termino", $fecha_termino);
            $stmt->bindParam(":tipo_contrato_id", $tipo_contrato_id);
            $stmt->bindParam(":centro_costo_id", $centro_costo_id);
            $stmt->bindParam(":empleado_id", $empleado_id);
            $stmt->execute();
            
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $conn = null;
        }
    }
}