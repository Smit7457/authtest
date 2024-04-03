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

  .error-message {
    color: #ffffff;
    background-color: #ff2424;
  }

  .success-message {
    color: #ffffff;
    background-color: #008000;

  }

  .responsemsg {
    background-color: green;
  }
</style>

<div class="container text-center">

  <h1 class="display-4">Welcome to Our Website</h1>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-5 myDiv">
        <?php

        if (!empty($data)) {
          if ($data['response'] == true) {

            echo '<p id="successMessage" class="form-control ' . (isset($data['message']) ? 'success-message' : '') . '">' . (isset($data['message']) ? $data['message'] : '') . '</p>';
          } else {
            echo '<p id="ErrorMessage" class="form-control ' . (isset($data['message']) ? 'error-message' : '') . '">' . (isset($data['message']) ? $data['message'] : '') . '</p>';
          }
        }
        ?>
      </div>
    </div>

    <div class="row justify-content-md-center">
      <div class="col-5 myDiv">
        <form action="<?= base_url('upload') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group mb-3">
            <input type="file" class="form-control" id="file" name="file">
          </div>
          <div class="mb-3 btnpos">
            <button type="submit" class="btn success-message">Upload</button>
          </div>
        </form>
      </div>
    </div>

    <?php
    if (!empty($data)) {
      if (!empty($data['record'])) {
        echo "<pre>";
        print_r($data['record']);
      }
    }
    ?>
  </div>
</div>
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        // Hide the success message after 2 seconds
        setTimeout(function(){
            $('#successMessage').fadeOut('slow');
        }, 500); 

        setTimeout(function(){
            $('#ErrorMessage').fadeOut('slow');
        }, 500); 

    });
</script>
<?php
include __DIR__ . '/Layouts/Footer.php';
?>