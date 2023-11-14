<?php

include 'connect.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:'); 
}

?>

<!-- trang vi du cho dang nhap admin -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/admin_style.css">
</head>

<body>
    <div class="container">

        <div class="content">
            <h3>hi, <span>admin</span></h3>
            <h1>welcom <span><?php echo $_SESSION['admin_name']; ?></span></h1>
            <p>this is admin page</p>
            <a href="?act=logout" class="delete-btn">logout</a>
        </div>

    </div>
</body>

</html>