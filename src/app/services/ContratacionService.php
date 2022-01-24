<?php
include_once '../config/Connection.php';
include_once '../models/Contratacion.php';

class ContratacionService
{

    public function add(Contratacion $contratacion): bool
    {
        $start_date = $contratacion->getStartDate();
        $end_date = $contratacion->getEndDate();
        $tipo_contrato_id = $contratacion->getTipoContratoId();
        $centro_costo_id = $contratacion->getCentroCostoId();
        $empleado_id = $contratacion->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO contratacion 
                VALUES(null, :start_date, :end_date, :tipo_contrato_id, :centro_costo_id, :empleado_id)";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":start_date", $start_date);
            $stmt->bindParam(":end_date", $end_date);
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

    public function update(contratacion $contratacion): bool
    {
        $id = $contratacion->getId();
        $start_date = $contratacion->getStartDate();
        $end_date = $contratacion->getEndDate();
        $tipo_contrato_id = $contratacion->getTipoContratoId();
        $centro_costo_id = $contratacion->getCentroCostoId();
        $empleado_id = $contratacion->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE contratacion 
                SET start_date = :start_date, 
                    end_date = :end_date,
                    tipo_contrato_id = :tipo_contrato_id,
                    centro_costo_id = :centro_costo_id,
                    empleado_id = :empleado_id
                WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":start_date", $start_date);
            $stmt->bindParam(":end_date", $end_date);
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

    public function getOneById(int $id): contratacion
    {
        $conn = new Connection();
        $contratacion = new contratacion();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM contratacion WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $contratacion->setId($row['id']);
            $contratacion->setStartDate($row['start_date']);
            $contratacion->setEndDate($row['end_date']);
            $contratacion->setTipoContratoId($row['tipo_contrato_id']);
            $contratacion->setCentoCostoid($row['centro_costo_id']);
            $contratacion->setEmpleadoId($row['empleado_id']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
                $contratacion = new contratacion();
                $contratacion->setId($row['id']);
                $contratacion->setStartDate($row['start_date']);
                $contratacion->setEndDate($row['end_date']);
                $contratacion->setTipoContratoId($row['tipo_contrato_id']);
                $contratacion->setCentoCostoid($row['centro_costo_id']);
                $contratacion->setEmpleadoId($row['empleado_id']);
                array_push($contratacionList, $contratacion);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $contratacionList;
    }
}
