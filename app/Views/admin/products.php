<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD PRODUCT</title>
    <link rel="stylesheet" href="assets/css/products.css">
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
<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <h4>Add Product</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="g-3" id="category" method="post" action="">
                            <div class="row">
                            <div class="col-md-4">
                                <label for="category_name" class="form-label">Category</label>
                                <select id="inputState" class="form-select" name="category" onchange="addSubcategories(value);">
                                    <option value="" disabled selected>Choose...</option>
                                    <?php
                                    foreach($categories as $category){
                                        echo '<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="subcategory_id" class="form-label">Subcategory</label>
                                <select id="subcategory" class="form-select" name="subcategory_id">
                                    <option value="" disabled selected>Choose...</option>
                                </select>
                            </div>
                            </div>
                            <hr>
                            <div class="row mt-3 mb-3 col-12">
                                <label for="prod_name" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prod_name">
                                </div>
                            </div>
                            <div class="row mt-3 mb-3 col-12">
                                <label for="prod_description" class="col-sm-2 col-form-label">Product Description</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" name="prod_description" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3 col-12">
                                <label for="unit_price" class="col-sm-2 col-form-label">Unit Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="unit_price" name="unit_price">
                                </div>
                            </div>
                            <div class="row mt-3 mb-3 col-12">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Stock</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="stock" name="stock">
                                </div>
                            </div>
                            <div class="row mt-3 mb-3 col-12">
                                <label for="formFile" class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="prod_image">
                                </div>
                            </div>

                            <div class="col-12 ml-5 col-sm8- offset-sm-2 offset-md-5 pt-4 from-wrapper ">
                                <button type="submit" class="btn mb-4 col-md-2 btn-primary button ld-ext-right">
                                    ADD
                                    <span class="ld ld-ring ld-spin"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#category").validate({
            rules: {
                prod_name: {
                    required: true,
                    minlength: 1,
                    maxlength: 25
                },
                prod_image: {
                    accept:'image/*',
                    required: true,
                },
                unit_price: {
                    required: true,
                    minlength: 1,
                    maxlength: 99
                },
                stock: {
                    required: true,
                    minlength: 1,
                    maxlength: 99
                }
            },

            messages: {
                prod_name: {
                    required: "Field is required",
                    minlength: "Minimum length 1 characters",
                    maxlength: "Maximum length 25 characters"
                },
                prod_image: {
                    accept: "Upload file of type image",
                    required: "Please provide a product image"
                },
                unit_price: {
                    required: "Field is required",
                },
                stock: {
                    required: "Field is required",
                    minlength: 1,
                    maxlength: 99
                }
            },
            submitHandler: function (form) {
                const submitButton=jQuery(form).find(jQuery('button[type="submit"]'));

                //setting options for the ajax request
                $.ajax({
                    data: new FormData(form),
                    contentType:false,
                    processData: false,
                    url: '/products/store',
                    method: 'POST',
                    dataType: 'json',

                    beforeSend:function(){
                        submitButton.prop('disabled',true).addClass('running')
                    },
                    //request callback/response from the backend(user.php::store)
                    success: function (jason) {
                        if (jason.status) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Product Added Successfully',
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
        });

    function addSubcategories(id){
        document.getElementById('subcategory').innerHTML='';
        document.getElementById('subcategory').innerHTML='<option value="" disabled selected>Choose...</option>';

        var request = new XMLHttpRequest();
        var url = "http://localhost:8080/products/" + id;

        request.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var result = request.response;
                const res = JSON.parse(result);

                for (var i = 0; i < 1; i++) {
                    document.getElementById('subcategory').innerHTML += '<option value="' + res.subcategories[i].id + '">' + res.subcategories[i].name + '</option>';
                }
            }

        };
            request.open('GET',url,false);
            request.setRequestHeader('Accept', 'application/json');
            request.send();
        }
</script>
</body>
</html>