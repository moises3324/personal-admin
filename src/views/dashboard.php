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
            <h2><?php echo ucfirst(str_replace("-", " ", basename($_SERVER['PHP_SELF'], ".php"))); ?></h2>
        </div>
    </header>
    <main>


    </main>
</div>
<?php include_once '../includes/js.php' ?>
</body>
</html>