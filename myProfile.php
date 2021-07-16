<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    //Connect To dB
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
    //get data from user table

    $responseUser=$db->query('SELECT * FROM user WHERE id ='.$_SESSION['userId']); 
    $userData=$responseUser->fetch();
    $fName=$userData['fName'];
    $lName=$userData['lName'];
    $phone=$userData['phone'];
    $email=$userData['email'];
    $password=$userData['password'];
    $gender=$userData['gender'];
    $userName=$userData['userName'];

    //get all the addresses of this user and store them in array

    $responseAddress=$db->query('SELECT address FROM address WHERE id_user ='.$_SESSION['userId']); 
 
  




    ?>

    <!--Form 1 : display+update infos -->

    <form action="updateInfo.php" method="POST">
        <label for="">first name</label>
        <input type="text" name="fName" value="<?php echo $fName; ?>" ></br>
        <label for="">last name</label>
        <input type="text"  name="lName" value="<?php echo $lName; ?>"></br>
        <label for="">username</label>
        <input type="text" name="userName" value="<?php echo $userName; ?>"></br>
        <label for="">phone</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>"></br>
        <label for="">email</label>
        <input type="text" name="email" value="<?php echo $email; ?>"></br>
        <label for="">password</label>
        <input type="text" name="password" value="<?php echo $password; ?>"></br>
        
        <select name="gender" id="" value="<?php echo $gender; ?>" >
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select></br>

        <input type="submit"  value="update">

    </form>


    <!-- Form2 : Add address -->
    <p>
    <form action="newAddress.php">
        <input type="text" name="address">
        <input type="submit" value="add new address">
    </form>

    </p>
   

    <!-- Table: List of available address+delete address-->
    <table>
        <?php while( $userAddressData=$responseAddress->fetch()){ ?>
            <tr>
                <form action="deleteAddress.php" method="Post">
                <td><?php  echo $userAddressData['address']?></td>
                <input type="hidden" name="addressValue" value="<?php echo $userAddressData; ?>">
                <td><input type="submit" value="delete address"></td>
                

                </form>
                
            </tr>
        <?php } ?>
    </table>

    
</body>
</html>