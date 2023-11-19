<?php

include 'connect.php';

// session_start();

// $user_id = $_SESSION['user_id'];

// if(!isset($user_id)){
//    header('location:?act=home');
// }

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_ori_price = $_POST['product_ori_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>Giảm tới 70% </h3>
            <p>PageGarden - nơi cung cấp cho bạn những tài liệu bổ ích nhất để giúp bạn nâng cao kiến thức,
                kĩ năng và trở thành một chuyên gia trong lĩnh vực Công nghệ thông tin.</p>
            <a href="?act=shop" class="btn">shop now</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="" class="swiper-slide"><img src="img/book8.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book4.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/Book6.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book8.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book3.png" alt=""></a>
                <a href="" class="swiper-slide"><img src="img/book11.png" alt=""></a>
            </div>
            <img src="img/stand.png" class="stand" alt="">
        </div>

    </div>

</section>

<!------------------ home section end ---------------------->



<!-------------------- icons section starts ------------------->

<section class="icons-container">

    <div class="icons">
        <i class="fas fa-plane"></i>
        <div class="content">
            <h3>free shipping</h3>
            <p>order over $100</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>secure payment</h3>
            <p>100% secure payment</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>easy returns</h3>
            <p>10 days returns</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>call us anytime</p>
        </div>
    </div>

</section>

<!------------------- icons section ends --------------------------->


<!------------------- featured section starts ---------------------->

<section class="featured" id="featured">

    <h1 class="heading"> <span>latest books</span> </h1>

    <div class="containers">

        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
        ?>

        <form action="" method="post" class="box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="img/<?php echo $fetch_products['image']; ?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $fetch_products['name']; ?></h3>
                <div class="price">
                    $<?php echo $fetch_products['price']; ?>
                    <span>$<?php echo $fetch_products['original_price']; ?></span>
                    <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to
                        cart</button>
                </div>
            </div>

            <!-- <input type="number" min="1" name="product_quantity" value="1" class="qty"> -->
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_ori_price" value="<?php echo $fetch_products['original_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
        </form>

        <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    </div>

    <div class="load-more" style="margin-top: 2rem; text-align:center">
        <a href="?act=shop" class="optn-btn">load more</a>
    </div>


</section>


<!-- <section class=" featured" id="featured">

            <h1 class="heading"> <span>featured books</span> </h1>

            <div class="swiper featured-slider">

                <div class="swiper-wrapper">

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book2.png" alt="">
                        </div>
                        <div class="content">
                            <h3>morden software engineering</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book4.png" alt="">
                        </div>
                        <div class="content">
                            <h3>life 3.0</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book5.png" alt="">
                        </div>
                        <div class="content">
                            <h3>phát minh cuối cùng</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book1.png" alt="">
                        </div>
                        <div class="content">
                            <h3>the pragmatic programmer</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book7.png" alt="">
                        </div>
                        <div class="content">
                            <h3>think java</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/Book6.png" alt="">
                        </div>
                        <div class="content">
                            <h3>kỷ nguyên trí tuyện nhân tạo</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book9.png" alt="">
                        </div>
                        <div class="content">
                            <h3>các siêu cường AI..</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book10.png" alt="">
                        </div>
                        <div class="content">
                            <h3>the c++ standard library</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/book12.png" alt="">
                        </div>
                        <div class="content">
                            <h3>effective java</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                    <div class="swiper-slide box">
                        <div class="icons">
                            <a href="#" class="fas fa-search"></a>
                            <a href="#" class="fas fa-heart"></a>
                            <a href="#" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img src="img/thecleancoder.png" alt="">
                        </div>
                        <div class="content">
                            <h3>the clean coder</h3>
                            <div class="price">$22.99 <span>$30.99</span></div>
                            <a href="?act=add_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to cart</a>
                        </div>
                    </div>

                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>

</section> -->

<!------------------- featured section end ---------------------->

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="img/about.jpg" alt="">
        </div>

        <div class="content">
            <h3>about us</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit quos enim minima ipsa dicta officia
                corporis ratione saepe sed adipisci?</p>
            <a href="?act=about" class="optn-btn">read more</a>
        </div>

    </div>

</section>

<!------------ newsletter section starts ----------------->

<section class="newsletter">

    <div class="content">
        <h3>have any questions?</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque cumque exercitationem repellendus, amet
            ullam voluptatibus?</p>
        <a href="?act=contact" class="optn-btn">contact us</a>
    </div>

</section>

<!------------- newsletter section ends ------------------>