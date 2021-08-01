<?php
//start session

session_start();

$Errors=array(
    'userErr'=>'',
    'passwordErr'=>'',
    'msg'=>''

);


//check if the username /phone or email is not an injection and check if it exists
$userInfo=htmlspecialchars($_POST['userInfo']);
$password=htmlspecialchars($_POST['password']);
$table= ($_POST['side']=="user")?'user':'delivry_man';
echo $table;

//connect to db

try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");

}
catch(Exception $e){
    die('Error :'.$e->getMessage());
}

//check if user exist
$responseUser=$db->query('SELECT id FROM '.$table.' WHERE userName = \''.$userInfo.'\' OR phone = \''.$userInfo.'\' OR email= \''.$userInfo.'\'');
$resultUser=$responseUser->fetch();
print_r($resultUser);

if($resultUser==null){
    $Errors['userErr']='invalid user info';
}
else{
    //check password
    $idUser=$resultUser['id'];
    $responsePassword=$db->query('SELECT * FROM '.$table.' WHERE id = '.$idUser.' AND password = \''.$password.'\'' );
    $resultPassword=$responsePassword->fetch();
  
    if ($resultPassword==null){

        $Errors['passwordErr']='Wrong password Retry again !';
    }
    else{
        //variable that stocks the id of the user to use it later
        if($table=='user'){
            $_SESSION['userId']=$idUser;

        }
      
       $Errors['msg']='User Logged successufully';

    }
   

}
//affectation LoginError
if($table=='user'){
    $_SESSION['LoginErr']=$Errors;
    echo 'I am here user';
    if($_SESSION['LoginErr']['msg']==''){
        $_SESSION['showLoggingForm']=true;
    }
    
}
else{
    $_SESSION['deliveryLoginErr']=$Errors;
    echo 'I am here delivery';

}


echo ('Login User');
print_r($_SESSION['LoginErr']);
echo ('delivery Login error');
print_r($_SESSION['deliveryLoginErr']);

$location= ($_POST['side']=="user")?'Views/homePage.php':'delivry_man_views/loginPage.php';

header('Location:/tests/delivry_project/'.$location);




?>