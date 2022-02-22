<?php
include_once '../config/Connection.php';
include_once '../models/Contratacion.php';

class ContratacionService
{
    public function delete(int $id): bool
    {
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("DELETE FROM contratacion WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $conn = null;
        }
    }

    public function update(Contratacion $contratacion): bool
    {
        $id = $contratacion->getId();
        $fecha_termino = $contratacion->getFechaTermino();
        $tipo_contrato_id = $contratacion->getTipoContratoId();
        $centro_costo_id = $contratacion->getCentroCostoId();
        $empleado_id = $contratacion->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE contratacion 
                        SET fecha_termino = :fecha_termino,
                        tipo_contrato_id = :tipo_contrato_id,
                        centro_costo_id = :centro_costo_id,
                        empleado_id = :empleado_id
                        WHERE id = :id";
            $stmt = $transaction->prepare($query);
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

    public function getOneByIdEmpleado(int $empleado_id): Contratacion
    {
        $conn = new Connection();
        $contratacion = new Contratacion();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM contratacion WHERE empleado_id = :empleado_id");
            $stmt->bindParam(':empleado_id', $empleado_id);
            $stmt->execute();
            $row = $stmt->fetch();
            $contratacion->setId($row['id']);
            $contratacion->setFechaTermino($row['fecha_termino']);
            $contratacion->setTipoContratoId($row['tipo_contrato_id']);
            $contratacion->setCentoCostoId($row['centro_costo_id']);
            $contratacion->setEmpleadoId($row['empleado_id']);
        } catch (PDOException $e) {
            echo 'Error: ' + $e->getMessage();
        } finally {
            $conn = null;
        }
        return $contratacion;
    }

    public function getOneById(int $id): Contratacion
    {
        $conn = new Connection();
        $contratacion = new Contratacion();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM contratacion WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $contratacion->setId($row['id']);
            $contratacion->setFechaTermino($row['fecha_termino']);
            $contratacion->setTipoContratoId($row['tipo_contrato_id']);
            $contratacion->setCentoCostoId($row['centro_costo_id']);
            $contratacion->setEmpleadoId($row['empleado_id']);
        } catch (PDOException $e) {
            echo 'Error: ' + $e->getMessage();
        } finally {
            $conn = null;
        }
        return $contratacion;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $contratacionList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM contratacion");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $contratacion = new Contratacion();
                $contratacion->setId($row['id']);
                $contratacion->setFechaTermino($row['fecha_termino']);
                $contratacion->setTipoContratoId($row['tipo_contrato_id']);
                $contratacion->setCentoCostoId($row['centro_costo_id']);
                $contratacion->setEmpleadoId($row['empleado_id']);
                array_push($contratacionList, $contratacion);
            }
        } catch (PDOException $e) {
            echo 'Error: ' + $e->getMessage();
        } finally {
            $conn = null;
        }
        return $contratacionList;
    }
}
