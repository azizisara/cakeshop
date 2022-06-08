<?php
require_once 'inc/config.php';
$connection = mysqli_connect('localhost', 'root', '', 'ecom');
mysqli_query($connection, "SET NAMES utf8");?>


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
<script type="text/javascript">

    function check_empty()
    {
        var username='';
        username=document.getElementById("username").value;
        if(username=='')
            alert("وارد کردن نام کاربری الزامی است");
        else
        {
            var r=confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
            if(r==true){
                document.register.submit();
            }
        }
    }
</script>
</br>
<fieldset>
    <legend>ثبت نام</legend>
    <form name="signup" action="action_signin.php" method="post" style="direction: rtl;">
        <table style="width: 50%; border=0; margin-left: auto;margin-right: auto; ">

            <tr>
                <td style="width: 50%;">نام<span style="color: red;">*</span></td>
                <td style="width: 50%;"><input type="text" id="realname" name="realname" /></td>
            </tr>

            <tr>
                <td>نام کاربری<span style="color: red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="username" name="username" /></td>
            </tr>

            <tr>
                <td>رمز<span style="color: red;">*</span></td>
                <td><input type="password" style="text-align: left;" id="password" name="password" /></td>
            </tr>

            <tr>
                <td>تکرار رمز<span style="color: red;">*</span></td>
                <td><input type="password" style="text-align: left;" id="repassword" name="repassword" /></td>
            </tr>

            <tr>
                <td>ایمیل<span style="color: red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="email" name="email" /></td>
            </tr>

            <tr>
                <td><br/><br/></td>
                <td>
                    <button class="button-17" role="button" onClick="check_empty();">ثبت نام</button>
                    &nbsp;&nbsp;
                    <button class="button-17" role="button" type="reset" >جدید</button>
                </td>
            </tr>

        </table>
</fieldset>
<br>
</form>
<fieldset>
    حساب کاربری دارید؟
    <a href="login.php"><button class="button-34" role="button" >ورود</button></a>
</fieldset>


</body>
</html>
