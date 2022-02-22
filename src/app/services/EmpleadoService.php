<?php
include_once '../config/Connection.php';
include_once '../models/Empleado.php';

class EmpleadoService
{
    public function delete(int $id): bool
    {
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("DELETE FROM empleado WHERE id = :id");
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

    public function update(Empleado $empleado): bool
    {
        $id = $empleado->getId();
        $nombres = $empleado->getNombres();
        $apellido_paterno = $empleado->getApellidoPaterno();
        $apellido_materno = $empleado->getApellidoMaterno();
        $rut = $empleado->getRut();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE empleado 
                        SET rut = :rut, 
                            nombres = :nombres, 
                            apellido_paterno = :apellido_paterno, 
                            mother_last_bame = :apellido_materno
                        WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":rut", $rut);
            $stmt->bindParam(":nombres", $nombres);
            $stmt->bindParam(":apellido_paterno", $apellido_paterno);
            $stmt->bindParam(":apellido_materno", $apellido_materno);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        } finally {
            $conn = null;
        }
    }

    public function getOneById(int $id): Empleado
    {
        $conn = new Connection();
        $empleado = new Empleado();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM empleado WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $empleado->setId($row['id']);
            $empleado->setRut($row['rut']);
            $empleado->setNombres($row['nombres']);
            $empleado->setApellidoPaterno($row['apellido_paterno']);
            $empleado->setApellidoMaterno($row['apellido_materno']);
        } catch (PDOException $e) {
            echo 'Error: ' + $e->getMessage();
        } finally {
            $conn = null;
        }
        return $empleado;
    }

    public function getAll(): array
    {
        $conn = new Connection();
        $empleadoList = array();
        try {
            $transaction = $conn->getConnection();
            $stmt = $transaction->prepare("SELECT * FROM empleado");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $empleado = new Empleado();
                $empleado->setId($row['id']);
                $empleado->setRut($row['rut']);
                $empleado->setNombres($row['nombres']);
                $empleado->setApellidoPaterno($row['apellido_paterno']);
                $empleado->setApellidoMaterno($row['apellido_materno']);
                array_push($empleadoList, $empleado);
            }
        } catch (PDOException $e) {
            echo 'Error: ' + $e->getMessage();
        } finally {
            $conn = null;
        }
        return $empleadoList;
    }
}
