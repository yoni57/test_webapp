<?php
session_start();
@include('config.php');

$alert="";

if(isset($_POST['submit'])){

    
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    

    $sql="SELECT * FROM register WHERE email='$email' && password='$pass'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
        while ($row = $result->fetch_assoc()) {
            if($row['type'] == 'user')
            {
                header('location:user.php');
            }
            else if($row['type'] == 'admin')
            {
                header('location:admin.php');
            }
        }
    }else
    {
     $alert="<p style='color:red;'>Incorrect email or password</p>";
    }
    
        
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form action="login.php" method="post">
            <h3>Login Now</h3>
            <?php echo $alert;?>
            <input type="email" name="email" placeholder="Enter your email" class="box" required >
            <input type="password" name="password" placeholder="Enter your password" class="box" required>
            <input type="submit"  value="login now" name="submit" class="form-btn">
            <p><br><br>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </div>
</body>
</html>