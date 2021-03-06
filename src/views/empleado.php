<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once '../includes/css.php' ?>
    <title><?php echo ucfirst(str_replace("-", " ", basename($_SERVER['PHP_SELF'], ".php"))); ?></title>
</head>

<body>
    <div class="grid-container">
        <aside>
            <?php include_once '../includes/menu.php' ?>
        </aside>
        <header>
            <div id="page-title">
                <h2>
                    <?php echo ucfirst(str_replace("-", " ", basename($_SERVER['PHP_SELF'], ".php"))); ?>
                </h2>
            </div>
        </header>
        <main>
            <div class="w3-content w3-padding-16">
                <div class="w3-container w3-white w3-padding-16">
                    <div class="section-content">
                        <div class="section-header">
                            <div class="section-title">
                                Listado de empleados
                            </div>
                        </div>
                        <div class="w3-row w3-padding-16">
                            <div class="w3-col l12">
                                <a href="nuevo-empleado.php" class="w3-button w3-white w3-border w3-ripple">
                                    Nuevo registro
                                </a>
                            </div>
                        </div>
                        <div class="table-content">
                            <div class="w3-responsive w3-padding-24">
                                <table id="empleados-datatable" class="w3-table w3-bordered w3-white">
                                    <thead class="w3-black">
                                        <tr>
                                            <th style="width: 15%" class="w3-center">RUT</th>
                                            <th style="width: 30%">Nombre(s)</th>
                                            <th style="width: 20%">Apellido paterno</th>
                                            <th style="width: 20%">Apellido materno</th>
                                            <th style="width: 15%" class="w3-center">Acci??n</th>
                                        </tr>
                                    </thead>
                                    <tbody id="empleados-datatable-rows"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col l12">
                                <p>Cantidad total de registros:
                                    <span id="totalRecords"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="empleado-modal" class="w3-modal"></div>

    <!--Alert-->
    <div id="responseAlert"></div>

    <?php include_once '../includes/js.php' ?>
    <script src="../scripts/empleado.js"></script>
</body>

</html>