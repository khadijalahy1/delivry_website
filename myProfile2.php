<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Skharni</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../utils/form/formStyle.css">
    <link rel="stylesheet" href="myProfile.css">
</head>

<body>



    <!-- Navbar  -->
    <?php include './navbar.php' ?>
    <?php

    //Connect To dB
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
    //get data from user table

    $responseUser = $db->query('SELECT * FROM user WHERE id =' . $_SESSION['userId']);
    $userData = $responseUser->fetch();
    $fName = $userData['fName'];
    $lName = $userData['lName'];
    $phone = $userData['phone'];
    $email = $userData['email'];
    $password = $userData['password'];
    $gender = $userData['gender'];
    $userName = $userData['userName'];

    //get all the addresses of this user and store them in array

    $responseAddress = $db->query('SELECT address FROM address WHERE id_user =' . $_SESSION['userId']);






    ?>



    <div class="container">


        <!--Form 1 : display+update infos -->


        <form action="../backend/updateInfo.php" method="POST">
            <div class="row">
                <h4>Profile Informations</h4>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="First Name" name="fName" value="<?php echo $fName; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <?php
                    if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['fNameErr'] != '') {
                        echo '*' . $_SESSION['infoUpdateErr']['fNameErr'];
                    }
                    ?>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="Last Name" name="lName" value="<?php echo $lName; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <?php
                    if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['lNameErr'] != '') {
                        echo '*' . $_SESSION['infoUpdateErr']['lNameErr'];
                    }
                    ?>
                </div>
                <div class="input-group input-group-icon">
                    <input type="text" placeholder="UserName" name="userName" value="<?php echo $userName; ?>" />
                    <div class="input-icon"><i class="fa fa-user"></i></div>
                    <?php
                    if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['userNameErr'] != '') {
                        echo '*' . $_SESSION['infoUpdateErr']['userNameErr'];
                    }
                    ?>
                </div>
                <div class="input-group input-group-icon">
                    <input type="tel" placeholder="Phone" name="phone" value="<?php echo $phone; ?>" />
                    <div class="input-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <?php
                    if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['phoneErr'] != '') {
                        echo '*' . $_SESSION['infoUpdateErr']['phoneErr'];
                    }
                    ?>
                </div>
                <div class="input-group input-group-icon">
                    <input type="email" placeholder="Email Adress" name="email" value="<?php echo $email; ?>" />
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <?php
                    if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['emailErr'] != '') {
                        echo '*' . $_SESSION['infoUpdateErr']['emailErr'];
                    }
                    ?>
                </div>
                <div class="input-group input-group-icon">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" />
                    <div class="input-icon"><i class="fa fa-key"></i></div>
                    <?php
                    if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['passwordErr'] != '') {
                        echo '*' . $_SESSION['infoUpdateErr']['passwordErr'];
                    }
                    ?>
                </div>
                <h4>Gender</h4>
                <div class="input-group">
                    <select name="gender" id="">
                        <option value="F">Female</option>
                        <option value="M">Male</option>
                    </select><br />
                </div>

               
            </div>
        </form>

        <!-- Form2 : Add address -->

        <form action="../backend/newAddress.php" method="POST">
            <br><input type="text" name="newAddress" placeholder="add a new address here">
            <button type="submit"  style="margin-left: 90% ;background-color: transparent; width: 10%; ">
                <i style="font-size:24px; color: green;" class="fa fa-plus-square"></i> 
            </button>
            <?php
            if (isset($_SESSION['newAddressErr']) && $_SESSION['newAddressErr'] != '') {
                echo $_SESSION['newAddressErr'];
            }

            ?>

        </form>

        </p>


        
        <!-- Table: List of available address+delete address-->
        <table>
            <?php while ($userAddressData = $responseAddress->fetch()) { ?>
                <tr>
                    <form action="../backend/deleteAddress.php" method="Post">
                        <td><?php echo $userAddressData['address'] ?></td>
                        <input type="hidden" name="addressValue" value="<?php echo $userAddressData['address']; ?>" >
                        <button type="submit"  style="background-color: transparent;  font-size: 24px;margin-left: 90%;width: 10%;">
                            <i style="font-size:24px ; color: red;" class="fa fa-minus-square"></i>
                        </button>
                    </form>

                </tr>
            <?php } ?>
        </table>
    </div>
    <input type="submit" value="Save changes" style="border-radius: 30%;margin-left: 78%; background-color:turquoise; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; width: 10%; margin-top: 2%; margin-bottom: 2%;">
                <?php
                if (isset($_SESSION['infoUpdateErr']) && $_SESSION['infoUpdateErr']['msg'] != '') {
                    echo $_SESSION['infoUpdateErr']['msg'];
                }
                ?>























</body>



