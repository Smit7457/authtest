<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>

    <style>
        body{
            /* background-color: #adadad; */
        }
        .myDiv {
            /*background-color: #c9c9c9; */
            box-shadow: 0px 0px 15px 3px rgb(0 0 0 / 40%);
            border-radius: 5px;
        }

        input.form-control {
    background-color: aliceblue !important;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5 myDiv">
                <h2 class="text-center mt-2 mb-2">Register User</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>signup/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="mobile" placeholder="Mobile No" value="<?= set_value('mobile') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-success mb-3">Sign Up</button>
                        <a href="<?php echo base_url(); ?>" class="btn btn-danger">Back To Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>