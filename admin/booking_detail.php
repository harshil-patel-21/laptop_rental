<?php
include 'config.php';


$bid = $_GET['detail'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking detail</title>
    <link rel = "stylesheet" href = "../css/productdetail.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <?php
      $select = mysqli_query($conn, "SELECT * FROM `tblbooking` WHERE id = '$bid'") or die('query failed');
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
                        <img src = "uploaded_img/<?php echo $fetch['product_image'];?>" alt = "product" >
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
                    <div class = "btn-groups">
                    <button type="button" class="btn btn-success" onclick="confrim">confirm</button>
                    <button type="button" class="btn btn-danger" onclick="cancel">cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    
</script>

</body>
</html>