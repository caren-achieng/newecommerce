<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
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
                                <h4>Edit Category</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="category" class="row g-3" style="max-width: 500px" method="post" action="<?= base_url('categories/update/'.$categories['category_id'])?>">
                            <div class="row">
                                <div class="form-group col-12 text-dark">
                                    <label for="email" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="category" autocomplete="off" required value="<?= old('category') ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 ml-5 col-sm8- offset-sm-2 offset-md-5 pt-4 from-wrapper">
                                    <button type="submit" class="btn mb-4 col-md-3 btn-primary button">Edit</button>
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
        if ($("#category").length > 0) {
            $("#category").validate({
                rules: {
                    category: {
                        required: true,
                        minlength: 1,
                        maxlength: 25
                    }
                },

                messages: {
                    category: {
                        required: "Field is required",
                        minlength: "Minimum length 1 characters",
                        maxlength: "Maximum length 25 characters"
                    }
                },
                submitHandler: function(form) {
                    //declare object to store form data
                    //get form data as an array
                    var data = $(form).serialize();
                    console.log($(form).serializeArray());
                    //loop through above array storing each input in data object as name, value, pair
                    // $(form).serializeArray().map(function (object) {
                    //     data[object.name] = object.value;
                    // });

                    const submitButton=jQuery(form).find(jQuery('button[type="submit"]'));

                    //setting options for the ajax request
                    $.ajax({
                        data: data,
                        url: '/categories/update/<?= $categories['category_id']?>',
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
                                    title: 'Category edited Successfully',
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

</html>
