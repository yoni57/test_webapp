<?php
session_start();
@include('config.php');

$display="";

if(isset($_POST['submit'])){


    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $cpass=md5($_POST['cpassword']);
    $type=$_POST['type'];

    $sql="SELECT * FROM register WHERE  email='$email'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        $display="<p style='color:red;'>email already exist</p>";
    }
    else
    {
         if($pass!=$cpass){
            $display="<p style='color:yellow;'>password doesn't match</p>";
        }
        else{
            $insert= "INSERT INTO register (fname,lname,email,password,type) VALUES('$fname','$lname','$email','$pass','$type')";
            $result=mysqli_query($conn,$insert);
            $display = "<p style='color:green;'>Registration succesful</p>";
        }
        
    }
    



}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="topnav">
        <nav>
            <label class="logo">YONAK</label>
            <ul>
                <li><a class="active" href="index.php">HOME</a></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="index.php">HOME</a></li>
                <li><a class="split" href="login.php">login</a></li>
            </ul>
        </nav>

    </div>
    <div class="form-container">
        <form action="register.php" method="post">
        <h3>Register Here</h3>
        <?php echo $display;?>
        
               
        <input type="text" name="fname" placeholder="enter your first name" class="box" required>
        <input type="text" name="lname" placeholder="enter your last name" class="box" required>
        <input type="email" name="email" placeholder="enter your email" class="box"required>
        <input type="password" name="password" placeholder="enter your password" class="box" required>
        <input type="password" name="cpassword" placeholder="comfirm your password" class="box" required>
        <div>
            <input type="radio" name="type" class="" value="admin" id="admin" required> <label for="admin">admin</label>
            <input type="radio" name="type" class="" value="user" id="user" required> <label for="user">user</label>
        </div>
        <input type="submit"  value="Register now" name="submit" class="form-btn">
        <p><br><br>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>