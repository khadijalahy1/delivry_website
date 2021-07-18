
    <!-- Navbar  -->

    

    <nav class="navbar navbar-expand-lg">

                <a href="#" class="navbar-brand"><img src="../utils/Skharnilogo.png" alt="" width="140" height="40" style="margin-left: 10px;"></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

                <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link">Home</a>
                        <div class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">Category</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">Fast Food</a>
                                <a href="#" class="dropdown-item">Grocery</a>
                                <a href="#" class="dropdown-item">Pharmacy</a>
                                <a href="#" class="dropdown-item">Shop</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle">My Orders</a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item">List of orders</a>
                                <a href="#" class="dropdown-item">View Order</a>
                                <a href="#" class="dropdown-item">Order in process</a>
    
                            </div>
                        </div>
    
                        <a href="#" class="nav-item nav-link active">Notifications</a>
                        <a href="#" class="nav-item nav-link">Inbox</a>
                        <a href="#" class="nav-item nav-link">Contact</a>
    
                    </div>
    
                    <a href="#" class="nav-item nav-link active"><i class="fa fa-shopping-basket"></i></a>
    
                    <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle"><i class="fa fa-user"></i></a>
                        <div class="dropdown-menu">
                            <a href="../backend/navBarFunctions.php?do=login"><button class="dropdown-item"  style="width:auto;" >Sign in</button></a>
                            <a href="../backend/navBarFunctions.php?do=register"><button class="dropdown-item" style="width:auto;" >Sign up</button></a>
                            
                        </div>
                    </div>
    
    
                </div>
    
            </nav>
            
    
        

      
     
           
     <!-- SIGN UP  -->
       <?php include '../utils/form/formSignUp.php';
       if(isset($_SESSION['showSignUpForm'])&&$_SESSION['showSignUpForm']){
        
        showSignUpform();
        $_SESSION['showSignUpForm']=false;

    }

       ?>
           <!-- SIGN IN  -->
      

    <?php include '../utils/form/formLogin.php';
       if(isset($_SESSION['showLoggingForm'])&&$_SESSION['showLoggingForm']){
       
        showLoggingform();
        $_SESSION['showLoggingForm']=false;
    }

       ?>
       
       
    



<script  type="text/javascript" src="../utils/form/formScript.js"></script>
<script type="text/javascript" src="../utils/form/loginScript.js"></script>
<script type="text/javascript" src="scripts.js"></script>
