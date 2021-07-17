<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Skharni</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../utils/form/formStyle.css">
</head>

<body>
  

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
                            <button class="dropdown-item" onclick="document.getElementById('id02').style.display='block'" style="width:auto;" >Sign in</button>
                            <button class="dropdown-item" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" >Sign up</button>
                        </div>
                    </div>
    
    
                </div>
    
            </nav>
         
              
        
            <div style="display: flex;max-width:100%; width: 100%">
                <div class="col-sm-6 m-auto ">
    
                    <h1 style="font-size: 50px;
                            font-weight: bold;
                            margin-left:60px;
                            ">Any Where.<span> Any Time.<br> Stay Home &</span> <text style="color: #eb5844;">Skharni.</text></h1>
                    <p style="margin-left:60px;">
                        WE DELIVER MORE THAN DINNER. <br> NEED ANOTHER CHARGER? KITCHEN STAPLES? PARTY SUPPLIES? <br> WE'VE GOT EVERYTHING YOU NEED AVAILABLE FOR DELIVERY <br> </p>
                    <p style="font-size: xx-large;
                        margin-left:60px;"> <b> ONLY IN 10 DHS </b> </p>
    
    
                    <a href="#" class="button" style="background-color: #eb5844; 
                            color: white;
                            padding: 15px 62px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 16px;
                            margin: 4px 2px;
                            cursor: pointer;
                            margin: left 60px;
                            position: absolute;
                            left: 10%;">ORDER NOW <i class="fa fa-arrow-right"></i></a>
                </div>
                <div style="width:30%;height: auto ;color:white">
                    ppappapppapppapapppapppapapp
                </div>
                <!-- Hero slide -->
                <div>

                </div>
            
                    <div class=" col-sm-6 ml-md-auto" style="position: relative; margin-right:'90%';margin-left: 0">
                        <div class="slideshow-container">
        
                            <div class="mySlides fade">
                                <div class="numbertext">1 / 3</div>
                                <img src="../utils/fastfood.png" style="width:100%">
                                
                            </div>
        
                            <div class="mySlides fade">
                                <div class="numbertext">2 / 3</div>
                                <img src="../utils/grocery.png" style="width:100%">
                                
                               

             
                                
                            </div>
        
                            <div class="mySlides fade">
                                <div class="numbertext">3 / 3</div>
                                <img src="../utils/Medicament.png" style="width:100%">
                             
                            </div>
        
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
                        </div>
                        <br>
        
                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </div>
            </div>
             
                
    
     
        <!-- SIGN IN  -->

        <?php include '../utils/form/formLogin.php';?>
     
           
        <!-- SIGN UP  -->
        <?php include '../utils/form/formSignUp.php';?>
          






  


</body>
<script  type="text/javascript" src="../utils/form/formScript.js"></script>
<script type="text/javascript" src="../utils/form/loginScript.js"></script>


<script type="text/javascript" src="scripts.js"></script>

</html>