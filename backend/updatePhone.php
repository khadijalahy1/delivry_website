<?php
//update the phone Number of the User



session_start();
$_SESSION['phoneErr'] = '';
echo $_POST['phone'];



//Connect to dB
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}






//check if phone is (not null+valid)

if (empty($_POST['phone'])) {
    $_SESSION['phoneErr'] = 'phone Number is required';
} else {
    if (!preg_match("/^[0]{1}[5-7]{1}[0-9]{8}$/", $_POST['phone'])) {
        $_SESSION['phoneErr'] = "Invalid phone number";
    }
}
//update phone

if ($_SESSION['phoneErr'] == '') {
    $req = $db->prepare('UPDATE user SET phone=:phone WHERE id='.$_SESSION['userId']);
    $req->execute(array(
        
        'phone' => $_POST['phone'],
    

    ));
    echo 'update done';

}

header('Location:/tests/delivry_project/Views/myCart.php' );
?>
