<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
  <style>
    

    .submitbtn {

      width: 25%;
    }

    .btnpos {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2rem;
    }

    body {
      background-color: #adadad;
    }

    .myDiv {
      background-color: #c9c9c9;
      box-shadow: 0px 0px 15px 5px rgb(0 0 0 / 65%);
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-5 myDiv">
        <h2 class="text-center">Login</h2>
        
        <form action="<?= base_url('checklogin') ?>" method="post">
          <div class="form-group mb-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="Email" placeholder="Enter email" name="Email">
          </div>
          <div class="form-group mb-3">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="Password" placeholder="Enter password" name="Password">

          </div>

          <div class="mb-3 btnpos">
            <button type="submit" class="btn btn-primary submitbtn submitdata">Submit</button>
            <button type="reset" class="btn btn-danger submitbtn">Reset</button>
          </div>
          <div class="btnpos mt-3">
            <p>Do you have an Account ? <a href="<?= base_url('signup') ?>">Create New Account</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {

      <?php if (session()->has('msg')): ?>
        // Display the flash message in an alert
        alert("<?php echo session('msg'); ?>");

      <?php endif; ?>
    });
    </script>
</body>

</html>