<?php 
   include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="main.css">
    <title>homeshop page</title>
</head>
<body>
<?php include 'header.php'; ?>
<!-- adding brands -->

<section class="popular-brands">
        <h2>POPULAR BRANDS</h2>
        <?php
           if(isset($message7)){
             foreach ($message7 as $message7){
              echo '
              <div class="message">
              <span>'.$message7.'</span>
              <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
              </div>
              ';
             }
           }
        ?>
        <div class="popular-brands-content">
             <?php
               $select_products = mysqli_query($conn,"SELECT * FROM `products`") or die('query failed');
               if(mysqli_num_rows($select_products)>0){
                  while($fetch_products=mysqli_fetch_assoc($select_products)){
              ?>
              <form method="post" class="card">
                   <img src="image/<?php echo $fetch_products['image']; ?>">
                   <div class="price"><?php echo $fetch_products['price']; ?> Tk</div>
                   <div class="name"><?php echo $fetch_products['name']; ?></div>
                   <input type="hidden" name="product_id" value="<?php echo $fetch_products['id']; ?>">
                   <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                   <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                   <input type="hidden" name="product_quantity" value="1" min="1">
                   <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                   <div class="icon">
                       <a href="view_page.php?pid=<?php echo $fetch_products['id']; ?>" class="bi bi-eye-fill"></a>
                       <button type="submit" name="add_to_wishlist" class="bi bi-heart"></button>
                       <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                   </div>
              </form>
              <?php
                 }
                }else{
                   echo '<p class="empty">no products added yet!</p>';
                }
               ?>
        </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>$('.popular-brands-content').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
}); </script>  
</body>
</html>