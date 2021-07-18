<?php

session_start();
$_SESSION['newAddressErr']='';


//Connect to dB
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}
$responseAddress = $db->query('SELECT * FROM address WHERE id_user =' . $_SESSION['userId'].' AND address= \''.$_POST['newAddress'].'\'');
echo 'SELECT address FROM address WHERE id_user =' . $_SESSION['userId'].' AND address= \''.$_POST['newAddress'].'\'';
$addressData=$responseAddress->fetch();





//check address-> check if the address is valid and not empty and not already used

    if(empty($_POST['newAddress'])){
        $_SESSION['newAddressErr']='address is required';
        

    }
    else{
        if($addressData){
            $_SESSION['newAddressErr']='this address already exists';
        }
        //address validation format
        

    }
//add adress 

    if($_SESSION['newAddressErr']==''){
        $req = $db->prepare('INSERT INTO address(address,id_user) VALUES(:address,:id_user)');
        $req->execute(array(
            'address' => $_POST['newAddress'],
            'id_user' => $_SESSION['userId'],
           
        ));

    }
    
    header('Location:/tests/delivry_project/Views/myProfile.php');
   
    

    




?>