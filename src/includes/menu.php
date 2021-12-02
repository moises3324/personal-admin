<?php
$menu = basename($_SERVER['PHP_SELF'], ".php");
?>
<nav id="menuNavbar" class="w3-padding-top-32">
    <div class="w3-bar-block">
        <div class="menuItem">
            <a href="../views/dashboard.php"
               class="w3-bar-item w3-button <?php echo ($menu == 'dashboard') ?
                   'active' : ''; ?>">
                Dashboard</a>
        </div>
        <div class="menuItem">
            <button class="w3-button w3-block" id="menuNavbarItemExpand1">
                <div class="menuItemText w3-left-align">Mantenedores</div>
                <div class="material-icons" id="arrow1">keyboard_arrow_down</div>
            </button>
            <div id="subMenuItems1" class="w3-bar-block w3-hide w3-white">
                <a href="../views/centro-de-costo.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'centro-de-costo') ?
                       'active' : ''; ?>">
                    Centro de costo</a>
                <a href="../views/tipo-de-contrato.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'tipo-de-contrato') ?
                       'active' : ''; ?>">
                    Tipo de contrato</a>
                <a href="../views/tipo-de-curso.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'tipo-de-curso') ?
                       'active' : ''; ?>">
                    Tipo de curso</a>
                <a href="../views/tipo-de-examen.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'tipo-de-examen') ?
                       'active' : ''; ?>">
                    Tipo de examen</a>
            </div>
        </div>
        <div class="menuItem">
            <button class="w3-button w3-block" id="menuNavbarItemExpand2">
                <div class="menuItemText w3-left-align">Registros</div>
                <div class="material-icons" id="arrow2">keyboard_arrow_down</div>
            </button>
            <div id="subMenuItems2" class="w3-bar-block w3-hide w3-white">
                <a href="../views/empleado.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'empleado') ?
                       'active' : ''; ?>">
                    Empleado</a>
                <a href="../views/contratacion.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'contratacion') ?
                       'active' : ''; ?>">
                    Contratación</a>
                <a href="../views/curso.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'curso') ?
                       'active' : ''; ?>">
                    Curso</a>
                <a href="../views/examen.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'examen') ?
                       'active' : ''; ?>">
                    Exámen</a>
            </div>
        </div>
    </div>
</nav>



