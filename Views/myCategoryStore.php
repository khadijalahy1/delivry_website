<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
</head>

<body>



    <!-- Navbar  -->
    <?php include './navbar.php' ?>

    <?php

    // connect to db
    // get all the id of all the stores where category=id category


    $responseStore = $db->query('SELECT DISTINCT storeIcon, storeAddress, storeName
    FROM store
    INNER JOIN article ON store.id=article.idStore
    WHERE idCategory='.$_GET['categoryId'].'
    ;');

  

    ?>

    <table>
        <tr>
            <?php
            while( $myStores=$responseStore->fetch()){

           

             ?>
             <td>
                 <a href=""><img src="<?php echo $myStores['storeIcon']?>" alt=""></a></br>
                 <div><?php echo $myStores['storeName']?> </div>
                
             </td>


            <?php
             }
             $responseStore->closeCursor();
            ?>
        </tr>
    </table>























</body>

</html>