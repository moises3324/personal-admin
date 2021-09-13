<?php
$menu = basename($_SERVER['PHP_SELF'], ".php");
?>
<nav>
    <div class="w3-bar-block w3-card" id="menuNavbar">
        <div class="menuItem">
            <a href="../views/dashboard.php"
               class="w3-bar-item w3-button <?php echo ($menu == 'dashboard') ?
                   'w3-panel w3-pale-blue w3-leftbar w3-border-blue' : ''; ?>">
                Dashboard</a>
        </div>
        <div class="menuItem">
            <button class="w3-button w3-block w3-left-align" id="menuNavbarItemExpand">Mantenedores</button>
            <div id="subMenuItems" class="w3-bar-block w3-hide w3-white">
                <a href="../views/centro-costo.php"
                   class="w3-bar-item w3-button w3-padding-left <?php echo ($menu == 'centro-costo') ?
                       'w3-panel w3-pale-blue w3-leftbar w3-border-blue' : ''; ?>">
                    Centro de costo</a>
            </div>
        </div>
    </div>
</nav>



