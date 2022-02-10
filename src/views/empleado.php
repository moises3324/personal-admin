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
            <div class="sectionTitle">
                <h2 id="sectionTitle">
                    <?php echo ucfirst(str_replace("-", " ", basename($_SERVER['PHP_SELF'], ".php"))); ?></h2>
            </div>
        </header>
        <main>
            <div class="w3-padding-32 w3-content-L">
                <div class="w3-row">
                    <div class="w3-col l12">
                        <a href="nuevo-empleado.php" class="w3-button w3-white w3-border w3-ripple">
                            Nuevo registro
                        </a>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col l2 w3-right">
                        <label for="orderByLabel" class="w3-left">
                            Ordenar por
                        </label>
                        <select name="orderBy" id="empleadoSortItem" class="w3-select w3-border w3-white">
                            <option value="NAZ" selected>
                                Nombre (A-Z)
                            </option>
                            <option value="NZA">
                                Nombre (Z-A)
                            </option>
                        </select>
                    </div>
                </div>
                <div class="w3-responsive w3-padding-top-24">
                    <table id="empleadosTable" class="w3-table w3-bordered w3-white">
                        <thead class="w3-black">
                            <tr>
                                <th style="width: 10%">RUT</th>
                                <th style="width: 40%">Nombre(s)</th>
                                <th style="width: 15%">Apellido paterno</th>
                                <th style="width: 15%">Apellido materno</th>
                                <th style="width: 10%" class="w3-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody id="dataTable"></tbody>
                    </table>
                </div>
                <div class="w3-row">
                    <div class="w3-col l12">
                        <p>Cantidad total de registros:
                            <span id="totalRecords"></span>
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <!--Alert-->
    <div id="responseAlert"></div>

    <?php include_once '../includes/js.php' ?>
    <script src="../scripts/empleado.js"></script>
</body>

</html>