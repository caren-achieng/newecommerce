<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="/assets/css/login.css">
    <link rel="stylesheet" href="/assets/css/ldbtn.min.css">
    <link rel="stylesheet" href="/assets/css/loading.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

    <style>
        .error {
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545;
        }
    </style>
</head>
<body>
<img src="/assets/images/menmodels.jpg" class="position-absolute" alt="">
<div class="position-absolute form">
    <h1>Log In</h1>
    <?php if(session()->has('errors')):?>
        <div class="alert alert-warning">
            <?php
            foreach (session('errors') as $error):
                ?>
                <li><?php echo $error ?></li>
            <?php
            endforeach;?>
        </div>
    <?php endif;?>
    <form id="login" class="row g-3" method="post" action="">
            <div class="text-white col-8">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="text-white col-8">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
        <div class="row">
            <div class="col-12 ml-5 col-sm8- offset-sm-2 offset-md-3 pt-4 from-wrapper">
                <button type="submit" class="btn mb-4 mt-2 col-md-5 btn-primary button ld-ext-right">
                    Log In
                    <span class="ld ld-ring ld-spin"></span>
                </button>
            </div>
        </div>
        <div class="signuplink">
            New to J | B&W? <a href="/register">Create account</a>
        </div>
    </form>

    <section id="login-error">
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    if ($("#login").length > 0) {
        $("#login").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength:8,
                    maxlength:255
                }
            },
            messages: {
                email: {
                    email: "Invalid email",
                    required: "Email field is required",
                    maxlength: "Maximum length 50 characters"
                },
                password: {
                    required: "Password field is required",
                    minlength:"Minimum length 8 characters",
                    maxlength:"Maximum length 255 characters"
                }
            },

            submitHandler: function (form) {
                //declare object to store form data
                const data = {};
                //get form data as an array
                $(form).serializeArray();
                // console.log($(form).serializeArray());
                //loop through above array storing each input in data object as name, value, pair
                $(form).serializeArray().map(function (object) {
                    data[object.name] = object.value;
                });

                const submitButton=jQuery(form).find(jQuery('button[type="submit"]'));

                //setting options for the ajax request
                $.ajax({
                    data: data,
                    url: '/login',
                    method: 'POST',

                    beforeSend:function(){
                        submitButton.prop('disabled',true).addClass('running')
                    },
                    //request callback/response from the backend(user.php::store)
                    success: function (response) {
                        const jason = JSON.parse(response);
                        if (jason.status) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Login Successful',
                                showConfirmButton: false,
                                timer: 1500,
                                allowOutsideClick:false
                            }).then(() => {
                                location.href=jason.url
                            })
                        } else if (jason.message) {
                            Swal.fire(
                                'OOPS!',
                                jason.message,
                                'error'
                            )
                        }
                        else{
                            Swal.fire(
                                'OOPS!',
                                'Something went wrong.',
                                'error'
                            )
                        }
                    },
                    //in case an error occurs(error handler)
                    error: function (error) {
                        console.log(error);
                    },
                    complete:function(){
                        submitButton.prop('disabled',false).removeClass('running')
                    }
                });
            }
        })
    }
</script>
</body>
</html>