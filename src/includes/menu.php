<?php
$menu = basename($_SERVER['PHP_SELF'], ".php");
?>
<nav>
    <div>
        <button class="navbar-toggler d-lg-none" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <div class="d-none d-lg-block p-3 shadow-4" id="menuNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item d-block">
                    <a class="nav-link d-flex align-items-center
                    <?php echo ($menu == 'dashboard') ? 'active' : 'text-black-50'; ?>"
                       href="../views/dashboard.php"><i class="mdi mdi-home-analytics"></i>&nbsp;&nbsp;Dashboard</a>
                </li>
                <li class="nav-item d-block">
                    <a class="nav-link d-flex align-items-center
                    <?php echo ($menu == 'registros') ? 'active' : 'text-black-50'; ?>"
                       href="../views/registros.php"><i class="mdi mdi-notebook-multiple"></i>&nbsp;&nbsp;Registros</a>
                </li>
                <li class="nav-item d-block">
                    <a class="nav-link d-flex align-items-center
                    <?php echo ($menu == 'mantenedores') ? 'active' : 'text-black-50'; ?>"
                       href="../views/mantenedores.php"><i class="mdi mdi-cog-outline"></i>&nbsp;&nbsp;Mantenedores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>