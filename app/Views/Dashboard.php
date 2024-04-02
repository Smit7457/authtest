<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Add custom styles here */
    .welcome-text {
      margin-top: 100px;
    }
  </style>
</head>
<body>
  <div class="container text-center">
    <h1 class="display-4">Welcome to Our Website</h1>
    <p class="lead">Thank you for visiting! We're excited to have you here.</p>
    <a href="<?= base_url('/logout') ?>" class="btn btn-primary btn-lg">Logout</a>
  </div>
  <!-- Bootstrap JS (Optional, if you need JavaScript features) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <
