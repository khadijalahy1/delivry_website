<!DOCTYPE html>
<!-- all my orders -->
<html lang="en">

<head>
    <?php include('head.php') ?>
    <link rel="stylesheet" href="tableCommands.css">

</head>


<body>

    <!-- Navbar  -->
    <?php include './navbar.php' ?>

    <?php
    // get All the Orders

    $responseOrder = $db->query('SELECT * FROM `order`');








    ?>


    <!-- Table of commands  form1: delete command-->


    <div class='post-body id=' post-body'>
        <div itemprop='description'>
            <div class='clear'></div>
            <table cellpadding="0" cellspacing="0" style="text-align: left;">
                <tbody>

                    <tr>
                        <th>Order</th>
                        <th>date Order</th>
                        <th>Time Order </th>
                        <th>Items</th>
                        <th>total Price</th>
                        <th>Status</th>
                        <th>Cancel order</th>
                    </tr>
                    <?php while ($dataOrder = $responseOrder->fetch()) {
                        $totalPrice = 0;
                        //get all the names of the products + qtity +total price
                        $responseCommand = $db->query(
                            'SELECT * FROM article
                            INNER JOIN command_ordinary ON  command_ordinary.idArticle = article.id
                            WHERE idOrder = ' . $dataOrder['id']
                        );


                    ?>
                        <tr>
                            <td><?php echo $dataOrder['id'] ?></td>
                            <td><?php echo $dataOrder['dateOrder'] ?></td>
                            <td><?php echo $dataOrder['timeOrder'] ?></td>
                          
                               
                       
                            <td> <?php while ($dataCommand = $responseCommand->fetch()) {
                                    $totalPrice = $totalPrice + $dataCommand['price'] * $dataCommand['quantity'];
                                ?><?php echo $dataCommand['nameArticle'].'*'.$dataCommand['quantity']."=>".$dataCommand['price'] * $dataCommand['quantity'].'DH </br>'?>    <?php } ?></td>
                           
                           

                      


                

                    
                    <td><?php echo $totalPrice .'DH'?></td>
                    <td></td>
                    <td>
                        <form action="../backend/cancelOrder.php" method="POST">
                            <input type="hidden" name="idOrder" value="<?php echo $dataOrder['id']?>">
                            <input type="submit" value="cancel Order">
                        </form>
                    </td>

                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>








</body>



</html>