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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <style>
        .card{
            box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.75);
        }
        .card-header{
            background-color: black;
            color: white;
        }
        .error {
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: #dc3545;
        }
    </style>
</head>
<section class="bg-light">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="admin/index">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col d-flex justify-content-between align-items-center">
                            <h4>Add New User</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                   <form id="register" class="row g-3" style="max-width: 500px" method="post" action="admin/register">
                       <div class="row">
                           <div class="form-group col-12 text-dark">
                               <label for="email" class="form-label">Email</label>
                               <input type="email" class="form-control" name="email" autocomplete="off" required value="<?= old('email') ?>">
                           </div>
                           <div class="form-group col-md-6 text-dark">
                               <label for="firstname" class="form-label">First Name</label>
                               <input type="text" class="form-control" name="first_name" autocomplete="off" required value="<?= old('firstname') ?>">
                           </div>
                           <div class="form-group col-md-6 text-dark">
                               <label for="firstname" class="form-label">Last Name</label>
                               <input type="text" class="form-control" name="last_name" autocomplete="off" required value="<?= old('lastname') ?>">
                           </div>
                           <div class="form-group col-md-6 text-dark">
                               <label for="password" class="form-label">Password</label>
                               <input type="password" class="form-control" name="password" id="password">
                           </div>
                           <div class="form-group col-md-4 text-dark">
                               <label for="gender" class="form-label">Gender</label>
                               <select id="gender" name="gender" class="form-select">
                                   <option value="female" selected>Female</option>
                                   <option value="male">Male</option>
                               </select>
                           </div>
                           <div class="form-group col-md-4 text-dark">
                               <label for="gender" class="form-label">Role</label>
                               <select id="role" name="role" class="form-select">
                                   <option selected disabled></option>
                                   <option value="1">Customer</option>
                                   <option value="2">Admin</option>
                               </select>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-12 ml-5 col-sm8- offset-sm-2 offset-md-5 pt-4 from-wrapper">
                               <button type="submit" class="btn mb-4 col-md-3 btn-primary button">Save</button>
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if ($("#register").length > 0) {
        $("#register").validate({
            rules: {
                firstname: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                lastname: {
                    required: true,
                    minlength: 3,
                    maxlength: 20
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 255
                },
                gender: {
                    required: true,
                }
            },

            messages: {
                firstname: {
                    required: "First name field is required",
                    minlength: "Minimum length 3 characters",
                    maxlength: "Maximum length 20 characters"
                },
                lastname: {
                    required: "Last name field is required",
                    minlength: "Minimum length 3 characters",
                    maxlength: "Maximum length 20 characters"
                },
                email: {
                    email: "Invalid email",
                    required: "Email field is required",
                    maxlength: "Maximum length 50 characters"
                },
                password: {
                    required: "Password field is required",
                    minlength: "Minimum length 8 characters",
                    maxlength: "Maximum length 255 characters"
                },
                gender: {
                    required: "Select a gender",
                },
            },
            submitHandler: function (form) {
                //declare object to store form data
                const data = {};
                //get form data as an array
                $(form).serializeArray();
                console.log($(form).serializeArray());
                //loop through above array storing each input in data object as name, value, pair
                $(form).serializeArray().map(function (object) {
                    data[object.name] = object.value;
                });

                const submitButton=jQuery(form).find(jQuery('button[type="submit"]'));

                //setting options for the ajax request
                $.ajax({
                    data: data,
                    url: '/admin/register',
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
                                title: 'Registration Successful',
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