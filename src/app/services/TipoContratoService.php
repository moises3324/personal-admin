<?php
include_once '../config/Connection.php';
include_once '../models/TipoContrato.php';

class TipoContratoService
{
    public function add(TipoContrato $tipoContrato): bool
    {
        $nombre = $tipoContrato->getNombre();
        $descripcion = $tipoContrato->getDescripcion();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO tipo_contrato VALUES(null, :nombre, :descripcion)";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $conn = null;
        }
    }

    public function delete(int $id):bool
    {
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("DELETE FROM tipo_contrato WHERE id = :id");
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

    public function update(TipoContrato $tipoContrato): bool
    {
        $id = $tipoContrato->getId();
        $nombre = $tipoContrato->getNombre();
        $descripcion = $tipoContrato->getDescripcion();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE tipo_contrato SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $conn = null;
        }
    }

    public function getOneById(int $id): TipoContrato
    {
        $conn = new Connection();
        $tipoContrato = new TipoContrato();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM tipo_contrato WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $tipoContrato->setId($row['id']);
            $tipoContrato->setNombre($row['nombre']);
            $tipoContrato->setDescripcion($row['descripcion']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $tipoContrato;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $tipoContratoList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM tipo_contrato");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $tipoContrato = new TipoContrato();
                $tipoContrato->setId($row['id']);
                $tipoContrato->setNombre($row['nombre']);
                $tipoContrato->setDescripcion($row['descripcion']);
                array_push($tipoContratoList, $tipoContrato);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $tipoContratoList;
    }
}