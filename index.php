<?php
  require_once 'core/connection.php';
  //session_start();
  //session_destroy();
  if(isset($_POST['login'])){
    $email = $_POST['email'];

    //check if email already registered
    $query = "SELECT * FROM tbl_pria WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0){
      //query for add user
      $query_insert = "INSERT INTO tbl_pria (email) VALUES ('$email')";
      $insert = mysqli_query($conn, $query_insert);
      if ($insert) {
        session_start();
        $_SESSION["user"] = $email;
        header('Location:form_pria.php');
      }else{
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
    }else{
      session_start();
      $_SESSION["user"] = $email;
      header('Location:form_pria.php');
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="imaisnaini">
  <title>Nikah yuk..</title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css?v=1.0.1" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="assets/css/docs.min.css" rel="stylesheet">
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
      <div class="container">
        <a class="navbar mr-lg-5" href="../index.html">
          <!--<img src="assets/img/brand/white.png">-->
          <h3 class="display-3  text-white">Nikah yukk..</h3>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="blank_form.php" target="_blank" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                  <i class="fa fa-cloud-download mr-2"></i>
                </span>
                <span class="nav-link-inner--text">Download Form</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="display-3  text-white">An easy way
                  <span>to register your wedding</span>
                </h1>
                <p class="lead  text-white">Dapatkan kemudahan dalam mendaftarkan pernikahanmu dengan mendaftarkannya secara online melalui website kami</p>
                <div class="btn-wrapper">
                  <?php
                    session_start();
                    if(!isset($_SESSION["user"])){
                  ?>
                  <button class="btn btn-dark btn-icon mb-3 mb-sm-0" data-toggle="modal" data-target="#loginModal">
                    <span class="btn-inner--text">DAFTAR ONLINE</span>
                  </button>
                  <?php
                    }else{
                  ?>
                  <a href="form_pria.php" class="btn btn-dark btn-icon mb-3 mb-sm-0" >
                    <span class="btn-inner--text">DAFTAR ONLINE</span>
                  </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
    </div>
    <!--Modal Login-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="">
      <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
          <div class="card card-signup card-plain">
            <div class="modal-header">
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Log in</h4>
              </div>
            </div>
            <div class="modal-body">
              <form class="form" method="POST" action="">
                <div class="card-body">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons">email</i></div>
                      </div>
                      <input type="text" class="form-control" name="email" placeholder="Email...">
                    </div>
                  </div>
                </div>
                <input type="submit" class="btn btn-dark btn-icon mb-3 mb-sm-0" name="login" value="Get Started">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Modal Login-->
  </main>
    
  <footer class="footer has-cards">
    <div class="container container-lg">
      <div class="row">
        <div class="col-md-6 mb-5 mb-md-0">
          <div class="card card-lift--hover shadow border-0">
            <a href="../examples/landing.html" title="Landing Page">
              <img src="assets/img/theme/form1.png" class="card-img">
            </a>
          </div>
        </div>
        <div class="col-md-6 mb-5 mb-lg-0">
          <div class="card card-lift--hover shadow border-0">
            <a href="../examples/profile.html" title="Profile Page">
              <img src="assets/img/theme/form3.png" class="card-img">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row row-grid align-items-center my-md">
        <div class="col-lg-6">
          <h3 class="text-primary font-weight-light mb-2">Thank you for supporting us!</h3>
          <h4 class="mb-0 font-weight-light">Let's get in touch on any of these platforms.</h4>
        </div>
        <div class="col-lg-6 text-lg-center btn-wrapper">
          <a target="_blank" href="https://twitter.com/imaisnaini" class="btn btn-neutral btn-icon-only btn-twitter btn-round btn-lg" data-toggle="tooltip" data-original-title="Follow us">
            <i class="fa fa-twitter"></i>
          </a>
          <a target="_blank" href="https://www.facebook.com/imaisnaini" class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip" data-original-title="Like us">
            <i class="fa fa-facebook-square"></i>
          </a>
          <a target="_blank" href="https://github.com/imaisnaini" class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip" data-original-title="Star on Github">
            <i class="fa fa-github"></i>
          </a>
        </div>
      </div>
      <hr>
      <div class="row align-items-center justify-content-md-between">
        <div class="col-md-6">
          <div class="copyright">
            &copy; 2018
            <a href="https://www.creative-tim.com" target="_blank">imaisnaini</a>.
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav nav-footer justify-content-end">
            <li class="nav-item">
              <a href="#" target="_blank">imaisnaini</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link" target="_blank">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
<!-- Core -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.0.1"></script>
</body>

</html>