<header class="header">
    <div class="header-1">
        <a href="#" class="logo"><img src="img/logo.png" alt=""></a>

        <form action="" class="search-form">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="icons">
            <div id="search-btn" class="fas fa-search"></div>
            <a href="#" class="fa fa-heart"></a>
            <div id="cart" class="fa fa-shopping-cart"></div>
            <div id="login-btn" class="fas fa-user"></div>



        </div>
    </div>

    <div class="header-2">
        <nav class="navbar">
            <a href="?act=home">home</a>
            <a href="?act=shop">shop</a>
            <a href="?act=about">about</a>
            <a href="?act=contact">contact</a>
            <a href="?act=order">orders</a>
        </nav>
    </div>
</header>


<!--------------------- header section ends ----------------------->

<!--------------------- bottom navbar ----------------->

<nav class="bottom-navbar">
    <a href="?act=home" class="fas fa-home"></a>
    <a href="?act=shop" class="fas fa-list"></a>
    <a href="?act=about" class="fas fa-comments"></a>
    <a href="?act=contact" class="fas fa-address-book"></a>
    <a href="?act=order" class="fas fa-money-check-dollar"></a>
</nav>
<!--------------------- bottom navbar ----------------->


<!--------------------- login form -------------------->
<div class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <!-------------------- signin form --------------------->

    <div class="container">
        <form action="login.php" class="login active">
            <h3>sign in</h3>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" id="email" placeholder="Email address">
                    <i class='bx bx-envelope'></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" pattern=".{8,}" id="password" placeholder="Your password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span>At least 8 characters</span>
            </div>

            <div class="remember">
                <input type="checkbox" name="" id="">
                <label> Remember me</label>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="signUp-link">
                <a href="#">Forgot password?</a>
                <p>I don't have an account. <a href="?act=res" onclick="switchForm('register', event)">sign up</a></p>
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


        <!------------------ sign up form ----------------->

        <form action="resgister.php" class="register">
            <h3>sign up</h3>

            <div class="form-group">
                <label for="username">username</label>
                <div class="input-group">
                    <input type="text" id="username" placeholder="Username">
                    <i class='bx bx-user'></i>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <input type="email" id="email" placeholder="Email address">
                    <i class='bx bx-envelope'></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" pattern=".{8,}" id="password" placeholder="Your password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span>At least 8 characters</span>
            </div>

            <div class="form-group">
                <label for="confirm-pass">Confirm password</label>
                <div class="input-group">
                    <input type="password" id="confirm-pass" placeholder="Enter password again">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <span> Confirm password must be same with password</span>
            </div>

            <div class="remember">
                <input type="checkbox" name="" id="">
                <label>I agree to the terms & conditions</label>
            </div>

            <button type="submit" class="btn">sign up</button>

            <div class="signUp-link">
                <p>I already have an account. <a href="?act=login" onclick="switchForm('login', event)">Sign In</a></p>
            </div>

        </form>
        <!------------------ sign up form ----------------->

    </div>

</div>
<!------------------- login form end ------------------------------>