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
<aside class="w3-sidebar">
    <?php include_once '../includes/menu.php' ?>
</aside>
<main class="w3-main">
    <div class="w3-content">
        <div class="">
            <p class="">Listado de centros de costos</p>
            <!--            modal button-->
            <button
                    id="btnNew"
                    type="button"
                    class=""
            >
                Nuevo
            </button>
        </div>
        <!--        table-->
        <div>
            <caption>
                Cantidad de registros:&nbsp;<span id="totalCentroCosto"></span>
            </caption>
        </div>
        <div class="">
            <div class="">
                <table class="">
                    <thead>
                    <tr>
                        <th class="">Nombre</th>
                        <th class="">Descripcion</th>
                        <th class="">Editar</th>
                        <th class="">Borrar</th>
                    </tr>
                    </thead>
                    <tbody id="centro-costo-data"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!--modal-->

</main>
<?php include_once '../includes/js.php' ?>
</body>
</html>

