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
            <div class="w3-content-M w3-padding-16">
                <div class="w3-container w3-white w3-padding-16">
                    <div class="section-content">
                        <div class="section-header">
                            <div class="section-title">
                                Agregar registro
                            </div>
                        </div>
                        <div class="w3-row w3-padding-16">
                            <div class="w3-col l12">
                                <a href="empleado.php" class="w3-button w3-white w3-border w3-ripple">
                                    Cancelar y volver
                                </a>
                            </div>
                        </div>
                        <div class="empleado-content">
                            <form id="empleado-form">
                                <div class="w3-row-padding w3-padding-8 w3-stretch">
                                    <div class="w3-col l12">
                                        <div id="personal-data">
                                            <div id="personal-data-header" class="w3-row w3-padding-8">
                                                <div id="personal-data-title">Datos personales</div>
                                            </div>
                                            <div id="personal-data-content">
                                                <input type="hidden" id="empleado-id" name="empleado-id" value="">
                                                <div class="w3-row-padding w3-stretch w3-padding-8">
                                                    <div class="w3-col l2">
                                                        <label for="empleado-rut">
                                                            RUT
                                                        </label>
                                                        <input type="text" id="empleado-rut" name="empleado-rut" class="w3-input w3-border" required>
                                                    </div>
                                                    <div class="w3-col l4">
                                                        <label for="empleado-nombres">
                                                            Nombre(s)
                                                        </label>
                                                        <input type="text" id="empleado-nombres" name="empleado-nombres" class="w3-input w3-border" required>
                                                    </div>
                                                    <div class="w3-col l3">
                                                        <label for="empleado-apellido-paterno">
                                                            Apellido paterno
                                                        </label>
                                                        <input type="text" id="empleado-apellido-paterno" name="empleado-apellido-paterno" class="w3-input w3-border" required>
                                                    </div>
                                                    <div class="w3-col l3">
                                                        <label for="empleado-apellido-materno">
                                                            Apellido materno
                                                        </label>
                                                        <input type="text" id="empleado-apellido-materno" name="empleado-apellido-materno" class="w3-input w3-border" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3-row-padding w3-padding-8 w3-stretch">
                                    <div class="w3-col l12">
                                        <div id="hire-data">
                                            <div id="hire-data-header" class="w3-row w3-padding-8">
                                                <div id="hire-data-title">Datos de contratación</div>
                                            </div>
                                            <div id="hire-data-content">
                                                <div class="w3-row-padding w3-stretch w3-padding-8">
                                                    <div class="w3-col l3">
                                                        <label for="contratacion-tipo-contrato">
                                                            Tipo contrato
                                                        </label>
                                                        <select id="contratacion-tipo-contrato-opcion" name="contratacion-tipo-contrato-opcion" class="w3-select w3-border w3-white">
                                                        </select>
                                                    </div>
                                                    <div class="w3-col l3">
                                                        <label for="contratacion-centro-costo">
                                                            Centro costo
                                                        </label>
                                                        <select id="contratacion-centro-costo-opcion" name="contratacion-centro-costo-opcion" class="w3-select w3-border w3-white">
                                                        </select>
                                                    </div>
                                                    <div class="w3-col l3">
                                                        <label for="contratacion-termino">
                                                            Término contrato
                                                        </label>
                                                        <input type="date" id="contratacion-termino-input" name="contratacion-termino-input" class="w3-input w3-border" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3-row w3-padding-8">
                                    <div class="w3-col l12">
                                        <button type="button" id="btnSave" class="w3-button w3-green w3-border">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!--Alert-->
    <div id="responseAlert"></div>

    <?php include_once '../includes/js.php' ?>
    <script src="../scripts/nuevo_empleado.js"></script>
</body>

</html>