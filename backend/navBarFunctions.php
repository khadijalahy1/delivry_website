<?php
session_start();
  
if($_GET['do']=='login'){
    echo 'am Logging';
    $_SESSION['showLoggingForm']=true;
    $_SESSION['showSignUpForm']=false;
    $_SESSION['LoginErr']=array(
        'userErr'=>'',
        'passwordErr'=>'',
        'msg'=>''
    
    );

   
}
else if($_GET['do']=='register'){
    $_SESSION['showLoggingForm']=false;
    $_SESSION['showSignUpForm']=true;
    $_SESSION['infoErr'] = array(
        'fNameErr' => '',
        'lNameErr' => '',
        'userNameErr' => '',
        'passwordErr' => '',
        'phoneErr' => '',
        'emailErr' => '',
        'addressErr' => '',
    );
    

}
print_r($_SESSION);
header('Location:/tests/delivry_project/Views/homePage.php');



?>