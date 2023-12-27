<?php
    include 'connection.php';
    session_start();
    $user_id=$_SESSION['user_id'];

    if(!isset($user_id)){
       header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
    // adding product to wishlist
    if(isset($_POST['add_to_wishlist'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price= $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $wishlist_number = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');

        $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($wishlist_number)>0){
            $message7[]='product already exist in wishlist';
        }else if(mysqli_num_rows($cart_num)>0){
            $message7[]='product already exist in cart';
        }else{
            mysqli_query($conn,"INSERT INTO `wishlist` (`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image')") or die('query failed');
            $message7[]='product successfuly added in your wishlist';
        }
    }
    // adding product to cart
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price= $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_num)>0){
            $message7[]='product already exist in cart';
        }else{
            mysqli_query($conn,"INSERT INTO `cart` (`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')") or die('query failed');
            $message7[]='product successfuly added in your cart';
        }
    }

?>
<style type="text/css">
   <?php
      include 'main.css';
    ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- slick slider link -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick.css">
    <title>index page</title>
</head>
<body>
<?php include 'header.php'; ?>
<!-- home -->
<div class="banner">
        <div class="detail">
        <span>Test Our Products</span>
                <h1>Premium Quality <br>Clothes</h1>
                <!-- <p>Enjoy our products now!!! made by the hardworking and best <br> designer's of Bangladesh!</p> -->
                <!-- <a href="shop.php" class="btn">shop now</a>-->
            </div> 
</div>

<div class="line"></div>

<!-- services -->
<div class="services">
   <div class="row">
        <div class="box">
             <img src="img/0.png">
             <div>
                <h1>Free Shipping Fast</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="box">
             <img src="img/1.png">
             <div>
                <h1>Money Back & Guarantee</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="box">
             <img src="img/2.png">
             <div>
                <h1>Online Support 24/7</h1>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
   </div>
</div>
<div class="line2"></div>

<!-- story -->
<div class="story">
     <div class="row">
         <div class="box">
              <span>our story</span>
              <h1>Production of this brand since 1981</h1>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi beatae saepe quos culpa voluptate non qui itaque repellat maiores, mollitia quo quasi similique voluptatibus repudiandae temporibus! Delectus eum eaque quia molestiae cumque distinctio debitis, accusantium unde suscipit ratione a eius perspiciatis eos voluptates beatae, quod ex? Modi, quia omnis, autem mollitia maxime id expedita ducimus excepturi ad doloremque pariatur sed aut labore et. Ad, itaque culpa dolorem non incidunt deserunt rem officiis nisi facilis alias quis illo cumque quasi cum.</p>
              <a href="shop.php" class="btn">shop now</a>
         </div>
     </div>
</div>
<div class="line3"></div>

<!-- discover -->
<div class="line2"></div>
<div class="discover">
     <div class="detail">
         <h1 class="title">Best Designed Clothes Makes You Feel Confident</h1>
         <span>Buy Now And Save 20% Off!</span>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus natus, quos sed vitae odio, rerum possimus quas aspernatur, vero modi alias repellendus repellat deleniti quod. Totam provident, culpa eius qui quidem adipisci corrupti magni? Illum rem voluptate eos! Facere cumque voluptatum suscipit reiciendis libero ullam, quo tempore qui quasi nesciunt.</p>
         <a href="shop.php" class="btn">discover now</a> 
     </div>
     <div class="img-box">
         <img src="img/128.png">
     </div>
</div>
<div class="line2"></div>

<!-- homeshop -->
<?php include 'homeshop.php'; ?> 
<div class="line2"></div>

<!-- newslatter -->
<div class="newslatter">
    <h1 class="title">Join Our Newslatter Today!</h1>
    <p>Get 15% off on your next order. Be the first to learn about promotions special events, new arrivals and more.</p>
    <input type="email" placeholder="your email address...">
    <button>subscribe now</button>
</div>
<div class="line3"></div>

<!-- footer -->
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script><?php include 'script.js'; ?></script>
</body>
</html>