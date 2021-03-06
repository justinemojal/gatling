<?php 
//echo "login page";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Gatling</title>

  <!-- Favicon -->
<!--   <link href="assets/img/brand/favicon.png" rel="icon" type="image/png"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css" rel="stylesheet">
</head>
<body>
  <header id="header" class="header-global">
    <nav class="navbar navbar-expand-lg navbar-dark bg-default">
        <div class="container">
            <a class="navbar-brand" href="#">GATLING API</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="index.html">
                                <img src="assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#">
                            <i class="ni ni-favourite-28"></i>
                            <span class="nav-link-inner--text d-lg-none">Discover</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#">
                            <i class="ni ni-notification-70"></i>
                            <span class="nav-link-inner--text d-lg-none">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-settings-gear-65"></i>
                            <span class="nav-link-inner--text d-lg-none">Settings</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    
  </header><!-- /header -->
  <main>
    <section class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-lg-6">
            <form action="authenticate.php" method="POST">
              <div class="form-group mb-3">
                <div class="input-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input name="email" class="form-control" placeholder="Email" type="email">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input name="password" class="form-control" placeholder="Password" type="password">
                </div>
              </div>
              <div class="custom-control custom-control custom-checkbox">
                <input class="custom-control-input" id="customCheckLogin" type="checkbox">
                <label class="custom-control-label" for="customCheckLogin">
                  <span>Remember me</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Log in</button>
              </div>
            </form>         
          </div>       
        </div>     
      </div>
    </section>
  </main>
  <!-- Core -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- Optional plugins -->
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>

  <!-- Theme JS -->
  <script src="assets/js/argon.js"></script>
  </body>
</html>

