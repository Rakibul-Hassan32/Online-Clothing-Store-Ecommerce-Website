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
    if(isset($_POST['order-btn'])){
        $name = mysqli_real_escape_string($conn,$_POST['name']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $number = mysqli_real_escape_string($conn,$_POST['number']);
        $method = mysqli_real_escape_string($conn,$_POST['method']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $placed_on= date('d-M-Y');
        $cart_total=0;
        $cart_product[]='';
        $cart_query=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_query)>0){
            while($cart_item=mysqli_fetch_assoc($cart_query)){
                $cart_product[]=$cart_item['name'].' ('.$cart_item['quantity'].')';
                $sub_total=($cart_item['price'] * $cart_item['quantity']);
                $cart_total+=$sub_total;
            }
        }
        $total_products=implode(', ',$cart_product);
        mysqli_query($conn,"INSERT INTO `order` (`user_id`,`name`,`number`,`email`,`method`,`address`,`total_products`,`total_price`,`placed_on`) VALUES('$user_id','$name','$number','$email','$method','$address','$total_products','$cart_total','$placed_on')") or die('query failed');
        mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'") or die('query failed');
        header('location:checkout.php');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>checkout page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="banner">
      <div class="banner">
        <div class="detail">
                <h1>checkout</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, perspiciatis.</p>
                <a href="index.php">home</a><span>/</span><a href="cart.php">cart</a><span>/ checkout</span>
            </div> 
</div>

<div class="line"></div>
<div class="checkout-form">
    <h1 class="title">payment process</h1>
     <div class="display-order">
     <div class="box-container1">
        <?php
        $select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed'); 
        $total=0;
        $grand_total=0;
        if(mysqli_num_rows($select_cart)>0){
            while($fetch_products=mysqli_fetch_assoc($select_cart)){
                $total_price=($fetch_products['price']*$fetch_products['quantity']);
                $grand_total=$total+=$total_price;
        ?>
       
            <div class="box1">
            <img src="image/<?php echo $fetch_products['image']; ?>">
            <span><?= $fetch_products['name']; ?>(<?= $fetch_products['quantity']; ?>)</span>
            </div>
        
        <?php
           }
          }
         ?>
         </div>
         <span class="grand-total">Total Amount Payable : <?= $grand_total; ?>Tk</span>
         
        </div>
     <form method="post">
        <div class="input-field">
            <label>your name</label>
            <input type="text" name="name" placeholder="enter your name...">
        </div>
        <div class="input-field">
            <label>your number</label>
            <input type="number" name="number" placeholder="enter your mobile number...">
        </div>
        <div class="input-field">
            <label>your email</label>
            <input type="email" name="email" placeholder="enter your email address...">
        </div>
        <div class="input-field">
            <label>select payment method</label>
            <select name="method">
                <option selected disabled>select payment method</option>
                <option value="cash on delivery">cash on delivery</option>
                <option value="credit card">credit card</option>
                <option value="bkash">bkash</option>
                <option value="nagad">nagad</option>
            </select>
        </div>
        <div class="input-field">
            <label>address</label>
            <textarea name="address" placeholder="enter your address..."></textarea>
        </div>
        <input type="submit" value="order now" name="order-btn" class="btn">
     </form>
</div>

<div class="line"></div>
<!-- footer -->
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>