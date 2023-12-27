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
    
    // updating product quantity in cart
    if(isset($_POST['update_qty_btn'])){
        $update_qty_id=$_POST['update_qty_id'];
        $update_value = $_POST['update_qty'];

        $update_query = mysqli_query($conn,"UPDATE `cart` SET quantity='$update_value' WHERE id='$update_qty_id'") or die('query failed');
        if($update_query){
            header('location:cart.php');
        }
    }
    //deleting products from cart
    if(isset($_GET['delete'])){
        $delete_id= $_GET['delete'];
        mysqli_query($conn,"DELETE FROM `cart` WHERE id='$delete_id'") or die('query failed');
        header('location:cart.php');
    }
    //deleting all products from cart
    if(isset($_GET['delete_all'])){
        mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'") or die('query failed');
        header('location:cart.php');
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
    <title>cart page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="banner">
      <div class="banner">
        <div class="detail">
                <h1>my cart</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, perspiciatis.</p>
                <a href="index.php">home</a><span>/ cart</span>
            </div> 
</div>

<div class="line"></div>
<!-- shop -->
<section class="shop">
    <h1 class="title">products added in cart</h1>
        <div class="shop-content">
             <?php
               $grand_total=0;
               $select_cart = mysqli_query($conn,"SELECT * FROM `cart`") or die('query failed');
               if(mysqli_num_rows($select_cart)>0){
                  while($fetch_products=mysqli_fetch_assoc($select_cart)){
              ?>
              <div class="card">
                    <div class="icon">
                       <a href="view_page.php?pid=<?php echo $fetch_products['pid']; ?>" class="bi bi-eye-fill"></a>
                       <a href="cart.php?delete=<?php echo $fetch_products['id']; ?>" class="bi bi-x" onclick="return confirm('do you want to delete this item from your cart')"></a>
                       <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                   </div>
                   <img src="image/<?php echo $fetch_products['image']; ?>">
                   <div class="price"><?php echo $fetch_products['price']; ?> Tk</div>
                   <div class="name"><?php echo $fetch_products['name']; ?></div>
                   <form method="post">
                     <input type="hidden" name="update_qty_id" value="<?php echo $fetch_products['id']; ?>">
                     <div class="qty">
                        <input type="number" min="1" name="update_qty" value="<?php echo $fetch_products['quantity']; ?>">
                        <input type="submit" name="update_qty_btn" value="update">
                    </div>
                   </form>
                   <div class="total-amt">
                       Total Amount : <span><?php echo $total_amt=($fetch_products['price']*$fetch_products['quantity']); ?></span>
                   </div>
                  </div>
              <?php
                  $grand_total+=$total_amt;
                 }
                }else{
                   echo '<p class="empty">no products added yet!</p>';
                }
               ?>
        </div>
        <div class="dlt">
        <a href="cart.php?delete_all" class="btn2" onclick="return confirm('do you want to delete all items in your cart')">delete all</a>
        </div>
        <div class="wishlist_total">
             <p>total amount payable : <span><?php echo $grand_total; ?>Tk /-</span></p>
             <a href="shop.php" class="btn">continue shopping</a>
             <a href="checkout.php" class="btn <?php echo ($grand_total)?'':'disabled' ?>">proceed to checkout</a>
            </div>
</section>
<div class="line"></div>
<!-- footer -->
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>