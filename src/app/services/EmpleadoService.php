<?php
include_once '../config/Connection.php';
include_once '../models/Empleado.php';

class EmpleadoService
{
    public function add(Empleado $empleado): bool
    {
        $names = $empleado->getNames();
        $fatherLastName = $empleado->getFatherLastName();
        $motherLastName = $empleado->getMotherLastName();
        $rut = $empleado->getRut();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "INSERT INTO empleado 
                    VALUES(
                           null, 
                           :rut, 
                           :names, 
                           :father_last_name, 
                           :mother_last_name
                           )";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":rut", $rut);
            $stmt->bindParam(":names", $names);
            $stmt->bindParam(":father_last_name", $fatherLastName);
            $stmt->bindParam(":mother_last_name", $motherLastName);
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
        $names = $empleado->getNames();
        $fatherLastName = $empleado->getFatherLastName();
        $motherLastName = $empleado->getMotherLastName();
        $rut = $empleado->getRut();
        $conn = new Connection();
        try {
            $transaction = $conn->getConnection();
            $query = "UPDATE empleado 
                    SET  
                        rut = :rut, 
                        names = :names, 
                        father_last_name = :father_last_name, 
                        mother_last_bame = :mother_last_name
                    WHERE id = :id";
            $stmt = $transaction->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":rut", $rut);
            $stmt->bindParam(":names", $names);
            $stmt->bindParam(":father_last_name", $fatherLastName);
            $stmt->bindParam(":mother_last_name", $motherLastName);
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
            $empleado->setNames($row['names']);
            $empleado->setFatherLastName($row['father_last_name']);
            $empleado->setMotherLastName($row['mother_last_name']);
            $empleado->setRut($row['rut']);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
            $stmt = $transaction->prepare("SELECT * FROM empleado order by names");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach ($rows as $row) {
                $empleado = new Empleado();
                $empleado->setId($row['id']);
                $empleado->setNames($row['names']);
                $empleado->setFatherLastName($row['father_last_name']);
                $empleado->setMotherLastName($row['mother_last_name']);
                $empleado->setRut($row['rut']);
                array_push($empleadoList, $empleado);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn = null;
        }
        return $empleadoList;
    }
}
