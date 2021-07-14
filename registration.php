<?php

//Connect to DB

try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");

}
catch(Exception $e){
    die('Error :'.$e->getMessage());
}

//add informations to the User Table
$req = $db->prepare('INSERT INTO user(fName,lName,phone,email,password,gender,userName) VALUES(:fName, :lName, :phone, :email, :password, :gender,:userName)');
$req->execute(array(
	'fName' => $_POST['fName'],
	'lName' => $_POST['lName'],
	'phone' =>$_POST['phone'],
	'email' => $_POST['email'],
	'password' => $_POST['password'],
	'gender' => $_POST['gender'],
    'userName' =>$_POST['userName']
	));


//get Id of the User that we've just add

$response=$db->query('SELECT id FROM user WHERE email= \''.$_POST['email'].'\';'); //contains the response
$data=$response->fetch();
$idUser=$data['id'];

//add informations to the address table

$req = $db->prepare('INSERT INTO address(address,id_user) VALUES(:address, :id_user)');
$req->execute(array(
	'address' => $_POST['address'],
	'id_user' =>$idUser
	));

// check registration info and display errors    
function checkRegistrationInfo(){

}

header('Location:homePage.php');


?>