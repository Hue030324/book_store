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

<!-- arrivals section starts -->

<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>new arrivals</span></h1>

    <div class="box-container">
        <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>

        <form action="" method="post" class="box">
            <img class="image" src="img/<?php echo $fetch_products['image']; ?>" alt="">
            <div class="name"><?php echo $fetch_products['name']; ?></div>
            <div class="price">$<?php echo $fetch_products['price']; ?></div>
            <div class="price_2">$<?php echo $fetch_products['original_price']; ?></div>
            <input type="number" min="1" name="product_quantity" value="1" class="qty">
            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
            <input type="hidden" name="product_ori_price" value="<?php echo $fetch_products['original_price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
            <button type="submit" value="wishlist" name="add_to_wish" class="delete-btn"><i
                    class="fas fa-heart"></i></button>
            <button type="submit" name="add_to_cart" class="btn"><i class="fas fa-shopping-cart"></i>add to
                cart</button>
        </form>

        <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>

    </div>


    <!-- <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book1.png" alt="">
                </div>
                <div class="content">
                    <h3>the pragmatic programmer</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book2.png" alt="">
                </div>
                <div class="content">
                    <h3>morden software engineering</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book3.png" alt="">
                </div>
                <div class="content">
                    <h3>cuộc chiến công nghệ số</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book4.png" alt="">
                </div>
                <div class="content">
                    <h3>life 3.0</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book5.png" alt="">
                </div>
                <div class="content">
                    <h3>phát minh cuối cùng</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/Book6.png" alt="">
                </div>
                <div class="content">
                    <h3>kỷ nguyên trí tuyện nhân tạo</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book7.png" alt="">
                </div>
                <div class="content">
                    <h3>think java</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book8.png" alt="">
                </div>
                <div class="content">
                    <h3>phân tích dữ liệu với R</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book9.png" alt="">
                </div>
                <div class="content">
                    <h3>các siêu cường AI Trung Quốc..</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="?act=product" class="swiper-slide box">
                <div class="image">
                    <img src="img/book10.png" alt="">
                </div>
                <div class="content">
                    <h3>the c++ standard library</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

        </div>

        <div class="swiper arrivals-slider">

            <div class="swiper-wrapper">

                <a href="?act=product" class="swiper-slide box">
                    <div class="image">
                        <img src="img/book11.png" alt="">
                    </div>
                    <div class="content">
                        <h3>kỹ thuật lập trình C</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="?act=product" class="swiper-slide box">
                    <div class="image">
                        <img src="img/book12.png" alt="">
                    </div>
                    <div class="content">
                        <h3>effective java</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="?act=product" class="swiper-slide box">
                    <div class="image">
                        <img src="img/book13.png" alt="">
                    </div>
                    <div class="content">
                        <h3>think python</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="?act=product" class="swiper-slide box">
                    <div class="image">
                        <img src="img/book14.png" alt="">
                    </div>
                    <div class="content">
                        <h3>python machine learning</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

                <a href="?act=product" class="swiper-slide box">
                    <div class="image">
                        <img src="img/Code2.png" alt="">
                    </div>
                    <div class="content">
                        <h3>code complete 2</h3>
                        <div class="price">$15.99 <span>$20.99</span></div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>
    </div> -->


</section>