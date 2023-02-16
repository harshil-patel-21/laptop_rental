<?php
include 'config.php';


$pid = $_GET['detail'];


$select = mysqli_query($conn, "SELECT * FROM `tblproduct` WHERE id = '$pid'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
   $fetch = mysqli_fetch_assoc($select);
}

if(isset($_POST['book'])){

    $product_name =  $fetch['product_name'];
    $priceperday = $fetch['priceperday'];
    $product_detail = $fetch['product_detail'];
    $product_image = $fetch['product_image'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];
    $status = 0;
    $uid = $fetch['id'];
 
    if(empty($from_date) || empty($to_date)){
       $message[] = 'please enter date';
    }else{
       $insert = "INSERT INTO tblbooking(pid, uid, product_name, product_detail, priceperday, product_image, from_date, to_date, status) VALUES('$pid', '$uid', '$product_name', '$product_detail', '$priceperday', '$product_image', '$from_date', '$to_date', '$status')";
       $upload = mysqli_query($conn,$insert);
       if($upload){
          $message[] = 'book successfully';
       }else{
          $message[] = 'could not book';
       }
    }
 
 };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Image Change</title>
    <link rel = "stylesheet" href = "css/productdetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <?php
      $select = mysqli_query($conn, "SELECT * FROM `tblproduct` WHERE id = '$pid'") or die('query failed');
      if (mysqli_num_rows($select) > 0) {
         $fetch = mysqli_fetch_assoc($select);
      }
      ?>

    <div class = "main-wrapper">
        <div class = "container">
        <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class = "add-cart-btn" id="bookbtn">' . $message . '</div>';
            }
         }
         ?>
            <div class = "product-div">
                <div class = "product-div-left">
                    <div class = "img-container">
                        <img src = "admin/uploaded_img/<?php echo $fetch['product_image'];?>" alt = "product" >
                    </div>
                    <!-- <div class = "hover-container">
                        <div><img src = "images/w1.png"></div>
                        <div><img src = "images/w2.png"></div>
                        <div><img src = "images/w3.png"></div>
                        <div><img src = "images/w4.png"></div>
                        <div><img src = "images/w5.png"></div>
                    </div> -->
                </div>
                <div class = "product-div-right">
                    <span class = "product-name"><?php echo $fetch['product_name'];?></span>
                    <span class = "product-price"><?php echo $fetch['priceperday'];?>Rs/day</span>
                    <!-- <div class = "product-rating">
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star"></i></span>
                        <span><i class = "fas fa-star-half-alt"></i></span>
                        <span>(350 ratings)</span>
                    </div> -->
                    <p class = "product-description"><?php echo $fetch['product_detail'];?></p>
                    <!-- <div class = "btn-groups">
                        <button type = "button" class = "add-cart-btn"><i class = "fas fa-shopping-cart"></i>add to cart</button>
                        <button type = "button" class = "buy-now-btn"><i class = "fas fa-wallet"></i>buy now</button>
                    </div> -->
                    <form action="" method="post" id="book" enctype="multipart/form-data">
                        <input type="date" name="from date" id="from_date">
                        <input type="date" name="to date" id="to_date">
                        <i class = "fas fa-shopping-cart"></i><input type="submit" value="book" class = "add-cart-btn" id="bookbtn" name="book">
                        <!-- <button type = "button" class = "add-cart-btn" id="bookbtn" name="book"><i class = "fas fa-shopping-cart"></i>book</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src = "js/productdetail.js"></script>
</body>
</html>