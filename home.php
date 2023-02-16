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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Laptop Rental</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
  </head>
  <body>
    <header>
      <a href="" class="logo">
    <?php
         $select = mysqli_query($conn, "SELECT * FROM `tbluser` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      </a>
      <h3><?php echo $fetch['name']; ?></h3>

      <div class="bx bx-menu" id="menu-icon"></div>

      <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php" target="_blank">Product</a></li>
        <li><a href="contactus.php" target="_blank"></a>Contact us</li>
        <li><a href="#">Reviews</a></li>
      </ul>
      <div class="header-btn">
        <a href="booking.php?booking=<?php echo $user_id; ?>" class="sign-in">my booking</a>
        <a href="update_profile.php" class="sign-in">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="sign-in">logout</a>
      </div>
    </header>
    <!-- home -->
    <section class="home" id="home">
      <div class="text">
        <h1>
          <span>Looking</span> to <br />
          rent a laptop
        </h1>
        <p>
          In today’s competitive world, learning skills through a laptop or system has become a basic need for almost every students. But that requirement comes with a cost. A well configured laptop costs a lot for a middle class family. Renting a laptop could be an alternative, but there is no secured platform to allow any user to rent one. To overcome these problems, we propose a web application called Laptop Renting System. The basic idea is to create a web application platform to rent the laptops on demand online which is available 24/7 removing the problem of high cost. This website eases the task of renting a laptop online.
        </p>
      </div>
    </section>

    <!-- Product -->
    <section class="service" id="service">
      <div class="heading">
        <span>best service</span>
        <h1>explore out top deals <br />from top rated dealers</h1>
      </div>

      <div class="services-container">
        <div class="box">
          <div class="box-img">
            <img src="images/laptop1.jpg" alt="" />
          </div>
          <p>2017</p>
          <h3>2017 lenovo laptop</h3>
          <h2>17,999Rs | 200Rs<span>/day</span></h2>
          <a href="#" class="btn">Book now</a>
        </div>
      </div>

      <div class="services-container">
        <div class="box">
          <div class="box-img">
            <img src="images/laptop1.jpg" alt="" />
          </div>
          <p>2017</p>
          <h3>2017 lenovo laptop</h3>
          <h2>17,999Rs | 200Rs<span>/day</span></h2>
          <a href="#" class="btn">Book now</a>
        </div>
      </div>

      <div class="services-container">
        <div class="box">
          <div class="box-img">
            <img src="images/laptop1.jpg" alt="" />
          </div>
          <p>2017</p>
          <h3>2017 lenovo laptop</h3>
          <h2>17,999Rs | 200Rs<span>/day</span></h2>
          <a href="#" class="btn">Book now</a>
        </div>
      </div>
    </section>

    <!-- About -->
    <section class="about" id="about">
      <div class="heading">
        <span>About us</span>
        <h1>Best Customer Experience</h1>
      </div>
      <div class="about-container">
        <div class="about-img">
          <img src="images/aboutus.png" alt="" />
        </div>
        <div class="about-text">
          <span>About us</span>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam
            recusandae delectus quidem nam nisi praesentium temporibus aliquam
            quod alias eos nostrum, suscipit doloribus facilis consequuntur
            expedita vero enim blanditiis ea.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint,
            obcaecati unde ducimus sunt suscipit dicta, eveniet numquam
            consectetur animi rerum, blanditiis cum praesentium voluptas fugit
            repudiandae voluptatum voluptatibus doloribus. Totam.
          </p>
          <a href="contact.html" target="_blank" class="btn">contact us</a>
        </div>
      </div>
    </section>

    <!-- Reviews -->
    <section class="reviews" id="reviews">
      <div class="heading">
        <span>Reviews</span>
        <h1>Customer reviews</h1>
      </div>
      <div class="reviews-container">
        <div class="box">
          <div class="rev-img">
            <img src="images/review1.jpg" alt="" />
          </div>
          <h2>someone name</h2>
          <div class="stars">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star-half"></i>
          </div>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed neque
            ullam dolorem asperiores culpa quis, explicabo voluptate assumenda
            maiores rerum ratione dolor inventore a. Placeat qui totam ratione
            accusamus quia.
          </p>
        </div>

        <div class="box">
          <div class="rev-img">
            <img src="images/review1.jpg" alt="" />
          </div>
          <h2>someone name</h2>
          <div class="stars">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star-half"></i>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. In quia
            nam, dolor nulla suscipit veritatis nostrum veniam natus eveniet
            enim at ullam dolore voluptates debitis eos possimus? Dicta, nulla
            dolorem?
          </p>
        </div>

        <div class="box">
          <div class="rev-img">
            <img src="images/review1.jpg" alt="" />
          </div>
          <h2>someone name</h2>
          <div class="stars">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star-half"></i>
          </div>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Qui dolor,
            veniam autem corrupti nemo enim. Sint reprehenderit tenetur vitae
            minima assumenda, ullam, dolorem laudantium fugiat, minus iste
            obcaecati? Delectus, quod.
          </p>
        </div>
      </div>
    </section>

    <script src="main.js"></script>
  </body>
</html>


</body>
</html>