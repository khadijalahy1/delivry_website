<?php 
//update infos
//create and initialize _SESSION['infoErr'] array_map

session_start();
$_SESSION['infoUpdateErr'] = array(
    'fNameErr' => '',
    'lNameErr' => '',
    'userNameErr' => '',
    'passwordErr' => '',
    'phoneErr' => '',
    'emailErr' => '',
    'msg'=>''
   
);

//initialize $Error here
  $Error=array(
    'fNameErr' => '',
    'lNameErr' => '',
    'userNameErr' => '',
    'passwordErr' => '',
    'phoneErr' => '',
    'emailErr' => '',
    'msg'=>''
  
);


$updateIsValid=true;




////////////////////////////////////////////utils////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////:  


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkName($myName)
{ //fName
    
    if (empty($_POST[$myName])) {
       
        $GLOBALS['Error'][$myName . 'Err'] = " Name is required";  

    } else {
        $name = test_input($_POST[$myName]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $GLOBALS['Error'][$myName . 'Err'] = "Only letters and white space allowed";
        }
    }

}

function isUsed($myInfo)
{
    
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
    $response = $db->query('SELECT COUNT(userName) FROM user WHERE ' . $myInfo . '= \'' . $_POST[$myInfo] . '\' AND id != '.$_SESSION['userId']);
    $data = $response->fetch();
    if ($data['0'] != 0) {
        $GLOBALS['Error'][$myInfo . 'Err'] = ' This ' . $myInfo . ' is already used';
    }
}

// check registration info and display errors ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 



function checkUpdateInfo()
{
  

    //check fName

    checkName('fName');
    //check lName

    checkName('lName');
    //check UserName

    checkName('userName');
   
    isUsed('userName');

    //check password

    if (!empty($_POST["password"])) {
        $password = test_input($_POST["password"]);
        if (strlen($_POST["password"]) <= '8') {
            $GLOBALS['Error']['passwordErr'] = "Your Password Must Contain At Least 8 Characters!";
        } elseif (!preg_match("#[0-9]+#", $password)) {
            $GLOBALS['Error']['passwordErr']  = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $password)) {
            $GLOBALS['Error']['passwordErr']  = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $password)) {
            $GLOBALS['Error']['passwordErr']  = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
        isUsed('password');
    } else {
        $GLOBALS['Error']['passwordErr']  = "password is required   ";
    }

    //check Email

    if (empty($_POST["email"])) {
        $GLOBALS['Error']['emailErr'] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $GLOBALS['Error']['emailErr'] = "Invalid email format";
        }
        isUsed('email');
    }

    //check phone (Only Moroccan numbers are acccepted  06--------/05--------/07--------)

    if (empty($_POST["phone"])){

        $GLOBALS['Error']['phoneErr']  = "phone is required";
    }
    else{
        if(!preg_match("/^[0]{1}[5-7]{1}[0-9]{8}$/", $_POST['phone'])) { 
            $GLOBALS['Error']["phoneErr"]="Invalid phone number";
          }
        else{
            isUsed('phone');
        }

    }
    



    //check if everything is well
    if($GLOBALS['Error']!=$_SESSION['infoUpdateErr']){
       $GLOBALS['updateIsValid']=false;

    }

    //infoErr is ready
    $_SESSION['infoUpdateErr']= $GLOBALS['Error'];
    echo '<br/>';

  
   


}

////////////////////////////////////////////////////////////////////////Add new user//////////////////////////////////////////////////////////////////////////////////////


function updateUser()
{
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
    //add informations to the User Table
   
    $req = $db->prepare('UPDATE user SET fName=:fName , lName=:lName,userName=:userName,phone=:phone,email=:email,password=:password,gender=:gender WHERE id='.$_SESSION['userId']);
    $req->execute(array(
        'fName' => $_POST['fName'],
        'lName' => $_POST['lName'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'gender' => $_POST['gender'],
        'userName' => $_POST['userName'],

    ));


   
}


////////////////////////////////// Call functions///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
checkUpdateInfo();
if($updateIsValid){
    updateUser();
    $_SESSION['infoUpdateErr']['msg']='The update was done successufully !';

}

header('Location:/tests/delivry_project/Views/myProfile.php');
?>