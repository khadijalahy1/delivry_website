<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}

$req=$db->exec('DELETE FROM `order` WHERE id='.$_POST['idOrder']);



header('Location:/tests/delivry_project/Views/myOrders.php');
?>