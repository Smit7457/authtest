<?php 
    include __DIR__ . '/Layouts/Header.php';
?>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Add custom styles here */
    .welcome-text {
      margin-top: 100px;
    }
  </style>

  <div class="container text-center">

    <h1 class="display-4">Welcome to Our Website</h1>
    <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-5 myDiv">
        <form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <input type="file" class="form-control" id="file" name="file">
          </div>
          <div class="mb-3 btnpos">
            <button type="submit" class="btn btn-success submitbtn submitdata">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    
  </div>

<?php 
    include __DIR__ . '/Layouts/Footer.php';
?>

