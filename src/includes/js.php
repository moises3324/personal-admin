<?php
$base = '';
strripos($_SERVER['SCRIPT_NAME'], "views") > 0 ? $base = '../' : $base = 'src/';
?>
<script type="text/javascript"
        src="<?php echo $base ?>scripts/global_functions.js"></script>