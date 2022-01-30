<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JUST|B&W</title>
<!--    <link rel="stylesheet" href="/assets/css/style.css">-->
<!--    <link rel="stylesheet" href="/assets/css/nav.css">-->
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
<form action="" method="post" id="topup">
    <div id="wallet_div" class="p-5 bg-secondary border rounded position-absolute top-50 start-50 translate-middle" >
        <div>
            <h6>Simulated ewallet topup.</h6><br><h6>Top up your wallet to purchase your items.</h6><br>
        </div>
        <input type="hidden" id="walletUid" value="<?= session()->get('id') ?>">
        <input type="hidden" id="current-balance" value="<?= session()->get('wallet') ?>">
        <input id="topUpInput" class="form-control" type="number" min="100" placeholder="Min: 100">
        <br>
        <div class="position-relative">
            <button onclick="window.location.href='/summary'" class="btn btn-primary m-0 mt-4 position-absolute top-50 start-50 translate-middle" type="submit">MAKE PAYMENT</button>
        </div>
        <br>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#walletForm').on('submit', (e) => {
        const uid = $('#walletUid').val();
        const amount = $('#topUpInput').val();
        const current_bal = $('#current-balance').val();

        const newBal = parseFloat(current_bal) + parseFloat(amount);

        console.log(<?= session()->get('wallet') ?>);
        console.log(current_bal);
        console.log(newBal);

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '<?= base_url('WalletController/topup') ?>',
            data: {
                uid: uid,
                amount: amount,
                newBalance: newBal
            },
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            contentType: 'application/x-www-form-urlencoded',
            cache: false,

            success: (response) => {
                if (response.status == 1) {
                    alert(response.message);
                    $('#walletBalance')[0].innerHTML = response.newBal;
                } else {
                    alert(response.message);
                }
            }

        });
    });
</script>
</body>
</html>
