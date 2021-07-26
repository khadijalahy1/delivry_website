<?php
//Connect to db 
session_start();
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}



//get current date and time 
$currentDate=date("Y-m-d");
$currentTime= date('H:i:s');

//insert newOrder on order table
echo $_SESSION['userId'];
echo $_POST['addressOrder'];

$req = $db->exec('INSERT INTO `order` (`id`, `dateOrder`, `timeOrder`, `idUser`, `idAddress`) VALUES (NULL, "'.$currentDate.'", "'.$currentTime.'", "'.$_SESSION['userId'].'", "'.$_POST['addressOrder'].'");');






//get Order Id
$responseidOrder = $db->query(
    'SELECT id FROM `order` WHERE dateOrder=\''.$currentDate.'\' AND timeOrder=\''.$currentTime.'\' AND idUser=' . $_SESSION['userId']


);

$idOrderArray=$responseidOrder->fetch();

$idOrder=$idOrderArray['id'];
echo $idOrder;


//update command table assign the orderId to commands that have idOrder IS NULL
 $do=$db->prepare(' UPDATE command_ordinary SET idOrder=:idOrder WHERE idOrder IS NULL');
 $do->execute(
     array(
         'idOrder'=>$idOrder

     )
     );





//back to myCart View */

header('Location:/tests/delivry_project/Views/myCart.php');



?>