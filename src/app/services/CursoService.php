<?php
include_once '../config/Connection.php';
include_once '../models/Curso.php';

class CursoService
{

    public function add(Curso $curso): bool
    {
        $date_of_expiration = $curso->getDateOfExpiration();
        $tipo_curso_id = $curso->getTipoCursoId();
        $empleado_id = $curso->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO curso 
                VALUES(null, :date_of_expiration, :tipo_curso_id, :empleado_id)";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":date_of_expiration", $date_of_expiration);
            $stmt->bindParam(":tipo_curso_id", $tipo_curso_id);
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
            $stmt = $transaction->prepare("DELETE FROM curso WHERE id = :id");
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

    public function update(curso $curso): bool
    {
        $id = $curso->getId();
        $$date_of_expiration = $curso->getDateOfExpiration();
        $tipo_curso_id = $curso->getTipoCursoId();
        $empleado_id = $curso->getEmpleadoId();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE curso 
                SET date_of_expiration = :date_of_expiration,
                    tipo_curso_id = :tipo_curso_id,
                    empleado_id = :empleado_id
                WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":date_of_expiration", $date_of_expiration);
            $stmt->bindParam(":tipo_curso_id", $tipo_curso_id);
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

    public function getOneById(int $id): curso
    {
        $conn = new Connection();
        $curso = new curso();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM curso WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $curso->setId($row['id']);
            $curso->setDateOfExpiration($row['date_of_expiration']);
            $curso->setTipoCursoId($row['tipo_curso_id']);
            $curso->setEmpleadoId($row['empleado_id']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $curso;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $cursoList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM curso");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $curso = new curso();
                $curso->setId($row['id']);
                $curso->setDateOfExpiration($row['date_of_expiration']);
                $curso->setTipoCursoId($row['tipo_curso_id']);
                $curso->setEmpleadoId($row['empleado_id']);
                array_push($cursoList, $curso);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $cursoList;
    }
}
