<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include_once 'src/includes/css.php' ?>
    <title>index</title>
</head>

<body>
    <div class="w3-container">
        <div class="w3-modal-content w3-card-4 w3-margin-top" style="max-width:600px">
            <div class="w3-center"><br>
               <h2>Login</h2>
            </div>
            <form class="w3-container" action="src/views/dashboard.php">
                <div class="w3-section">
                    <label><b>Username</b></label>
                    <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname">
                    <label><b>Password</b></label>
                    <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="psw">
                    <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    <?php include_once 'src/includes/js.php' ?>
</body>x|

</html>