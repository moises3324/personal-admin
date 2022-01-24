<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                        <button class="w3-button w3-white w3-border w3-ripple" id="btnNew">
                            Nuevo registro
                        </button>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col l2 w3-right">
                        <label for="orderByLabel" class="w3-left">Ordenar por</label>
                        <select class="w3-select w3-border w3-white" name="orderBy" id="empleadoSortItem">
                            <option value="NAZ" selected>Nombre (A-Z)</option>
                            <option value="NZA">Nombre (Z-A)</option>
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
                        <p>Cantidad total de registros: <span id="totalRecords"></span></p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!--More info Modal-->
    <div id="moreInfoModal" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <div class="w3-container">
                <div class="w3-section">
                    <div id="modalHeader">
                        <h2 id="moreInfoModalTitle"></h2>
                    </div>
                    <div id="modalBody">
                        <div>
                            
                        </div>
                    </div>
                    <div class="w3-row w3-padding-top-24">
                        <div class="w3-col l12">
                            <button type="button" class="w3-button w3-white w3-border w3-left"
                                id="btnCloseMoreInfoModal">
                                Cerrar
                            </button>
                            <button type="button" class="w3-button w3-green w3-border w3-right" id="btnEdit">Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Add/Update Modal-->
    <div id="recordModal" class="w3-modal">
        <div class="w3-modal-content w3-card-4">
            <div class="w3-container">
                <div class="w3-section">
                    <div id="modalHeader">
                        <h2 id="modalTitle">Agregar registro</h2>
                    </div>
                    <div id="modalBody">
                        <form id="empleadoForm">
                            <input type="hidden" id="empleado-id" name="empleado-id" value="">
                            <div class="w3-row w3-padding-8">
                                <div class="w3-quarter w3-row-padding">
                                    <label for="empleado-rut">RUT</label>
                                    <input type="text" id="empleado-rut" name="empleado-rut" class="w3-input w3-border"
                                        required>
                                </div>
                                <div class="w3-rest w3-row-padding">
                                    <label for="empleado-name">Nombre(s)</label>
                                    <input type="text" id="empleado-names" name="empleado-names"
                                        class="w3-input w3-border" required>
                                </div>
                            </div>
                            <div class="w3-row w3-padding-8">
                                <div class="w3-half w3-row-padding">
                                    <label for="empleado-father-last-name">Apellido paterno</label>
                                    <input type="text" id="empleado-father-last-name" name="empleado-father-last-name"
                                        class="w3-input w3-border" required>
                                </div>
                                <div class="w3-half w3-row-padding">
                                    <label for="empleado-mother-last-name">Apellido materno</label>
                                    <input type="text" id="empleado-mother-last-name" name="empleado-mother-last-name"
                                        class="w3-input w3-border" required>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="w3-row w3-padding-top-24">
                        <div class="w3-col l12">
                            <button type="button" class="w3-button w3-white w3-border w3-left"
                                id="btnCancelRecordModal">
                                Cancelar
                            </button>
                            <button type="button" class="w3-button w3-green w3-border w3-right" id="btnSave">Guardar
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Alert-->
    <div id="responseAlert"></div>

    <?php include_once '../includes/js.php' ?>
    <script src="../scripts/empleado.js"></script>
</body>

</html>