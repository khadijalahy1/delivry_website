<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="tableCommands.css">

</head>


<body>

    <!-- Navbar  -->
    <?php include './navbar.php' ?>

    <!-- Table of commands  form1: delete command-->
    <?php
    //get id command where idOrder=Null + id article +total price

    $responseCommand = $db->query(
                                'SELECT *
                                    FROM article
                                    INNER JOIN command_ordinary ON  command_ordinary.idArticle = article.id
                                    WHERE idOrder IS NULL AND idUser= ' . $_SESSION['userId']


    );
    //get all adress of the user
    $responseAddress = $db->query('SELECT address FROM address WHERE id_user =' . $_SESSION['userId']);
    //get user's phone number
    $responsePhone=$db->query('SELECT phone FROM user WHERE id='.$_SESSION['userId']);
    $phoneNumber=$responsePhone->fetch();
   
   



    ?>
    <div class='post-body id=' post-body'>
        <div itemprop='description'>
            <div class='clear'></div>
            <table cellpadding="0" cellspacing="0" style="text-align: left;">
                <tbody>

                    <tr>
                        <th>Item</th>
                        <th>quantity</th>
                        <td>price </td>
                        <th></th>
                    </tr>
                    <?php while ($commandData = $responseCommand->fetch()) { ?>
                       

                        <tr>
                            <td><?php echo $commandData['nameArticle'] ?></td>
                            <td><?php echo $commandData['quantity'] ?></td>
                            <td><?php echo $commandData['quantity'] * $commandData['price'] ?> </td>
                            <form action="../backend/deleteItem.php" method="POST">
                                <td>
                                    <input type="hidden" name="idCommand" value="<?php echo $commandData['id']  ?>">
                                    <input type="submit" rel="nofollow noopener" target="_blank" value="Delete Item">

                                </td>
                            </form>

                        </tr>

                    <?php
                    }
                    $responseCommand->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Address  form2: add address-->
    <p>
        <select name="" id="" class="select">
            <?php 
            while($address=$responseAddress->fetch()){

           print_r($address);
            ?>

            <option value="<?php echo $address['address'] ?>"><?php echo $address['address'] ?></option>
            <?php
            }
            $responseAddress->closeCursor();
             ?>

        </select>

    <form action="../backend/newAddress.php" method="POST">
        <input type="text" name="newAddress">
        <input type="hidden" name="currentView" value="myCart.php">
        <input type="submit" value="add new address">
    </form>

    </p>


    <!-- Address  form2: update phone-->
    <div>
        <form action="../backend/updatePhone.php" method="POST">
            <input type="text" name="phone" value="<?php echo $phoneNumber['phone'] ?>">
            <input type="submit" value="update phone Number">
        </form>


    </div>
    <!-- Submit Button finalize order-->
    <form action="" method="">
        <input type="submit" value="Finalize order">
    </form>
    <div>

    </div>









</body>



</html>