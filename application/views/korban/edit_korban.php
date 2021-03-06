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
                            <ul class="nav navbar-nav navbar-right">
                        </div>
                    </div>
                </nav>
                <br><br><br><br>
 
 
 
 <!-- INI ADALAH TAMPILAN MENU UTAMA -->
     <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                         <div class="card">
                            <div class="card-header" data-background-color="blue">
                                <h4 class="title">Ubah Data Korban</h4>
                            </div>
                            <div class="card-content">
                              <?php if($dataEdit) {
                                $id = $dataEdit->id_korban;
                                $id_timsar = $dataEdit->id_timsar;
                                $id_jenis = $dataEdit->id_jenis;
                                $jumlah_korban = $dataEdit->jumlah_korban;
                                $lokasi_korban = $dataEdit->lokasi_korban;
                                $tanggal_korban = $dataEdit->tanggal_korban;
                                } else {
                                $id_timsar = "";
                                $id_jenis = "";
                                $jumlah_korban = "";
                                $lokasi_korban = "";
                                $tanggal_korban = "";
                              } ?>
                            <form action="<?php echo site_url('korban_controller/update/'. $id) ?>" method="POST">
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group label-floating is-empty">
                                    <label for="tim_sar">Nama Tim SAR</label>
                                     <select class="form-control" name="id_timsar" id="tim_sar">
                                        <?php foreach($tambah_timsar as $t): ?>
                                          <option value="<?php echo $t->id_timsar ?>"><?php echo $t->nama_timsar ?></option>
                                        <?php endforeach; ?>

                                        </select>
                                    <!--<input type="text" class="form-control" name="id_timsar" value="<?php echo $id_timsar ?>"/>-->
                                    <span class="material-input"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                     <label for="jenis_korban"> Status Korban </label>
                                     <!--<select class="form-control" name="id_jenis" id="jenis_korban" disabled="true"> -->
                                      <select class="form-control" name="id_jenis" id="jenis_korban" disabled="true">
                                        <?php foreach($tambah_jenis as $t): ?>
                                          <option value="<?php echo $t->id_jenis ?>"><?php echo $t->nama_jenis ?></option>
                                        <?php endforeach; ?>

                                        </select>
                                        <!--<input type="text" class="form-control" name="id_jenis"value="<?php echo $id_jenis ?>" /> -->
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group label-floating is-empty">
                                    <label for="jumlah_korban">Jumlah Korban</label>
                                    <input type="text" class="form-control" name="jumlah_korban"value="<?php echo $jumlah_korban ?>" />
                                    <span class="material-input"></span>
                                  </div>                          
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group label-floating is-empty">
                                    <label for="lokasi_korban">Lokasi Ditemukan</label>
                                    <input type="text" class="form-control" name="lokasi_korban" value="<?php echo $lokasi_korban ?>"/>
                                    <span class="material-input"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="tanggal_korban">Tanggal Ditemukan</label>
                                    <input type="date" class="form-control" name="tanggal_korban" value="<?php echo $tanggal_korban ?>"/>
                                  </div>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                          </form>
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