<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<?php
 
 echo "Logged out successfully";

 session_start();
 session_destroy();
 header('location:index.php')

?>
</body>
</html>