<?php
//delete Item Command table where id
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}

$db->exec('DELETE FROM command_ordinary WHERE id='.$_POST['idCommand']);
header('Location:/tests/delivry_project/Views/myCart.php');



?>