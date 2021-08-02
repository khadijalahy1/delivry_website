<?php session_start() 
?>
<!DOCTYPE html>
<!-- this page should be displayed only if user is logged wm : when session user is created  -->
<html lang="en">


<head>
    
    
    <?php include '../Views/head.php' ?>
    <link rel="stylesheet" href="../Views/styles.css">
    
 

</head>




<body>
<?php if(isset( $_SESSION['deliveryManId'])){ ?>


    <!-- Navbar  -->
    <?php include 'navbar.php' ?>
    <div>Chart will be inserted here</div>
<?php }  
else {
    
    echo 'only user can access this page';
}
    ?>
   

</body>




</html>
