<?php

include("connect.php");

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cfpass']));
    $user_type = $_POST['user_type'];
 
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
 
    if(mysqli_num_rows($select_users) > 0){
       $message[] = 'user already exist!';
    }else{
       if($pass != $cpass){
          $message[] = 'confirm password not matched!';
       }else{
          mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
          $message[] = 'registered successfully!';
          header('location:?act=login');
       }
    }
 
}
 
?>

<section>
    <div class="form-container">

        <!------------------ sign up form ----------------->

        <form action="" class="register" method="post">
            <h3>sign up</h3>

            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<span class="error-msg">'.$message.'</span>';
                };
            };
            ?>

            <div class="form-group">
                <label for="username">username</label>
                <div class="input-group">
                    <input type="text" id="username" required name="username" placeholder="Username">
                    <i class='bx bx-user'></i>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" id="email" required name="email" placeholder="Email address">
                    <i class='bx bx-envelope'></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" required name="pass" pattern=".{8,}" id="password"
                        placeholder="Your password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span>At least 8 characters</span>
            </div>

            <div class="form-group">
                <label for="confirm-pass">Confirm password</label>
                <div class="input-group">
                    <input type="password" required name="cfpass" id="confirm-pass" placeholder="Enter password again">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span> Confirm password must be same with password</span>
            </div>

            <select name="user_type" class="box">
                <option value="user">user</option>
                <!-- <option value="admin">admin</option> -->
            </select>

            <input type="submit" name="submit" value="sign up" class="btn">

            <div class="signUp-link">
                <p>I already have an account. <a href="?act=login">Sign In now</a></p>
            </div>

        </form>
        <!------------------ sign up form ----------------->

    </div>
</section>