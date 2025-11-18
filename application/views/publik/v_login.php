
<!DOCTYPE html>
<html lang="en">

<head>

 
<?php $this->load->view("admin/_partials/head.php") ?>
  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
      <?php $this->load->view("publik/_partials/head.php") ?>

   <?php $this->load->view("publik/_partials/header.php") ?>
    <!-- banner part start-->
 <?php $this->load->view("publik/_partials/banner.php") ?>

</head>

<body class="bg-white">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="<?php echo base_url('index.php/publik/login/aksi_login'); ?>" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="username">
              <label for="inputEmail">NIK</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
       <input type="submit" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo site_url('publik/login/regis') ?>">Register an Account</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>


<br></br>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 <?php $this->load->view("publik/_partials/footer.php") ?>
    <!-- jquery plugins here-->
 <?php $this->load->view("publik/_partials/js.php") ?>
</body>

</html>
