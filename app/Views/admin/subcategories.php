<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUB-CATEGORY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/ldbtn.min.css">
    <link rel="stylesheet" href="/assets/css/loading.min.css">
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
<body class="bg-light">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <form class="row g-3" id="category" method="post" action="">
                        <div class="col-md-4">
                            <label for="category_name" class="form-label">Category</label>
                            <select id="inputState" class="form-select" name="category">
                                <option value="" disabled selected>Choose...</option>
                                <?php
                                foreach($categories as $category){
                                 echo '<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="category_name" class="form-label">SubCategory Name</label>
                            <input type="text" class="form-control" name="subcategory_name">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mt-4 ld-ext-right">
                                Add
                                <span class="ld ld-ring ld-spin"></span>
                            </button>
                        </div>
                    </form>
                    <h1 class="m-0 mt-4">All SubCategories</h1>
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
                            <h4>SubCategory Data</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Category ID</th>
                                <th scope="col">SubCategory ID</th>
                                <th scope="col">SubCategory Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($subcategories as $row) : ?>
                                <tr>
                                    <td><?= $row['category'] ?></td>
                                    <td><?= $row['subcategory_id'] ?></td>
                                    <td><?= $row['subcategory_name'] ?></td>
                                    <td>
                                        <a href="<?= base_url('subcategory/edit/'.$row['subcategory_id'])?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="<?= base_url('subcategory/delete/'.$row['subcategory_id'])?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    if ($("#category").length > 0) {
        $("#category").validate({
            rules: {
                subcategory_name: {
                    required: true,
                    minlength: 1,
                    maxlength: 25
                }
            },

            messages: {
                subcategory_name: {
                    required: "Field is required",
                    minlength: "Minimum length 1 characters",
                    maxlength: "Maximum length 25 characters"
                }
            },
            submitHandler: function(form) {
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
                    url: '/subcategories',
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
                                title: 'SubCategory Added Successfully',
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


