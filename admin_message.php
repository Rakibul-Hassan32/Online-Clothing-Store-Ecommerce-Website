<?php
    include 'connection.php';
    session_start();
    $admin_id=$_SESSION['admin_name'];

    if(!isset($admin_id)){
       header('location:login.php');
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }
    
    //deleting messages from database
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete']; 
        mysqli_query($conn,"DELETE FROM `massage` WHERE id='$delete_id'") or die('query failed');
        header('location:admin_message.php');
    }
?>
<style type="text/css">
   <?php
      include 'style.css';
    ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- box icon link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>admin pannel</title>
</head>
<body>
    <?php 
    include 'admin_header.php';
    ?>

     <div class="line4"></div>
    <section class="message-container">
      <h1 class="title">unread message</h1>
      <div class="box-container">
         <?php 
            $select_massage = mysqli_query($conn,"SELECT * FROM `massage`") or die('query failed');
            if(mysqli_num_rows($select_massage)>0){
                while($fetch_message=mysqli_fetch_assoc($select_massage)){
          ?>
          <div class="box">
              <p>user id: <span><?php echo $fetch_message['id']; ?></span></p>
              <p>name: <span><?php echo $fetch_message['name']; ?></span></p>
              <p>email: <span><?php echo $fetch_message['email']; ?></span></p>
              <p><?php echo $fetch_message['message']; ?></p>
              <a href="admin_message.php?delete=<?php echo $fetch_message['id']; ?>" onclick="return confirm('delete this message');" class="delete">delete</a>
          </div>
          <?php    
                }
            } else{
                echo '
                  <div class="empty">
                  <p>no messages added yet!</p>
                  </div>
                  ';
            }
            ?>
      </div>
    </section>
    <div class="line"></div>
    <script src="script.js"></script>
</body>
</html>