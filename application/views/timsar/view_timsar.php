<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Evon | Evakuasi Online</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="<?php echo base_url(); ?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- INI ADALAH HEADER -->
<?php if (isset($_SESSION['message'])) { ?>
  <div class="alert alert-message" role="alert">
    <h3 class="text-center"><?php echo $_SESSION['message']; ?></h3>
  </div>
  <?php
} ?>
 <div class="wrapper">
            <div class="sidebar" data-color="blue" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">
                <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    
            Tip 2: you can also add an image using data-image tag
                -->
                <div class="logo">
                    <a href="#" class="simple-text">
                        Evakuasi Online
                    </a>
                </div>
                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li>
                            <?php //echo anchor('welcome','<i class="material-icons"> Dashboard');?>

                            <a href="<?php echo base_url().'index.php/web_controller/web' ?>">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'index.php/korban_controller/datakorban' ?>">
                                <i class="material-icons">person</i>
                                <p>Data Korban</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'index.php/rs_controller/datars' ?>">
                                <i class="material-icons">content_paste</i>
                                <p>Data Rumah Sakit</p>
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo base_url().'index.php/posko_controller/datapsk' ?>">
                                <i class="material-icons">unarchive</i>
                                <p>Data Posko</p>
                            </a>
                        </li>
                         <li>
                            <a href="<?php echo base_url().'index.php/timsar_controller/datatimsar' ?>">
                                <i class="material-icons">account_box</i>
                                <p>Tim Sar</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse">
                        </div>
                    </div>
                </nav>
                <br><br><br><br>
 
 
 <!-- INI ADALAH TAMPILAN MENU UTAMA -->


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">Data Tim SAR</h4>
                        <a href="<?php echo site_url('timsar_controller/input_timsar') ?>" class="btn btn-success pull-right">Tambah Data</a>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Tim SAR</th>
                                    <th style="text-align: center;">Nomor Telepon</th>
                                    <th style="text-align: center;">Opsi</th>
                                </tr>
                                 <?php
                                    $no=1; 
                                    foreach($hasil as $r){ ?>
                                    <tr style="text-align: center;">
                                      <td><?php echo $no++ ?></td>
                                      <td><?php echo $r['nama_timsar'] ?></td>
                                      <td><?php echo $r['no_hp'] ?></td>
                                      <td>
                                        <a href="<?php echo site_url('timsar_controller/edit_timsar/'.$r['id_timsar']) ?>">Edit</a> <br>
                                        <a href="<?php echo site_url('timsar_controller/delete/'.$r['id_timsar']) ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                                      </td>
                                    </tr> 
                                  <?php } ?>
                            </thead>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
  <!--  Charts Plugin -->
  <script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>
  <!--  Dynamic Elements plugin -->
  <script src="<?php echo base_url(); ?>assets/js/arrive.min.js"></script>
  <!--  PerfectScrollbar Library -->
  <script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
  <!-- Material Dashboard javascript methods -->
  <script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
        if ($('.main-panel > .content').length == 0) {
            $('.main-panel').css('height', '100%');
        }


        // Javascript method's body can be found in assets/js/demos.js
        demo.initGoogleMaps();
    });
  </script>

  </body>
</html>