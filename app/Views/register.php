<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="/assets/css/register.css">
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
<img src="/assets/images/3 women.jpg" class="position-absolute" alt="">
        <div class=" position-absolute form">
            <h1>Create Account</h1>
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
            <form id="register" class="row g-3" style="max-width: 500px" method="post" action="/register">
                <div class="row">
                <div class="col-12 text-white">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" autocomplete="off" required value="<?= old('email') ?>">
                </div>
                <div class="col-md-6 text-white">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" autocomplete="off" required value="<?= old('firstname') ?>">
                </div>
                <div class="col-md-6 text-white">
                    <label for="firstname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" autocomplete="off" required value="<?= old('lastname') ?>">
                </div>
                <div class="col-md-6 text-white">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-md-4 text-white">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" name="gender" class="form-select">
                        <option selected>Female</option>
                        <option value="male">Male</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                </div>

                <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn mt-4 btn-primary">Log In</button>
                </div>
                <div class="signuplink">
                    Already have an account? <a href="/login">Log-In</a>
                </div>
                </div>
            </form>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script>
    if ($("#register").length > 0) {
        $("#register").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength:3,
                    maxlength:20
                },
                lastname: {
                    required: true,
                    minlength:3,
                    maxlength:20
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength:8,
                    maxlength:255
                },
                gender: {
                    required: true,
                }
            },

            messages: {
                firstname: {
                    required: "First name field is required",
                    minlength:"Minimum length 3 characters",
                    maxlength:"Maximum length 20 characters"
                },
                lastname: {
                    required: "Last name field is required",
                    minlength:"Minimum length 3 characters",
                    maxlength:"Maximum length 20 characters"
                },
                email: {
                    email: "Invalid email",
                    required: "Email field is required",
                    maxlength: "Maximum length 50 characters"
                },
                password: {
                    required: "Password field is required",
                    minlength:"Minimum length 8 characters",
                    maxlength:"Maximum length 255 characters"
                },
                gender: {
                    required: "Select a gender",
                },
            },
        })
    }
</script>
</body>
</html>