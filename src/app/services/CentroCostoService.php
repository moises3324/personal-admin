<?php
include_once '../config/Connection.php';
include_once '../models/CentroCosto.php';

class CentroCostoService
{

    public function add(CentroCosto $centroCosto): bool
    {
        $nombre = $centroCosto->getNombre();
        $descripcion = $centroCosto->getDescripcion();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO centro_costo VALUES(null, :nombre, :descripcion)";
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
            $stmt = $transaction->prepare("DELETE FROM centro_costo WHERE id = :id");
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

    public function update(CentroCosto $centroCosto): bool
    {
        $id = $centroCosto->getId();
        $nombre = $centroCosto->getNombre();
        $descripcion = $centroCosto->getDescripcion();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE centro_costo SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
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

    public function getOneById(int $id): CentroCosto
    {
        $conn = new Connection();
        $centroCosto = new CentroCosto();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM centro_costo WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $centroCosto->setId($row['id']);
            $centroCosto->setNombre($row['nombre']);
            $centroCosto->setDescripcion($row['descripcion']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $centroCosto;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $centroCostoList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM centro_costo");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $centroCosto = new CentroCosto();
                $centroCosto->setId($row['id']);
                $centroCosto->setNombre($row['nombre']);
                $centroCosto->setDescripcion($row['descripcion']);
                array_push($centroCostoList, $centroCosto);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $centroCostoList;
    }
}