<?php session_start() ?>
<!DOCTYPE html>
<html>

<link rel="stylesheet" href="formStyle.css">


<body>

    
  




<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

     <!-- Registration form  -->


  <form class="modal-content" action="/tests/delivry_project/backend/registration.php" method="POST">

    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
     
        <input type="text" name="fName" placeholder="first Name">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['fNameErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['fNameErr'];

        }
        ?>
        <br/>

      
        <input type="text" name="lName" placeholder="last Name">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['lNameErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['lNameErr'];

        }
        ?>
        <br/>

   
        <input type="text" name="userName" placeholder="username">
        <?php  
        if(isset($_SESSION['infoErr'])  && $_SESSION['infoErr']['userNameErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['userNameErr'];

        }
        ?>

        <br/>


        <input type="password" name="password"  placeholder="password">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['passwordErr']!='' )
        {
            echo '  *'.$_SESSION['infoErr']['passwordErr'];

        }
        ?>
        <br/>
    
        <input type="text" name="phone" placeholder="phone">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['phoneErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['phoneErr'];

        }
        ?>
        <br/>
    
        <input type="text" name="email" placeholder="email">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['emailErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['emailErr'];

        }
        ?>
        <br/>
    
        
        <select type="text" name="gender" class="selectClass">
            <option value="F" class="selectClass">Female</option>
            <option value="M" class="selectClass">Male</option>
        </select><br/>


        <input type="text" name="address" placeholder="address">
        <?php  
        if(isset($_SESSION['infoErr']) && $_SESSION['infoErr']['addressErr']!='')
        {
            echo '*'.$_SESSION['infoErr']['addressErr'];

        }
        ?>
        <br/>
    
    
      

  
 

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>



</div>

<script  type="text/javascript" src="./formScript.js"></script>

</body>
</html>
