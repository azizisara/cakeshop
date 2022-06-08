<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ورود</title>
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

<?php

if (isset($_POST['realname'])  && !empty($_POST['realname']) && 
	isset($_POST['username']) && !empty($_POST['username']) && 
	isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['repassword']) && !empty($_POST['repassword']) &&
	isset($_POST['email']) && !empty($_POST['email'])) {

    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
} else
    exit("برخی از فیلد ها مقدار دهی نشده است");


if ($password != $repassword)
    exit("كلمه عبور و تكرار آن مشابه نيست");


if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    exit("پست اكترونيك وارد شده صحيح نیست");

$link = mysqli_connect("localhost", "root", "", "CakeShop");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "INSERT INTO users (realname,username,password,email) VALUES ('$realname','$username','$password','$email','0')";

if (mysqli_query($link, $query) === true)
    echo ("<p style='color:green;'><b>" . $realname .
        " گرامي عضويت شما با نام كاربري " . $username .
        " در فروشگاه با موفقيت انجام شد " . "</b></p>");
else
    echo ("<p style='color:red;'><b>عضويت شما در فروشگاه انجام نشد</b></p>");

mysqli_close($link);

?>
