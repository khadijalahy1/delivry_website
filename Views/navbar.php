<!-- Navbar  -->
<?php //get url page and store it into a session
//connect to dB
session_start();
try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=delivry_website;charset=utf8', 'root', "root");
} catch (Exception $e) {
    die('Error :' . $e->getMessage());
}


if (isset($_SESSION['userId'])) {
    $myCart='myCart.php';
    $listOrders='myOrders.php';
    

} else {
    $listOrders = $viewOrder = $orderProcess = $notification = $Inbox = $myCart = "../backend/navBarFunctions.php?do=login";
}

?>




<nav class="navbar navbar-expand-lg">

    <a href="#" class="navbar-brand"><img src="../utils/Skharnilogo.png" alt="" width="140" height="40" style="margin-left: 10px;"></a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start" style=" white-space: nowrap;">
        <div class="navbar-nav">
            <a href="#" class="nav-item nav-link">Home</a>
            <div class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Category</a>
                <div class="dropdown-menu">
                    <?php
                    //dynamic Category menu

                    $responseCategory = $db->query('SELECT * FROM category ');
                    while($category=$responseCategory->fetch()){
                        $categoryId=$category['id'];
                        $categoryName=$category['categoryName'];
                    ?>
                     <a href="<?php echo "myCategoryStore.php?categoryId=".$categoryId  ?>" class="dropdown-item"><?php echo $categoryName; ?></a>

                    <?php
                    }
                    $responseCategory->closeCursor();

                    ?>
                    <a href="anyThingOrdering.php"  class="dropdown-item">anything</a>
                   
              
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">My Orders</a>
                <div class="dropdown-menu">
                    <a href="<?php echo $listOrders; ?>" class="dropdown-item">List of orders</a>
                    <a href="<?php echo $viewOrder; ?>" class="dropdown-item">View Order</a>
                    <a href="<?php echo $orderProcess; ?>" class="dropdown-item">Order in process</a>

                </div>
            </div>

            <a href="<?php echo $notification; ?>" class="nav-item nav-link active">Notifications</a>
            <a href="<?php echo $Inbox; ?>" class="nav-item nav-link">Inbox</a>
            <a href="#" class="nav-item nav-link">Contact</a>


        </div>


        <a href="<?php echo $myCart; ?>" class="nav-item nav-link active"><i class="fa fa-shopping-basket"></i></a>
        <?php


        //if User is logged show his name
        if (isset($_SESSION['userId'])) {

            $response = $db->query('SELECT * FROM user WHERE id = ' . $_SESSION['userId']);
            $userData = $response->fetch();
            $fName = $userData['fName'];
            $lName = $userData['lName'];



        ?>
            <a href="#" class="nav-item nav-link active"><?php echo $fName . ' ' . $lName ?></a>
        <?php
        }
        ?>


        <div class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle"><i class="fa fa-user"></i></a>
            <div class="dropdown-menu">
                <?php
                if (isset($_SESSION['userId'])) {
                ?>
                    <a href="myProfile.php"><button class="dropdown-item" style="width:auto;">My profile</button></a>
                    <a href="../backend/navBarFunctions.php?do=logout"><button class="dropdown-item" style="width:auto;">Log Out</button></a>

                <?php
                } else {
                ?>
                    <a href="../backend/navBarFunctions.php?do=login"><button class="dropdown-item" style="width:auto;">Sign In</button></a>
                    <a href="../backend/navBarFunctions.php?do=register"><button class="dropdown-item" style="width:auto;">Sign Up</button></a>

                <?php
                }
                ?>

            </div>
        </div>



    </div>

</nav>







<!-- SIGN UP  -->
<?php include '../utils/form/formSignUp.php';
if (isset($_SESSION['showSignUpForm']) && $_SESSION['showSignUpForm']) {

    showSignUpform();
    $_SESSION['showSignUpForm'] = false;
}

?>
<!-- SIGN IN  -->


<?php include '../utils/form/formLogin.php';
if (isset($_SESSION['showLoggingForm']) && $_SESSION['showLoggingForm']) {

    showLoggingform();
    $_SESSION['showLoggingForm'] = false;
}

?>






<script type="text/javascript" src="../utils/form/formScript.js"></script>
<script type="text/javascript" src="../utils/form/loginScript.js"></script>
<script type="text/javascript" src="scripts.js"></script>