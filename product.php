<?php
include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product List Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php

$select = mysqli_query($conn, "SELECT * FROM tblproduct");

?>


<div class="container-fluid">
  <h1 class="text-dark bg-primary text-center py-2">Product List</h1>
  <div class="row">

    <?php while($row = mysqli_fetch_assoc($select)){ ?>
    <div class="col-sm-4 my-1">
      <div class="card">
        <img class="card-img-top" src="admin/uploaded_img/<?php echo $row['product_image']; ?>" alt="Product 1 height='100'">
        <div class="card-body">
          <h4 class="card-title"><?php echo $row['product_name']; ?></h4>
          <p class="card-text"><?php echo $row['priceperday']; ?>Rs</p>
          <a href="product_detail.php?detail=<?php echo $row['id']?>" class="btn btn-primary">view detail</a>
        </div>
      </div>
    </div>
    <?php } ?>
    
  </div>

</div>

</body>
</html>
