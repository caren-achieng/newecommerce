<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>nav bar</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>
<div class="navbar">
    <div class="logo">
        <img src="/assets/images/logo.png" width="140px" alt="logo">
    </div>
    <nav>
        <ul id="menuitems">
            <li> <a href="">Home</a></li>
            <li> <a href="">Products</a></li>
            <li> <a href="/login">Login</a></li>
        </ul>
    </nav>
    <img src="/assets/images/cart.jpg" width="30px" height="30px" alt="shopping-cart">
    <img src="/assets/images/menu.png" class="menu-icon" width="28px" alt="menu-icon" onclick="menutoggle()">
    <a href="/logout"><li class="logout">Logout</li></a>
    <i class="fas fa-user-circle"></i>
    <!--            <a href="#"><li class="fname">--><?php //echo $_SESSION['fname']; ?><!--</li></a>-->
</div>

<!--toggle menu-->
<script>
    var menuitems = document.getElementById("menuitems");

    menuitems.style.maxHeight="0px";

    function menutoggle(){
        if(menuitems.style.maxHeight=="0px")
        {
            menuitems.style.maxHeight="200px";
        }
        else
        {
            menuitems.style.maxHeight="0px";
        }
    }
</script>
</body>
</html>
