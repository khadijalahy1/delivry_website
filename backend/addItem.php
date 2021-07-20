<?php
session_start();
$idArticleToAdd=$_POST['idArticle'];
$quantity=$_POST['quantity'];


//if user not logged yet show logging form
if(!isset($_SESSION['userId'])){
    $_SESSION['showLoggingForm']=true;

}

//else add Item to command table
else{
    //connect to db
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
    //add Item to command_ordinary table
    $req = $db->prepare('INSERT INTO command_ordinary(idArticle,idUser,quantity) VALUES(:idArticle,:idUser,:quantity)');
    $req->execute(array(
        'idArticle' => $idArticleToAdd,
        'idUser' =>$_SESSION['userId'],
        'quantity'=>$quantity
       
    ));

}
header('Location:/tests/delivry_project/Views/myStore.php?storeId='.$_POST['storeId']);



?>