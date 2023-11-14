<?php

include("connect.php");

// session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){

      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:./admin/admin_home.php');


      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:?act=home');

      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}
 
?>

<section>
    <div class="form-container">
        <form action="" class="login active" method="post">
            <h3>sign in</h3>

            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<span class="error-msg">'.$message.'</span>';
                };
            };
            ?>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" name="email" id="email" required placeholder="Email address">
                    <i class='bx bx-envelope'></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="pass" required pattern=".{8,}" id="password"
                        placeholder="Your password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span>At least 8 characters</span>
            </div>

            <input type="submit" class="btn" name="submit" value="sign in">

            <div class="signUp-link">
                <a href="#">Forgot password?</a>
                <p>I don't have an account. <a href="?act=res">sign up now</a></p>
            </div>

            <div class="social-flatform">
                <p>Or sign in with</p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-google"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>
            </div>
        </form>
        <!-------------------- signin form --------------------->


    </div>
</section>