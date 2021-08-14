<?php
include_once '../config/Connection.php';
include_once '../models/CentroCosto.php';

class CentroCostoService
{
    private Connection $conn;

    public function add(CentroCosto $centroCosto): bool
    {
        $name = $centroCosto->getName();
        $description = $centroCosto->getDescription();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO centro_costo VALUES(null, :name, :description)";
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
        $name = $centroCosto->getName();
        $description = $centroCosto->getDescription();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE centro_costo SET name = :name, description = :description WHERE id = :id";
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
            $centroCosto->setName($row['name']);
            $centroCosto->setDescription($row['description']);
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
            $stmt = $transaction->prepare("SELECT * FROM centro_costo order by name");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $centroCosto = new CentroCosto();
                $centroCosto->setId($row['id']);
                $centroCosto->setName($row['name']);
                $centroCosto->setDescription($row['description']);
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