<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once 'src/includes/css.php' ?>
    <title>index</title>
</head>
<body>
<!--<a href="src/views/mantenedores.php">mantenedores</a>-->
<?php

include_once 'src/app/config/Connection.php';

function getAll(){
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
            array_push($centroCostoList, $centroCosto);
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}

print_r(getAll())

?>
<?php include_once 'src/includes/js.php' ?>
</body>
</html>
