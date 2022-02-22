<?php
include_once '../config/Connection.php';
include_once '../models/Examen.php';

class ExamenService
{

    public function add(Examen $examen): bool
    {
        $fecha_vencimiento = $examen->getFechaVencimiento();
        $tipo_examen_id = $examen->getTipoExamenId();
        $empleado_id = $examen->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO examen 
                VALUES(null, :fecha_vencimiento, :tipo_examen_id, :empleado_id)";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":fecha_vencimiento", $fecha_vencimiento);
            $stmt->bindParam(":tipo_examen_id", $tipo_examen_id);
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
            $stmt = $transaction->prepare("DELETE FROM examen WHERE id = :id");
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

    public function update(examen $examen): bool
    {
        $id = $examen->getId();
        $$fecha_vencimiento = $examen->getFechaVencimiento();
        $tipo_examen_id = $examen->getTipoExamenId();
        $empleado_id = $examen->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE examen 
                SET fecha_vencimiento = :fecha_vencimiento,
                    tipo_examen_id = :tipo_examen_id,
                    empleado_id = :empleado_id
                WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":fecha_vencimiento", $fecha_vencimiento);
            $stmt->bindParam(":tipo_examen_id", $tipo_examen_id);
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

    public function getOneById(int $id): examen
    {
        $conn = new Connection();
        $examen = new examen();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM examen WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $examen->setId($row['id']);
            $examen->setFechaVencimiento($row['fecha_vencimiento']);
            $examen->setTipoexamenId($row['tipo_examen_id']);
            $examen->setEmpleadoId($row['empleado_id']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $examen;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $examenList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM examen");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $examen = new examen();
                $examen->setId($row['id']);
                $examen->setFechaVencimiento($row['fecha_vencimiento']);
                $examen->setTipoexamenId($row['tipo_examen_id']);
                $examen->setEmpleadoId($row['empleado_id']);
                array_push($examenList, $examen);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $examenList;
    }
}
