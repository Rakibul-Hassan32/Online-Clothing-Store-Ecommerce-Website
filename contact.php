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
    if(isset($_POST['submit-btn'])){
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $number = mysqli_real_escape_string($conn,$_POST['number']);
      $message = mysqli_real_escape_string($conn,$_POST['message']);

      $select_message=mysqli_query($conn,"SELECT * FROM `massage` WHERE name='$name' AND email='$email' AND number='$number' AND message='$message'") or die('query failed');
      if(mysqli_num_rows($select_message)>0){
        echo 'message alredy send';
      }else{
         mysqli_query($conn,"INSERT INTO `massage` (`user_id`,`name`,`email`,`number`,`message`) VALUES('$user_id','$name','$email','$number','$message')") or die('query failed');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>contact page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="banner">
      <div class="banner">
        <div class="detail">
                <h1>contact</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, perspiciatis.</p>
                <a href="index.php">home</a><span>/ contact</span>
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
<div class="line4"></div>

<!-- contact -->
<div class="form-container">
     <h1 class="title">leave a message</h1>
     <form method="post">
        <div class="input-field">
           <label>your name</label><br>
           <input type="text" name="name">
        </div>
        <div class="input-field">
           <label>your email</label><br>
           <input type="email" name="email">
        </div>
        <div class="input-field">
           <label>number</label><br>
           <input type="number" name="number">
        </div>
        <div class="input-field">
           <label>your message</label><br>
           <textarea name="message"></textarea>
        </div>
        <button type="submit" name="submit-btn">send message</button>
     </form>
</div>
<div class="line"></div>
<div class="line2"></div>
<div class="address">
    <h1 class="title">our contact</h1>
    <div class="row">
       <div class="box">
          <i class="bi bi-map-fill"></i>
          <div>
            <h4>address</h4>
            <p>Lorem ipsum dolor, sit amet <br>consectetur adipisicing elit</p>
          </div> 
       </div>
       <div class="box">
          <i class="bi bi-telephone-fill"></i>
          <div>
            <h4>phone number</h4>
            <p>0198765432</p>
          </div> 
       </div>
       <div class="box">
          <i class="bi bi-envelope-fill"></i>
          <div>
            <h4>email</h4>
            <p>tizamdimitri@gmail.com</p>
          </div> 
       </div>
    </div>
</div>
<div class="line3"></div>
<!-- footer -->
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>