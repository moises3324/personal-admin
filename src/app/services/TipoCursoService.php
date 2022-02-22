<?php
include_once '../config/Connection.php';
include_once '../models/TipoCurso.php';

class TipoCursoService
{
    public function add(TipoCurso $tipoCurso): bool
    {
        $nombre = $tipoCurso->getNombre();
        $descripcion = $tipoCurso->getDescripcion();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO tipo_curso VALUES(null, :nombre, :descripcion)";
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
            $stmt = $transaction->prepare("DELETE FROM tipo_curso WHERE id = :id");
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

    public function update(TipoCurso $tipoCurso): bool
    {
        $id = $tipoCurso->getId();
        $nombre = $tipoCurso->getNombre();
        $descripcion = $tipoCurso->getDescripcion();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE tipo_curso SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
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

    public function getOneById(int $id): TipoCurso
    {
        $conn = new Connection();
        $tipoCurso = new TipoCurso();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM tipo_curso WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $tipoCurso->setId($row['id']);
            $tipoCurso->setNombre($row['nombre']);
            $tipoCurso->setDescripcion($row['descripcion']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $tipoCurso;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $tipoCursoList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM tipo_curso");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $tipoCurso = new TipoCurso();
                $tipoCurso->setId($row['id']);
                $tipoCurso->setNombre($row['nombre']);
                $tipoCurso->setDescripcion($row['descripcion']);
                array_push($tipoCursoList, $tipoCurso);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $tipoCursoList;
    }
}