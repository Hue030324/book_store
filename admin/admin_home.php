<?php

include 'connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:?act=home');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>
    <div class="container">

        <div class="content">
            <h3>hi, <span>admin</span></h3>
            <h1>welcom <span><?php echo $_SESSION['admin_name']; ?></span></h1>
            <p>this is admin page</p>
            <a href="../login.php" class="btn">login</a>
            <a href="../resgister.php" class="btn">register</a>
            <a href="../logout.php" class="btn">logout</a>
        </div>

    </div>
</body>

</html>