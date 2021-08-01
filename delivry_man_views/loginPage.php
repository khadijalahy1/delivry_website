<?php
//start session
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginPage.css">
    <title>Document</title>
</head>

<body>
    <div class="login-page">

        <h1 class='title'>Skharni admin </h1>



        <div class="form">

            <form class="login-form" method="POST" action="../backend/Login.php">
                <input type="text" placeholder="username" name="userInfo" required />
                <?php
                if (isset($_SESSION['deliveryLoginErr']['userErr']) && $_SESSION['deliveryLoginErr']['userErr'] != '') {
                    echo '  *' . $_SESSION['deliveryLoginErr']['userErr'];
                }
                ?>
  
                <input type="password" placeholder="password" name="password" required />
                <?php
                if (isset($_SESSION['deliveryLoginErr']['passwordErr']) && $_SESSION['deliveryLoginErr']['passwordErr'] != '') {
                    echo '  *' . $_SESSION['deliveryLoginErr']['passwordErr'];
                }
                ?>
                <input type="hidden" name="side" value="delivry_man" />
                <input type="submit" value="Login">

            </form>
        </div>
    </div>

</body>

</html>