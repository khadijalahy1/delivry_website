<!DOCTYPE html>
<html>

<link rel="stylesheet" href="formStyle.css">


<body>




<?php
 
function showLoggingform(){
echo '
<div id="id02" class="modale">
<span onclick="document.getElementById(\'id02\').style.display=\'none\'" class="close" title="Close Modal">&times;</span>

<form class="modal-content" action="/tests/delivry_project/backend/Login.php" method="POST">
    <div class="container">
      <h1>Sign In</h1>
     
      <hr>
      <input type="hidden" name="side" value="user"/>
      <input type="text" placeholder="Login using Email / UserName /phone" name="userInfo" >'?>
    <?php 
        if(isset($_SESSION['LoginErr']['userErr'])&&$_SESSION['LoginErr']['userErr']!='')
        {
            echo '  *'.$_SESSION['LoginErr']['userErr'];
        }
        ?>
    <?php
       echo'<br/><input type="password" placeholder="Enter password" name="password" >'
      ?>
       <?php 
        if(isset($_SESSION['LoginErr']['passwordErr'])&&$_SESSION['LoginErr']['passwordErr']!='')
        {
            echo '  *'.$_SESSION['LoginErr']['passwordErr'];
        }
        ?>
        <?php
        echo '
        <br/>
        <div class="clearfix">
        <button type="button" onclick="document.getElementById(\'id02\').style.display=\'none\'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign In</button>
        '

        
         ?>
         <?php 
        if(isset($_SESSION['LoginErr']['msg'])&&$_SESSION['LoginErr']['msg']!='')
        {
            echo $_SESSION['LoginErr']['msg'];
        }
        ?>


<?php echo '

</div>
</div>
</form>
</div>
';
}
?>
     

 




 






</body>
</html>