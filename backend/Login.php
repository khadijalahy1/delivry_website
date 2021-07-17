<?php
//start session
session_start();
$_SESSION['LoginErr']=array(
    'userErr'=>'',
    'passwordErr'=>'',
    'msg'=>''

);


//check if the username /phone or email is not an injection and check if it exists
$userInfo=htmlspecialchars($_POST['userInfo']);
echo $userInfo;
$password=htmlspecialchars($_POST['password']);

//connect to db

try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");

}
catch(Exception $e){
    die('Error :'.$e->getMessage());
}

//check if user exist
$responseUser=$db->query('SELECT id FROM user WHERE userName = \''.$userInfo.'\' OR phone = \''.$userInfo.'\' OR email= \''.$userInfo.'\'');
echo 'SELECT id FROM user WHERE userName = \''.$userInfo.'\' OR phone = \''.$userInfo.'\' OR email='.$userInfo.'\'';
$resultUser=$responseUser->fetch();
if($resultUser==null){
    $_SESSION['LoginErr']['userErr']='invalid user info';
}
else{
    //check password
    $idUser=$resultUser['id'];
    $responsePassword=$db->query('SELECT * FROM user WHERE id = \''.$idUser.'\' AND password = \''.$password.'\'' );
    $resultPassword=$responsePassword->fetch();
  
    if ($resultPassword==null){

        $_SESSION['LoginErr']['passwordErr']='Wrong password Retry again !';
    }
    else{
        //variable that stocks the id of the user to use it later
       $_SESSION['userId']=$idUser;
       $_SESSION['LoginErr']['msg']='User Logged successufully';

    }
    

}
print_r($_SESSION['LoginErr']);

header('Location:loginPage.php');




?>