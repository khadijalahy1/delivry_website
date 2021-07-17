<!-- Registration form + Login System  -->
<?php 

    session_start();
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Registration form  -->
    
    <form action="registration.php" method="POST" >
        <label for="">First Name :</label>
        <input type="text" name="fName">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['fNameErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['fNameErr'];

        }
        ?>
        <br/>

        <label for="">Last Name :</label>
        <input type="text" name="lName">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['lNameErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['lNameErr'];

        }
        ?>
        <br/>

        <label for="">Username :</label>
        <input type="text" name="userName">
        <?php  
        if(isset($_SESSION['infoErr'])  && $_SESSION['infoErr']['userNameErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['userNameErr'];

        }
        ?>

        <br/>


        <label for="">Password :</label>
        <input type="password" name="password">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['passwordErr']!='' )
        {
            echo '  *'.$_SESSION['infoErr']['passwordErr'];

        }
        ?>
        <br/>
    
        <label for="">phone :</label>
        <input type="phone" name="phone">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['phoneErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['phoneErr'];

        }
        ?>
        <br/>
    
        <label for="">Email :</label>
        <input type="email" name="email">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['emailErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['emailErr'];

        }
        ?>
        <br/>
    
        <label for="">gender :</label>
        <select name="gender" id="">
            <option value="F">Female</option>
            <option value="M">Male</option>
        </select><br/>

        <label for="">Address :</label>
        <input type="text" name="address">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['addressErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['addressErr'];

        }
        ?>
        <br/>
    
        <input type="submit" value="Register">
    

    </form>
    
</body>
</html>