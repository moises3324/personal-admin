<?php
$base = '';
strripos($_SERVER['SCRIPT_NAME'], "views") > 0 ? $base = '../' : $base = 'src/';
?>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"/>
<link rel="stylesheet" href="<?php echo $base ?>styles/w3.css" type="text/css">
<link rel="stylesheet" href="<?php echo $base ?>styles/styles.css" type="text/css">