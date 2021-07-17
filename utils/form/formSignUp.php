<!DOCTYPE html>
<html>

<link rel="stylesheet" href="formStyle.css">


<body>




<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <input type="text" placeholder="Enter first Name" name="fName" required><br/>
      <input type="text" placeholder="Enter last Name" name="lName" required><br/>
      <input type="text" placeholder="Enter username" name="userName" required><br/>
      <input type="text" placeholder="Enter Email" name="email" required><br/>
      <input type="text" placeholder="Enter phone" name="phone" required><br/>
      <input type="password" placeholder="Enter address" name="address" required><br/>
     
    

      
      <input type="password" placeholder="Enter Password" name="psw" required><br/>

      
      
   

 

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
