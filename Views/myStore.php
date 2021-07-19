<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>
</head>

<body>



    <!-- Navbar  -->
    <?php include './navbar.php' ?>

    <?php

   
    


    $responseArticle = $db->query('SELECT * FROM article WHERE idStore='.$_GET['storeId']);

 



  

    ?>

    <table>
        <tr>
            <?php
            while( $myArticles=$responseArticle->fetch()){

                

             ?>
            
             <td>
             <a href="<?php ?>"><img src="<?php echo $myArticles['iconArticle'] ?>" style="width=10% height=10%" alt=""></a></br>
                 <div><?php echo $myArticles['nameArticle']?> </div>
                <div><strong><?php echo $myArticles['price'].' DH'?> </strong></div>
                <div></div>
                <div><?php echo $myArticles['descriptionArticle']?></div>
             </td>


            <?php
             }
             $responseArticle->closeCursor();
            ?>
        </tr>
    </table>























</body>

</html>