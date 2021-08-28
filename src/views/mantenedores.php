<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once '../includes/css.php' ?>
    <title><?php echo basename($_SERVER['PHP_SELF'], ".php"); ?></title>
</head>
<body>
<header>
</header>
<aside class="float-start">
    <?php include_once '../includes/menu.php' ?>
</aside>
<main class="float-start">
    <?php include_once '../includes/mantenedores_tabs.php' ?>
    <div class="tab-content" id="mantenedores_tab">
        <?php include_once '../includes/mantenedores_tabs_content/centro_costo.php' ?>
        <?php include_once '../includes/mantenedores_tabs_content/contrato.php' ?>
        <?php include_once '../includes/mantenedores_tabs_content/empleado.php' ?>
    </div>
</main>
<?php include_once '../includes/js.php' ?>
<script src="../scripts/mantenedores/centro_costo_functions.js"></script>
</body>
</html>