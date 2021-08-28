<?php
$base = '';
strripos($_SERVER['SCRIPT_NAME'], "views") > 0 ? $base = '../' : $base = 'src/';
?>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
<script type="text/javascript"
        src="<?php echo $base ?>scripts/global_functions.js"></script>