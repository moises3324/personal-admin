<?php
include_once '../config/Connection.php';
include_once '../models/TipoExamen.php';

class TipoExamenService
{
    public function add(TipoExamen $tipoExamen): bool
    {
        $name = $tipoExamen->getName();
        $description = $tipoExamen->getDescription();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO tipo_examen VALUES(null, :name, :description)";
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
            $stmt = $transaction->prepare("DELETE FROM tipo_examen WHERE id = :id");
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

    public function update(TipoExamen $tipoExamen): bool
    {
        $id = $tipoExamen->getId();
        $name = $tipoExamen->getName();
        $description = $tipoExamen->getDescription();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE tipo_examen SET name = :name, description = :description WHERE id = :id";
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

    public function getOneById(int $id): TipoExamen
    {
        $conn = new Connection();
        $tipoExamen = new TipoExamen();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM tipo_examen WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $tipoExamen->setId($row['id']);
            $tipoExamen->setName($row['name']);
            $tipoExamen->setDescription($row['description']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $tipoExamen;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $tipoExamenList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM tipo_examen order by name");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $tipoExamen = new TipoExamen();
                $tipoExamen->setId($row['id']);
                $tipoExamen->setName($row['name']);
                $tipoExamen->setDescription($row['description']);
                array_push($tipoExamenList, $tipoExamen);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $tipoExamenList;
    }
}