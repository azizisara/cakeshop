<?php  require_once 'inc/config.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" >
<title>Sweet Shop | سفارش شیرینی آنلاین</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="header">
        <div class="item2" style="justify-content:flex-end"><img src="images/logo2.png" alt="" width="150px;"></div>
        <div class="item1">
            <form action="index.php" method="get">
                <div class="search-box">
                <button name="search-btn" class="btn-search"><i class="fas fa-search"><img src="images/search.png" alt="" width="25px;"></i></button>
                <input type="text" name="search" class="input-search" placeholder="جست و جو...">

            </div></form></div>
        <div class="item3" style=""><img src="images/shopping-cart.png" alt="" width="35px;"></div>
        <div class="item4"><img src="images/user.png" alt="" width="35px;"></div>
    </div>
       </header>
	
	<nav>

		<?php

                $query = mysqli_query($connection , "SELECT * FROM category");
                while ($row = mysqli_fetch_array($query)):
                ?>
		<a href="index.php?cat=<?php echo $row['id'];?>"><?php echo $row['cat_name'];  ?></a>
                <?php endwhile; ?>
        <div class="animation start-cake"></div>
	</nav>
	<br>


    <div class="slides">

        <div class="item1">
            <div class="slideshow-container">

                <div class="mySlides fade" align="center">
                    <div class="numbertext">1 / 3</div>
                    <a href="#">
                        <img src="images/img1.png" alt="" style="width:80%">
                    </a>
                </div>

                <div class="mySlides fade" align="center">
                    <div class="numbertext">2 / 3</div>
                    <a href="#">
                        <img src="images/img2.png" alt="" style="width:80%">
                    </a>
                </div>

                <div class="mySlides fade" align="center">
                    <div class="numbertext">3 / 3</div>
                    <a href="#">
                        <img src="images/img3.png" alt="" style="width:80%">
                    </a>
                </div>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                    let i;
                    let slides = document.getElementsByClassName("mySlides");
                    let dots = document.getElementsByClassName("dot");
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > slides.length) {slideIndex = 1}
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";
                    dots[slideIndex-1].className += " active";
                    setTimeout(showSlides, 4000); // Change image every 2 seconds
                }
            </script>



        </div>
        <div class="item2"><img src="images/slide1.png" alt="" width="350px;"><br>
            <img src="images/slide1.png" alt="" width="350px;"></div>

    </div>
<section class="cards" id="cards">
	   <h1 class="heading">  محصولات محبوب ما</h1>
	<div class="card-container">

        <?php
           if(isset($_GET['search-btn'])){
             $search = $_GET['search'];
             $query = mysqli_query($connection, "SELECT * FROM products WHERE title LIKE '%$search%' OR description LIKE '%$search%' OR price LIKE '%$search%'");

           }elseif(isset($_GET['cat'])){
               $cat = $_GET['cat'];
               $query = mysqli_query($connection, "SELECT * FROM products WHERE cat_id = '$cat'");
           }else{
           $query = mysqli_query($connection, "SELECT * FROM products");
           }
           while ($row = mysqli_fetch_array($query)):

?>
           <div class="card">
              <img src="uploads/<?php echo $row['image']; ?>" alt="pic" style="width:100%">
              <h1><?php echo $row['title']; ?></h1>
              <p class="price"><?php echo $row['price']; ?></p>
              <p><?php echo $row['description']; ?></p>
               <a href="single.php?id=<?php echo $row['id'];  ?>">
              <p><button>خرید</button></p></a>
           </div>
		 <?php  endwhile; ?>
	</div>
</section>
	<br>
	  <footer>
   <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script>, Sara Azizi</p>
    </footer>
	
	<script src="js/script.js"></script>
</body>
</html>
