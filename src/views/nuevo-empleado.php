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
            <div class="w3-content-M">
                <div class="w3-container">
                    <div class="w3-section">
                        <div id="modalHeader">
                            <h2 id="modalTitle">
                                Agregar registro
                            </h2>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col l12">
                                <a href="empleado.php" class="w3-button w3-white w3-border w3-ripple">
                                    Cancelar y volver
                                </a>
                            </div>
                        </div>
                        <div id="empleadoContent" class="w3-padding-16">
                            <form id="empleadoForm">
                                <div class="w3-row w3-padding-8">
                                    <div class="w3-row-padding w3-stretch">
                                        <div class="w3-col l12">
                                            <div id="personal-data">
                                                <div id="personal-data-title" class="w3-row">
                                                    <h4>Datos personales</h4>
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
                                                            <label for="empleado-name">
                                                                Nombre(s)
                                                            </label>
                                                            <input type="text" id="empleado-names" name="empleado-names" class="w3-input w3-border" required>
                                                        </div>
                                                        <div class="w3-col l3">
                                                            <label for="empleado-father-last-name">
                                                                Apellido paterno
                                                            </label>
                                                            <input type="text" id="empleado-father-last-name" name="empleado-father-last-name" class="w3-input w3-border" required>
                                                        </div>
                                                        <div class="w3-col l3">
                                                            <label for="empleado-mother-last-name">
                                                                Apellido materno
                                                            </label>
                                                            <input type="text" id="empleado-mother-last-name" name="empleado-mother-last-name" class="w3-input w3-border" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3-row w3-padding-8">
                                    <div class="w3-row-padding w3-stretch">
                                        <div class="w3-half">
                                            <div id="hire-data">
                                                <div id="hire-data-title">
                                                    <div class="w3-row">
                                                        <h4>Datos de contratación</h4>
                                                    </div>
                                                </div>
                                                <div id="hire-data-content">
                                                    <div class="w3-row-padding w3-stretch w3-padding-8">
                                                        <div class="w3-col l7">
                                                            <label for="contratacion-centro-costo">
                                                                Centro costo
                                                            </label>
                                                            <select id="contratacion-centro-costo-opcion" name="contratacion-centro-costo-opcion" class="w3-select w3-border">
                                                            </select>
                                                        </div>
                                                        <div class="w3-col l5">
                                                            <label for="contratacion-inicio-label">
                                                                Inicio contrato
                                                            </label>
                                                            <input type="date" id="contratacion-inicio-input" name="contratacion-inicio-input" class="w3-input w3-border" disabled required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w3-row w3-padding-8">
                                    <div class="w3-row-padding w3-stretch">
                                        <div class="w3-half">
                                            <div id="exams-data">
                                                <div id="exams-data-title">
                                                    <div class="w3-row">
                                                        <h4>Exámenes realizados</h4>
                                                    </div>
                                                </div>
                                                <div id="exams-data-content">
                                                    <div class="w3-row-padding w3-stretch w3-padding-8">
                                                        <div class="w3-col l7">
                                                            <label for="examen-tipo-examen">
                                                                Exámen
                                                            </label>
                                                            <select id="examen-tipo-examen-opcion" name="examen-tipo-examen-opcion" class="w3-select w3-border">
                                                            </select>
                                                        </div>
                                                        <div class="w3-col l5">
                                                            <label for="examen-fecha-expiracion-label">
                                                                Fecha expiración
                                                            </label>
                                                            <input type="date" id="examen-fecha-expiracion-input" name="examen-fecha-expiracion-input" class="w3-input w3-border" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="w3-row">
                                                        <div class="w3-col l1">
                                                            <button type="button" id="agregar-examen-boton" class="w3-button w3-border-0" disabled>
                                                                Agregar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="examenes-data-list">
                                                <div class="w3-padding-8">
                                                        <div class="w3-row">
                                                            <h6>Listado de exámenes seleccionados</h6>
                                                        </div>
                                                        <div class="w3-row">
                                                            <ul id="examenes-data-list-items" class="w3-ul">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w3-half">
                                            <div id="cursos-data">
                                                <div id="cursos-data-title">
                                                    <div class="w3-row">
                                                        <h4>Cursos realizados</h4>
                                                    </div>
                                                </div>
                                                <div id="cursos-data-content">
                                                    <div class="w3-row-padding w3-stretch w3-padding-8">
                                                        <div class="w3-col l7">
                                                            <label for="cursos-tipo-curso">
                                                                Curso
                                                            </label>
                                                            <select id="cursos-tipo-curso-opcion" name="cursos-tipo-curso-opcion" class="w3-select w3-border">
                                                            </select>
                                                        </div>
                                                        <div class="w3-col l5">
                                                            <label for="cursos-fecha-expiracion-label">
                                                                Fecha expiración
                                                            </label>
                                                            <input type="date" id="cursos-fecha-expiracion-input" name="cursos-fecha-expiracion-input" class="w3-input w3-border" disabled required>
                                                        </div>
                                                    </div>
                                                    <div class="w3-row">
                                                        <div class="w3-col l1">
                                                            <button type="button" id="agregar-curso-boton" class="w3-button w3-border-0" disabled>
                                                                Agregar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="cursos-data-list">
                                                    <div class="w3-padding-8">
                                                        <div class="w3-row">
                                                            <h6>Listado de cursos seleccionados</h6>
                                                        </div>
                                                        <div class="w3-row">
                                                            <ul id="cursos-data-list-items" class="w3-ul">
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="w3-row w3-padding-top-24">
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
        </main>
    </div>
    <!--Alert-->
    <div id="responseAlert"></div>

    <?php include_once '../includes/js.php' ?>
    <script src="../scripts/nuevo_empleado.js"></script>
</body>

</html>