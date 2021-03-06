<!doctype html>
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

    <style>
        .alert-success {
            color: #000000;
            background-color: #15fd74;
            border-color: #badbcc;
        }

        .alert-danger {
            color: #ffffff;
            background-color: #fd1515;
            border-color: #badbcc;
        }
        .position{
            transform:translate(48px, 0px);
        }
        #form1{
            width: 50px;
        }
    </style>
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
<!--all sales-->
<form id="product" action="">
    <div class="small-container mt-5">
        <div id="alerter" class="alert alert-success position-absolute top-0 start-50 translate-middle-x w-100 text-center" style="display:none" role="alert">
            <input type="hidden" name="productname" value="<?= $product[0]['product_name']?>">
            <?= $product[0]['product_name'].' has been added to your cart' ?>

        </div>
        <div id="error" class="alert alert-danger position-absolute top-0 start-50 translate-middle-x w-100 text-center" style="display:none" role="alert">
            <input type="hidden" name="productname" value="<?= $product[0]['product_name']?>">
            <?= 'Failed to add '.$product[0]['product_name'].' to your cart' ?>

        </div>
        <div class="row">
            <div class="col-3">
                <img class="img-thumbnail" src="/products/<?= $product[0]['product_image'] ?>" alt="">
                <input type="hidden" name="productimage" value="<?= $product[0]['product_image']?>">
                <br>

                <br>
                <h4><?= $product[0]['product_name']?></h4>

                <div class="price">
                    <span><?= "Ksh ".$product[0]['unit_price']."  " ?></span>
                    <input type="hidden" name="productprice" value="<?= $product[0]['unit_price']?>">
                </div>
                <br>
            </div>
            <div class="col-3">
                <h4>Product Description</h4>
                <div class="description">
                    <span><?=$product[0]['product_description']."  " ?><br>
                         <input type="hidden" name="productdescription" value="<?= $product[0]['product_description'] ?>">
                    </span>
                </div>
                <br>

                <h4>Items in Stock</h4>
                <div class="instock">
                    <span><?=$product[0]['available_quantity']."  " ?><br><br>

                        <button type="submit" class="btn btn-dark" id="cart_button" value="<?=$product[0]['product_id']?>">Add to Cart</button>
                                    <input type="hidden" name="productid" value="<?= $product[0]['product_id']?>">
                    </span>
                </div>
                <br>
            </div>
        </div>
    </div>
</form>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script>
    $(document).ready(function() {
        $('#product').submit(function(event){
            event.preventDefault();
            var $form = $(this);

            var $inputs = $form.find("button");

            var data = $form.serialize();

            $inputs.prop("disabled", true);

            $.ajax({
                url: '/cart/add',
                type: 'post',
                data: data,
                success: function(response){
                    if(response == "success"){
                        $inputs.prop("disabled", false);
                        document.getElementById('alerter').style.display='';
                        setTimeout(removeAlert,2000);

                    }else{
                        $inputs.prop("disabled", false);
                        document.getElementById('error').style.display='';
                        setTimeout(removeAlert,2000);
                    }
                }
            });
        });
    });

    function removeAlert(){
        document.getElementById('alerter').style.display='none';
        document.getElementById('error').style.display='none';
    }


</script>
</body>
</html>