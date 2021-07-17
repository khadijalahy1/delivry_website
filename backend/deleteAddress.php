<?php 
//delete address
session_start();
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}

$req=$db->prepare('DELETE FROM address WHERE id_user=:id_user AND address=:addressValue ;');
 $req->execute(array(
    'id_user' => $_SESSION['userId'],
    'addressValue' => $_POST['addressValue'],

  

));
echo 'DELETE FROM address WHERE id_user=:id_user AND address=:addressValue ';
echo  $_SESSION['userId'];
echo $_POST['addressValue'];

header('Location:myProfile.php');
?>