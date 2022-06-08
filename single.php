<?php  require_once 'inc/config.php';
$connection = mysqli_connect('localhost','root','','ecom');
mysqli_query($connection, "SET NAMES utf8");
$id =  $_GET['id'];
$query = mysqli_query($connection , "SELECT * FROM products WHERE id = '$id'");
$row = mysqli_fetch_array($query);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="header">
    <div class="item2" style="justify-content:flex-end"><img src="images/logo2.png" alt="" width="150px;"></div>
    <div class="item1"><div class="search-box">
            <button class="btn-search"><i class="fas fa-search"><img src="images/search.png" alt="" width="25px;"></i></button>
            <input type="text" class="input-search" placeholder="جست و جو...">
        </div></div>
    <div class="item3" style=""><img src="images/shopping-cart.png" alt="" width="35px;"></div>
    <div class="item4"><img src="images/user.png" alt="" width="35px;"></div>
</div>
	<div class="flex-container">
    <div class="item1">
        <img src="uploads/<?php  echo $row['image']; ?>" alt="" width="300px;"></div>


    <div class="item2">
        <a href="index.php?cat=<?php echo $row['cat_id']; ?>" style="text-align: right;">
            <?php
            $cat_id = $row['cat_id'];
            $get_cat_post = mysqli_query($connection, "SELECT * FROM category WHERE id = '$cat_id'");
            $get_cat_row = mysqli_fetch_array($get_cat_post);
            echo $get_cat_row['cat_name'];
            ?></a>
            <h1><?php  echo $row['title']; ?></h1>
              <p class="price"> قیمت:<?php echo $row['price']; ?>  تومان </p>
              <p><?php echo $row['description']; ?></p>

ویژگی های کیک:<br>
			<input type="text"><br>
نوشته روی کیک:<br>
		    <input type="text"><br>
توضیحات:<br>
			<input type="text"><br><br>

            <a href="#" class="button-29">افزودن به سبد خرید</a>
		</div>

</div>
</body>
</html>
