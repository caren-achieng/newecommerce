<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> JUST | B&W</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <div class="multi_color_border"></div>
    <div class="top_nav">
        <div class="left">
            <div class="logo"><p><span>Just</span>B&W</p></div>
        </div>
        <div class="right">
            <ul>
                <li><a class="nav-link link-secondary" href="#">Home</a></li>
                <li><a class="nav-link link-secondary" href="#">Products</a></li>
                <li><a class="nav-link link-secondary" href="<?php
                    if (session()->has('id')) {
                        echo "#";
                    } else {
                        echo "/login";
                    }
                    ?>"><?php
                        if (session()->has('id')) {
                            echo "Welcome " . session()->get('name');
                        } else {
                            echo "Login";
                        }
                        ?></a></li>
                <li><a href="/cart"><img src="/assets/images/cart.jpg" width="30px" height="30px" alt="shopping-cart"></a></li>
                <li><img src="/assets/images/menu.png" class="menu-icon" width="28px" alt="menu-icon"
                         onclick="menutoggle()"></li>
                <li><a href="/logout" class="logout" <?php
                    if (session()->has('id')) {
                        echo "/logout";
                    }
                    ?>"><?php
                    if (session()->has('id')) {
                        echo "Log out";
                    }
                    ?></a></li>
            </ul>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 justify-content-between w-100">
                    <?php $i=1; foreach ($categories as $category) { ?>
                        <li class="nav-item dropdown <?=$i===count($categories)?'dropstart':''?>">
                            <a class="nav-link text-light" href="#"  id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false"><?= $category['category_name'] ?></a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/allproducts/<?=$category['category_id']?>">All</a></li>
                                <?php foreach($subcategories as $subcategory){
                                    if($subcategory['category']==$category['category_id']){
                                        ?>
                                        <li><a class="dropdown-item" href="/eachproduct/<?=$subcategory['subcategory_id']?>"><?= $subcategory['subcategory_name'] ?></a></li>
                                    <?php } }?>
                            </ul>
                        </li>
                        <?php $i++; } ?>
                </ul>
            </div>
        </div>
    </nav>


</div>
<!--toggle menu-->
<script>
    var menuitems = document.getElementById("menuitems");

    menuitems.style.maxHeight = "0px";

    function menutoggle() {
        if (menuitems.style.maxHeight == "0px") {
            menuitems.style.maxHeight = "200px";
        } else {
            menuitems.style.maxHeight = "0px";
        }
    }
</script>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col font">
                <h1>Classy is the original <br> Black and White!</h1>
                <p class="col-2">Life is not always black and white, <br> but there's no harm in wearing it.</p>
                <a href="" class="button btn-dark">EXPLORE NOW &#8594;</a>
            </div>
            <div class="col">
                <img class="size" src="/assets/images/dd.png" alt="classy-woman-in-hat">
            </div>
        </div>
    </div>
</div>

<!--categories-->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <a href="/allproducts/1"><img class="img-thumbnail image rounded-circle " src="/assets/images/women-featured.jpg" alt="woman"></a>
            </div>
            <div class="col-3">
                <a href="/allproducts/2"><img class="img-thumbnail image rounded-circle" src="/assets/images/men-featured.jpg" alt="man"></a>
            </div>
            <div class="col-3">
                <a href="/allproducts/3"><img class="img-thumbnail image rounded-circle" src="/assets/images/child-featured.jpg" alt="child"></a>
            </div>
            <div class="col-3">
                <a href="/allproducts/4"><img class="img-thumbnail image rounded-circle" src="/assets/images/pets-featured.jpg" alt="dog-in-jacket"></a>
            </div>
        </div>
    </div>
</div>

<!--all sales-->
<div class="small-container">
    <h2 class="title">FORMAL x WEAR</h2>
    <div class="row">
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/men formal.jpg" alt="men's formal wear">
            <h4>Black Suspenders</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.5000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/women formal wear.jpg" alt="women's formal wear">
            <h4>White Blazer</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.3000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/children formal.jpg" alt="children's formal wear">
            <h4>Kids' Tuxedo</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.3500</p>
        </div>
    </div>

    <h2 class="title">CASUAL x WEAR</h2>
    <div class="row">
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/men casual.jpg" alt="men's casual wear">
            <h4>Classic White Tee</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.3000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/women casual.jpg" alt="women's casual wear">
            <h4>Oversized sweater</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.3500</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/children casual.jpg" alt="kid's casual wear">
            <h4>Kids' matching sweat pants</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.4000</p>
        </div>
    </div>

    <h2 class="title">SPORTS x WEAR</h2>
    <div class="row">
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/men sports.jpg" alt="men's sports wear">
            <h4>Sports shoes</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.5000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/women sports.jpg" alt="women's sports wear">
            <h4>Bra and tights set</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.4000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/children sports.jpg" alt="children's sports wear">
            <h4>Girls Leotard</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.4000</p>
        </div>
    </div>

    <h2 class="title">PETS</h2>
    <div class="row">
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/dog.jpg" alt="dog">
            <h4>Poodle</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.50,000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/dog 1.jpg" alt="dog">
            <h4>Beagle</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Ksh.70,000</p>
        </div>
        <div class="col-3">
            <img class="img-thumbnail" src="/assets/images/cat.jpg" alt="cat">
            <h4>Cheshire</h4>
            <div class="rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Ksh.40,000</p>
        </div>
    </div>
</div>


<div class="message">
    <p class="head">Just Black and White is a Kenyan website. All offers are based on Ksh, Kenyan times and dates. Internal exchange rates will be applied.
        <br></p>
    <p class="subhead">Dress like you're already famous!</p>
    <a href="" class="btn position-relative top-25 mt-5 btn-dark start-50 end-50 translate-middle" >ORDER NOW &#8594;</a>
</div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Customer Service</h3>
                <ul>
                    <li>Help & FAQs</li>
                    <li>Delivery</li>
                    <li>Return Policy</li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <div class="footer-col-2">
                <h3>JUST | B&W App</h3>
                <div class="applogo">
                    <div class="ios">
                        <img src="/assets/images/download.png" alt="">
                    </div>
                    <div class="android mt-5">
                        <img src="/assets/images/ggp.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <p class="copyright"> Copyright 2021 - Internet Application Programming Project</p>
    </div>
</div>

</body>
</html>