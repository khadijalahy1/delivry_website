<?php

//create and initialize _SESSION['infoErr'] array_map

session_start();
$_SESSION['infoErr'] = array(
    'fNameErr' => '',
    'lNameErr' => '',
    'userNameErr' => '',
    'passwordErr' => '',
    'phoneErr' => '',
    'emailErr' => '',
    'addressErr' => '',
);

//initialize $Error here
  $Error=array(
    'fNameErr' => '',
    'lNameErr' => '',
    'userNameErr' => '',
    'passwordErr' => '',
    'phoneErr' => '',
    'emailErr' => '',
    'addressErr' => '',
);


$registrationIsValid=true;




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
    $response = $db->query('SELECT COUNT(userName) FROM user WHERE ' . $myInfo . '= \'' . $_POST[$myInfo] . '\'');
    $data = $response->fetch();
    if ($data['0'] != 0) {
        $GLOBALS['Error'][$myInfo . 'Err'] = ' This ' . $myInfo . ' is already used';
    }
}

// check registration info and display errors ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 



function checkRegistrationInfo()
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
    
    //check address
    if (empty($_POST["address"])){

        $GLOBALS['Error']['addressErr']  = "address is required";
    }


    //check if everything is well
    if($GLOBALS['Error']!=$_SESSION['infoErr']){
       $GLOBALS['registrationIsValid']=false;

    }

    //infoErr is ready
    $_SESSION['infoErr']= $GLOBALS['Error'];
    echo '<br/>';

    print_r($_SESSION['infoErr']);

   


}

////////////////////////////////////////////////////////////////////////Add new user//////////////////////////////////////////////////////////////////////////////////////


function addUser()
{
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
    } catch (Exception $e) {
        die('Error :' . $e->getMessage());
    }
    //add informations to the User Table
    $req = $db->prepare('INSERT INTO user(fName,lName,phone,email,password,gender,userName) VALUES(:fName, :lName, :phone, :email, :password, :gender,:userName)');
    $req->execute(array(
        'fName' => $_POST['fName'],
        'lName' => $_POST['lName'],
        'phone' => $_POST['phone'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'gender' => $_POST['gender'],
        'userName' => $_POST['userName']
    ));


    //get Id of the User that we've just add

    $response = $db->query('SELECT id FROM user WHERE email= \'' . $_POST['email'] . '\';'); //contains the response
    $data = $response->fetch();
    $idUser = $data['id'];

    //add informations to the address table

    $req = $db->prepare('INSERT INTO address(address,id_user) VALUES(:address, :id_user)');
    $req->execute(array(
        'address' => $_POST['address'],
        'id_user' => $idUser
    ));
}


////////////////////////////////// Call functions///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
checkRegistrationInfo();
if($registrationIsValid){
    addUser();
}
header('Location:/tests/delivry_project/Views/homePage.php');


?>