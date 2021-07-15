<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Login.php" method="POST">
        <label for="">username/email/phone : </label>
        <input type="text" name="userInfo" >
        <?php 
        if(isset($_SESSION['LoginErr']['userErr'])&&$_SESSION['LoginErr']['userErr']!='')
        {
            echo '  *'.$_SESSION['LoginErr']['userErr'];
        }
        ?>

        <br/>
        <label for="">password</label>
        <input type="password" name="password">
        <?php 
        if(isset($_SESSION['LoginErr']['passwordErr'])&&$_SESSION['LoginErr']['passwordErr']!='')
        {
            echo '  *'.$_SESSION['LoginErr']['passwordErr'];
        }
        ?>
        
        
        <br/>

        <input type="submit" value="Login">
        <?php 
        if(isset($_SESSION['LoginErr']['msg'])&&$_SESSION['LoginErr']['msg']!='')
        {
            echo $_SESSION['LoginErr']['msg'];
        }
        ?>

    </form>
</body>
</html>