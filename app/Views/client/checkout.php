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
    <link rel="stylesheet" href="/assets/css/checkout.css">
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
<main>
    <h1>Checkout</h1>
    <p>Select one of these payment methods</p>
    <div class="alternate-payment">
        <button onclick="window.location.href='/ewallet'" class="btn btn-paypal" type="button">eWallet</button>
        <button class="btn btn-coinbase" type="button">Mpesa</button>
    </div>
    <p>Or enter your credit card information</p>
    <form class="ccjs-card">
        <div class="row">
            <fieldset class="number">
                <label class="ccjs-number">Card Number
                    <input class="ccjs-number" name="cc-number" placeholder="•••• •••• •••• ••••"/>
                </label>
            </fieldset>
            <fieldset class="security">
                <label class="ccjs-csc">Security Code
                    <input class="ccjs-csc" name="csc" placeholder="•••"/>
                </label>
            </fieldset>
        </div>
        <div class="row">
            <fieldset class="name">
                <label class="ccjs-name">Cardholder's Name
                    <input class="ccjs-name" name="cc-name" placeholder="John Dough"/>
                </label>
            </fieldset>
            <fieldset class="ccjs-expiration">
                <legend class="expiration">Expiration</legend>
                <div class="row">
                    <select class="ccjs-month" name="month">
                        <option selected="" disabled="">MM</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    <select class="ccjs-year" name="year">
                        <option selected="" disabled="">YY</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                    </select>
                </div>
            </fieldset>
        </div>
        <select class="ccjs-hidden-card-type" name="card-type">
            <option class="ccjs-amex" value="amex">American Express</option>
            <option class="ccjs-discover" value="discover">Discover</option>
            <option class="ccjs-mastercard" value="mastercard">MasterCard</option>
            <option class="ccjs-visa" value="visa">Visa</option>
            <option class="ccjs-diners-club" value="diners-club">Diners Club</option>
            <option class="ccjs-jcb" value="jcb">JCB</option>
        </select>
    </form>
    <button class="btn btn-primary" onclick="window.location.href='/summary'" type="button">Checkout</button>
</main>
</body>
</html>