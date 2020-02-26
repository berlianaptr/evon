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
                        <h4 class="title">Data Posko</h4>
                        <a href="<?php echo site_url('posko_controller/input_posko') ?>" class="btn btn-success pull-right">Tambah Data</a>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                          <?php 
 $koneksi     = mysqli_connect("localhost", "root", "", "evon");
$posko = mysqli_query($koneksi, "SELECT nama_posko FROM posko");
$ketersediaan = mysqli_query($koneksi, "SELECT ketersediaan_posko FROM posko");
 ?>
 <html>
    <head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
 
        <style type="text/css">
            .container {
                width: 30%;
                margin: 15px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($b = mysqli_fetch_array($posko)) { echo '"' . $b['nama_posko'] . '",';}?>],
                    datasets: [{
                            label: 'Kuota',
                            data: [<?php while ($p = mysqli_fetch_array($ketersediaan)) { echo '"' . $p['ketersediaan_posko'] . '",';}?>],
                            backgroundColor: [
                                'rgba(255, 99, 150, 2)',
                                'rgba(54, 162, 200, 2)',
                                'rgba(255, 206, 140, 2)',
                                'rgba(75, 92, 192, 2)',
                                'rgba(153, 102, 255, 2)',
                                'rgba(255, 159, 64, 2)',
                                'rgba(255, 99, 132, 2)',
                                'rgba(54, 162, 235, 2)',
                                'rgba(255, 206, 86, 2)',
                                'rgba(75, 192, 192, 2)',
                                'rgba(153, 102, 255, 2)',
                                'rgba(255, 159, 64, 2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html
                            <thead class="text-primary">
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama Posko</th>
                                    <th style="text-align: center;">Alamat Posko</th>
                                    <th style="text-align: center;">Kuota Posko</th>
                                    <th style="text-align: center;">Opsi</th>
                                </tr>
                                <?php
                                $no=1; 
                                foreach($hasil as $r){ ?>
                                <tr style="text-align: center;">
                                  <td><?php echo $no++ ?></td>
                                  <td><?php echo $r->nama_posko ?></td>
                                  <td><?php echo $r->alamat_posko; ?></td>
                                  <td><?php echo $r->ketersediaan_posko; ?></td>
                                  <td>
                                    <a href="<?php echo site_url('posko_controller/edit_posko/'.$r->id_posko) ?>">Edit</a> <br>
                                    <a href="<?php echo site_url('posko_controller/delete/'.$r->id_posko) ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
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