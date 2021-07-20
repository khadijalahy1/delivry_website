<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.php') ?>

</head>


<body>

    <!-- Navbar  -->
    <?php include './navbar.php' ?>

    <?php

    $responseArticle = $db->query('SELECT * FROM article WHERE idStore=' . $_GET['storeId']);
   
    ?>

    <table>
        <tr>
            <?php
            while ($myArticles = $responseArticle->fetch()) {



            ?>

                <td>
                    <a href="<?php ?>"><img src="<?php echo $myArticles['iconArticle'] ?>" alt="" style=" display: block;max-width:230px;max-height:95px; width: auto;
                    height: auto;"></a></br>

                    <div><?php echo $myArticles['nameArticle'] ?> </div>
                    <div><strong><?php echo $myArticles['price'].' DH' ?></strong></div>

                    <form action="../backend/addItem.php" method="POST">
                        <input  value="1" id=demoInput type=number min=1 max=20 name="quantity" >
                        <input type="hidden" name="idArticle" value="<?php echo $myArticles['id']?>">
                        <input type="hidden" name="storeId" value="<?php echo $_GET['storeId']?>">

                        <input type="submit" value="add to my cart">
                    </form>

                    <div><?php echo $myArticles['descriptionArticle'] ?></div>

                </td>


            <?php
            }
            $responseArticle->closeCursor();
            ?>
        </tr>
    </table>
























</body>



</html>