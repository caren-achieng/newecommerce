<?php $cart = \Config\Services::cart(); ?>
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

        .form1{
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
<section class="h-100 h-custom" style="background-color: #d2c9ff;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Your Cart</h1>
                                        <h6 class="mb-0 text-muted"><?php if($cart->totalItems() == 1){

                                            echo $cart->totalItems()." item";
                                            }elseif($cart->totalItems() == 0){
                                                echo "Your cart is empty";
                                            }else{
                                            echo $cart->totalItems()." items";
                                            }?></h6>
                                    </div>
                                    <?php foreach($orders as $order){?>
                                    <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img
                                                src="/products/<?=$order['options']['img']?>"
                                                class="img-fluid rounded-3">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?= $order['name']?></h6>
                                            <h6 class="text-black mb-0"><?=$order['options']['description']?></h6>
                                        </div>
                                        <div class="col-md-3 col-lg-3 d-flex">
                                            <button class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown(); changeQuantity('<?=$order['rowid']?>');">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <input id="<?= $order['rowid']?>" min="1" name="quantity" value="<?=$order['qty']?>" type="number"
                                                   class="form-control form-control-sm form1" size="50"/>

                                            <button class="btn btn-link px-2"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp(); changeQuantity('<?=$order['rowid']?>');">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0"><?= "Ksh ".$order['price'] ?></h6>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="/deleteitem/<?=$order['rowid']?>" class="text-muted"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                    <?php }?>

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="<?= previous_url('true')?>" class="text-body"><i
                                                    class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase"><?php if($cart->totalItems() == 1){

                                                echo $cart->totalItems()." item";
                                            }elseif($cart->totalItems() == 0){
                                                echo "Your cart is empty";
                                            }else{
                                                echo $cart->totalItems()." items";
                                            }?></h5>
                                        <h5><?= $cart->total()?></h5>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5><?= $cart->total()?></h5>
                                    </div>

                                    <button type="button" onclick="window.location.href='/checkout'" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">CHECK OUT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script>
    function changeQuantity(rowid){
        quantity = document.getElementById(rowid).value;
        $.ajax({
            method: 'post',
            url: /changequantity/+rowid,
            data:{quantity: quantity},
            success:function(response){
                if(response == "success"){
                    location.reload();
                }
            }
        });
    }
</script>