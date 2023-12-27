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
    <title>about info page</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="banner">
      <div class="banner">
        <div class="detail">
                <h1>about us</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, perspiciatis.</p>
                <a href="index.php">home</a><span>/ about us</span>
            </div> 
</div>

<div class="line"></div>
<!-- about us -->
<div class="line2"></div>
<div class="about-us">
    <div class="row">
        <div class="box">
            <div class="title">
                 <span>ABOUT OUR ONLINE STORE</span>
                 <h1>Hello, With 25 years of experience</h1>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat at, ex iusto labore qui quidem ad facilis non deserunt? Autem quod corporis, veniam laudantium debitis nihil eius possimus modi iste fuga excepturi veritatis, accusantium dignissimos dolorum ratione doloribus nesciunt voluptatibus nemo adipisci aliquam. Possimus fugit velit libero est eius dolor.</p>
        </div>
        <div class="img-box">
             <img src="img/experience.png">
        </div>
    </div>
</div>
<div class="line3"></div>
<!-- feature -->
<div class="line4"></div>
<div class="features">
    <div class="title">
        <h1>Complete Customer Ideas</h1>
        <span>best features</span>
    </div>
    <div class="row">
        <div class="box">
            <img src="img/2.png">
            <h4>24 X 7</h4>
            <p>Online Support 24/7</p>
        </div>
        <div class="box">
            <img src="img/cashback.png">
            <h4>Money Back Guarantee</h4>
            <p>100% Secure Payment</p>
        </div>
        <div class="box">
            <img src="img/gift.png">
            <h4>Special Gift Card</h4>
            <p>Give The Perfect Gift</p>
        </div>
        <div class="box">
            <img src="img/0.png">
            <h4>All Over Bangladesh Shipping</h4>
            <p>Super Fast Delivary</p>
        </div>
    </div>
</div>
<div class="line"></div>
<!-- team section -->
<div class="line2"></div>
<div class="team">
    <div class="title">
        <h1>Our Workable Team</h1>
        <span>best team</span>
    </div>
    <div class="row">
        <div class="box">
            <div class="img-box">
                <img src="img/employee1.png">
                </div>
            <div class="detail1">
                <span>Finance Manager</span>
                <h4>Fardin Ahmed</h4>
                <div class="icons">
               <i class="bi bi-instagram"></i>
               <i class="bi bi-twitter"></i>
               <i class="bi bi-envelope"></i>
               <i class="bi bi-behance"></i>
               <i class="bi bi-whatsapp"></i>
               </div>
               
        </div>
        </div>
       <div class="box">
            <div class="img-box">
            <img src="img/employee2.png">
            </div>
            <div class="detail1">
                <span>Quality Controller</span>
                <h4>Sharmin Sara</h4>
                <div class="icons">
               <i class="bi bi-instagram"></i>
               <i class="bi bi-twitter"></i>
               <i class="bi bi-envelope"></i>
               <i class="bi bi-behance"></i>
               <i class="bi bi-whatsapp"></i>
               </div>
               
        </div>
        </div>
        <div class="box">
            <div class="img-box">
            <img src="img/employee3.png">
            </div>
            <div class="detail1">
                <span>Market Analyst</span>
                <h4>Lutfur Rahman</h4>
                <div class="icons">
               <i class="bi bi-instagram"></i>
               <i class="bi bi-twitter"></i>
               <i class="bi bi-envelope"></i>
               <i class="bi bi-behance"></i>
               <i class="bi bi-whatsapp"></i>
               </div>
               
            </div>
        </div>
        <div class="box">
            <div class="img-box">
            <img src="img/employee4.png">
            </div>
            <div class="detail1">
                <span>Fashion Designer</span>
                <h4>Laura Dutta</h4>
                <div class="icons">
               <i class="bi bi-instagram"></i>
               <i class="bi bi-twitter"></i>
               <i class="bi bi-envelope"></i>
               <i class="bi bi-behance"></i>
               <i class="bi bi-whatsapp"></i>
               </div>
            
            </div>
        </div>  
    </div>
</div>
<div class="line3"></div>
<div class="line4"></div>
<!-- project -->
<div class="project">
    <div class="title">
        <h1>Our Best Project</h1>
        <span>how it works</span>
    </div>
    <div class="row">
         <div class="box">
             <img src="img/team.png">
         </div>
         <div class="box">
             <img src="img/team.png">
         </div>
    </div>
</div>

<div class="line"></div>
<div class="line2"></div>
<!-- ideas -->
<div class="ideas">
<div class="title">
        <h1>We And Our Client Are Happy To Cooperate With Our Company</h1>
        <span>our features</span>
    </div>
    <div class="row">
    <div class="box">
             <i class="bi bi-stack"></i>
             <!-- <div class="detail"> -->
                 <h2>What We Really Do</h2>
                 <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere quibusdam quam dolores deserunt odio est, ipsum aperiam repellendus tempore neque?</p>
             <!-- </div> -->
         </div>
         <div class="box">
             <i class="bi bi-grid-1x2-fill"></i>
             <!-- <div class="detail"> -->
                 <h2>History of Beginning</h2>
                 <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere quibusdam quam dolores deserunt odio est, ipsum aperiam repellendus tempore neque?</p>
             <!-- </div> -->
         </div>
         <div class="box">
             <i class="bi bi-tropical-storm"></i>
             <!-- <div class="detail"> -->
                 <h2>Our Vision</h2>
                 <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facere quibusdam quam dolores deserunt odio est, ipsum aperiam repellendus tempore neque?</p>
             <!-- </div> -->
         </div>
    </div>
</div>
<div class="line3"></div>
<!-- footer -->
<?php include 'footer.php'; ?>
<script src="script.js"></script>
</body>
</html>