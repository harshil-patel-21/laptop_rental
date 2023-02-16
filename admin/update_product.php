<?php

include 'config.php';

$user_id = $_GET['edit'];

if (isset($_POST['update'])) {

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_price = mysqli_real_escape_string($conn, $_POST['update_price']);
   $update_detail = mysqli_real_escape_string($conn, $_POST['update_detail']);

   if(empty($update_name) || empty($update_price)){
      $message[] = 'username or email field is empty';
   }
   else{
      mysqli_query($conn, "UPDATE `tblproduct` SET product_name = '$update_name', product_detail='$update_detail', priceperday = '$update_price' WHERE id = '$user_id'");
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/' . $update_image;

   if (!empty($update_image)) {
      if ($update_image_size > 2000000) {
         $message[] = 'image is too large';
      } else {
         $image_update_query = mysqli_query($conn, "UPDATE `tblproduct` SET product_image = '$update_image' WHERE id = '$user_id'");
         if ($image_update_query) {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

   mysqli_query($conn, "UPDATE `tblproduct` SET product_detail = '$update_detail' WHERE id = '$user_id'");


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update detail</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>

<body>

   <div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `tblproduct` WHERE id = '$user_id'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

      <form action="" method="post" enctype="multipart/form-data">
         <h1>UPDATE PRODUCT DETAIL</h1>
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <div class="flex">
            <div class="inputBox">
               <span>product name</span>
               <input type="text" name="update_name" value="<?php echo $fetch['product_name'];?>" placeholder="product name" class="box">
               <span>price per day</span>
               <input type="number" name="update_price" value="<?php echo $fetch['priceperday'];?>"  placeholder="price per day" class="box">
               <input type="file" name="update_image" class="box">
            </div>
            <textarea name="update_detail" id="" cols="66" rows="8" class="box" placeholder="enter product detail" value="ddddddddddddddddd"><?php echo $fetch['product_detail'];?></textarea>
         </div>
         <input type="submit" value="update" name="update" class="btn">
         <a href="register_product.php" class="delete-btn">go back</a>
      </form>


   </div>

</body>

</html>