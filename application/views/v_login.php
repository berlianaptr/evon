<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Evon | Evakuasi Online</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png">

    <!-- plugins css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css" />

    <!-- core css -->
    <link href="<?php echo base_url() ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/app.css" rel="stylesheet">
</head>

<body>
    <div class="app">
      <div class="authentication">
        <div class="sign-in-2">
          <div class="container-fullwidth no-pdd-horizon bg" style="background-image: url(https://images.unsplash.com/photo-1444065707204-12decac917e8?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=f624ed976f195082fe69f5603de9b1ad&auto=format&fit=crop&w=753&q=80)">
              <div class="row">
                <div class="col-md-4 col-md-offset-4 mr-auto ml-auto">
                  <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                      <h3 class="text-center"><?php echo $_SESSION['error']; ?></h3>
                    </div>
                    <?php
                  } ?>
                  <div class="row">
                    <div class="mr-auto ml-auto full-height height-100">
                      <div class="vertical-align full-height">
                        <div class="table-cell">
                          <div class="card">
                            <div class="card-body">
                              <form action="<?php echo site_url('welcome/login') ?>" method="POST">
                                <div class="pdd-horizon-30 pdd-vertical-30">
                                  <div class="mrg-btm-30">
                                    <h2 class="inline-block no-mrg-vertical pdd-top-5 text-center">Login Evakuasi Online</h2>
                                  </div>
                                  <p class="mrg-btm-15 font-size-13">Silakan masukkan username dan password anda!</p>
                                  <div class="form-group">
                                    <input type="text" name="user" id="user" required="" class="form-control" placeholder="User name">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" required="" name="pass" id="pass" class="form-control" placeholder="Password">
                                  </div>
                                  <div class="mrg-top-20 text-right"> 
                                     <button type="submit" name="submit" class="btn btn-info">Login</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url() ?>assets/js/vendor.js"></script>

    <script src="<?php echo base_url() ?>assets/js/app.min.js"></script>

    <!-- page js -->
</body>
</html>