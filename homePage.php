<!-- Registration form + Login System  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Registration form  -->
    <form action="registration.php" method="POST" >
        <label for="">First Name :</label>
        <input type="text" name="fName"><br/>

        <label for="">Last Name :</label>
        <input type="text" name="lName"><br/>

        <label for="">Username :</label>
        <input type="text" name="userName"><br/>

        <label for="">Password :</label>
        <input type="password" name="password"><br/>
    
        <label for="">phone :</label>
        <input type="phone" name="phone"><br/>
    
        <label for="">Email :</label>
        <input type="email" name="email"><br/>
    
        <label for="">gender :</label>
        <select name="gender" id="">
            <option value="F">Female</option>
            <option value="M">Male</option>
        </select><br/>

        <label for="">Address :</label>
        <input type="text" name="address"><br/>
    
        <input type="submit" value="Register">
    

    </form>
    
</body>
</html>