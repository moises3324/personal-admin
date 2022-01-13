<?php
include_once '../config/Connection.php';
include_once '../models/TipoContrato.php';

class TipoContratoService
{
    public function add(TipoContrato $tipoContrato): bool
    {
        $name = $tipoContrato->getName();
        $description = $tipoContrato->getDescription();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO tipo_contrato VALUES(null, :name, :description)";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
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
        $name = $tipoContrato->getName();
        $description = $tipoContrato->getDescription();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE tipo_contrato SET name = :name, description = :description WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":description", $description);
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
            $tipoContrato->setName($row['name']);
            $tipoContrato->setDescription($row['description']);
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
            $stmt = $transaction->prepare("SELECT * FROM tipo_contrato order by name");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $tipoContrato = new TipoContrato();
                $tipoContrato->setId($row['id']);
                $tipoContrato->setName($row['name']);
                $tipoContrato->setDescription($row['description']);
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