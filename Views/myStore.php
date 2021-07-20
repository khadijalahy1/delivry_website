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
                    <div><strong><?php echo $myArticles['price'] ?></strong></div>
                    <div class="number">
                        <span class="minus">-</span>
                        <input type="text" value="1" />
                        <span class="plus">+</span>
                    </div>
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