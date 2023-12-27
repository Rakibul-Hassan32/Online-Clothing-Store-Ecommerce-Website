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
    
    // adding product to cart
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price= $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;

        $cart_num = mysqli_query($conn,"SELECT * FROM `cart` WHERE name='$product_name' AND user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($cart_num)>0){
            $message14[]='product already exist in cart';
        }else{
            mysqli_query($conn,"INSERT INTO `cart` (`user_id`,`pid`,`name`,`price`,`quantity`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_quantity','$product_image')") or die('query failed');
            $message14[]='product successfuly added in your cart';
        }
    }
    //deleting products from wishlist
    if(isset($_GET['delete'])){
        $delete_id= $_GET['delete'];
        
        mysqli_query($conn,"DELETE FROM `wishlist` WHERE id='$delete_id'") or die('query failed');
        header('location:wishlist.php');
    }
    //deleting all products from wishlist
    if(isset($_GET['delete_all'])){
        mysqli_query($conn,"DELETE FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');
        header('location:wishlist.php');
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
    <title>wishlist page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="banner">
      <div class="banner">
        <div class="detail">
                <h1>my wishlist</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, perspiciatis.</p>
                <a href="index.php">home</a><span>/ wishlist</span>
            </div> 
</div>

<div class="line"></div>
<!-- shop -->
<section class="shop">
    <h1 class="title">products added in wishlist</h1>
        <?php
           if(isset($message14)){
             foreach ($message14 as $message14){
              echo '
              <div class="message">
              <span>'.$message14.'</span>
              <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
              </div>
              ';
             }
           }
        ?>
        
        <div class="shop-content">
             <?php
               $grand_total=0;
               $select_wishlist = mysqli_query($conn,"SELECT * FROM `wishlist`") or die('query failed');
               if(mysqli_num_rows($select_wishlist)>0){
                  while($fetch_products=mysqli_fetch_assoc($select_wishlist)){
              ?>
              <form method="post" class="card">
                   <img src="image/<?php echo $fetch_products['image']; ?>">
                   <div class="price"><?php echo $fetch_products['price']; ?> Tk</div>
                   <div class="name"><?php echo $fetch_products['name']; ?></div>
                   <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                   <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                   <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                   <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                   <div class="icon">
                       <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bi bi-eye-fill"></a>
                       <a href="wishlist.php?delete=<?php echo $fetch_products['id']; ?>" class="bi bi-x" onclick="return confirm('do you want to delete this item from your wishlist')"></a>
                       <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                   </div>
              </form>
              <?php
                  $grand_total+=$fetch_products['price'];
                 }
                }else{
                   echo '<p class="empty">no products added yet!</p>';
                }
               ?>
        </div>
        <div class="wishlist_total">
             <p>total amount payable : <span><?php echo $grand_total; ?>Tk /-</span></p>
             <a href="shop.php" class="btn">continue shopping</a>
             <a href="wishlist.php?delete_all" class="btn <?php echo ($grand_total)?'':'disabled' ?>" onclick="return confirm('do you want to delete all items in your wishlist')">delete all</a>
            </div>
</section>
<div class="line"></div>
<!-- footer -->
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>