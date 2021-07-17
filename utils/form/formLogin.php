<!DOCTYPE html>
<html>

<link rel="stylesheet" href="formStyle.css">


<body>




<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign In</h1>
     
      <hr>
      <input type="text" placeholder="Login using Email / UserName /phone" name="email" required><br/>
      <input type="password" placeholder="Enter password" name="password" required><br/>
     

      
      
   

 

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign In</button>
      </div>
    </div>
  </form>
</div>

<script  type="text/javascript" src="./loginScript.js"></script>

</body>
</html>