<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= base_url('assets/gentelella-master/')?>production/images/k3logo.ico" type="image/ico" />

        <title>Grafik Counter Air</title>

        <link rel="shortcut icon" href="<?= base_url('assets/gentelella-master/')?>images/k3logo.ico" />

        <!-- Bootstrap -->
        <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
        
        <!-- bootstrap-progressbar -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Highchart -->
        <!-- <script src="<?= base_url('assets/highcharts')?>/code/highcharts.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code//modules/series-label.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/exporting.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/export-data.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/accessibility.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/data.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/highcharts-3d.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/cylinder.js"></script> -->
        

        <!-- Datatables --> 
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url('assets/gentelella-master/')?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css"> -->

        <!-- Sweet Alert  -->
        <script src="<?php echo base_url('assets/gentelella-master/');?>src/js/sweetalert2.all.min.js"></script>


        <!-- Custom Theme Style -->
        <link href="<?= base_url('assets/gentelella-master/')?>build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="nav-md">

        <div class="container body">

            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="" class="site_title"><i class="fa fa-plus-square"></i><span class="center">  Dashboard EHS</span></a>
                        </div>

                        <div class="clearfix"></div>
                        <br />

                        <!-- sidebar menu -->
                            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                                <div class="menu_section">
                                    <hr>
                                    <ul class="nav side-menu">
                                        <li><a href="<?= base_url('Layout/index');?>"><i class="fa fa-desktop"></i> Dashboard</a>
                                        </li>
                                        <li><a href="<?= base_url('Layout/WWTChemical');?>"><i class="fa fa-line-chart"></i> Proses WWT & Chemical</a>
                                        </li>
                                        <li><a href="<?= base_url('Layout/stokAsam');?>"><i class="fa fa-cubes"></i> Stok Asam</a>
                                        </li>
                                        <li><a href="<?= base_url('Layout/PembuatanAsam');?>"><i class="fa fa-area-chart"></i> Pembuatan Asam</a>
                                        </li>
                                        <li><a href="<?= base_url('Layout/counterAir');?>"><i class="fa fa-bar-chart"></i> Counter Air</a>
                                        </li>
                                        <li><a><i class="fa fa-link"></i>Portal Sistem<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="https://portal2.incoe.astra.co.id/iks-system/">Portal IKS</a></li>
                                                <li><a href="https://portal2.incoe.astra.co.id/sga-system/dashboard">Portal SGA</a></li>
                                                <li><a href="http://portal.incoe.astra.co.id/checksheet_apar/login">Portal DMS</a></li>
                                                <li><a href="https://portal2.incoe.astra.co.id/dms/login">Portal TKTD</a></li>
                                                <li><a href="https://portal2.incoe.astra.co.id/checksheet/login">Portal Checksheet Dinamis</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <!-- /sidebar menu -->

                    </div>
                </div>

                <!-- top navigation -->
                    <div class="top_nav">
                        <div class="nav_menu">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <nav class="nav navbar-nav">
                                <ul class=" navbar-right">
                                    <li class="nav-item dropdown open" style="padding-left: 15px;">
                                        <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                            <img src="<?= base_url('assets/gentelella-master/')?>production/images/k3logo.ico" alt="">
                                        </a>
                                        <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"  href="<?php echo base_url('Login/index');?>"><i class="fa fa-sign-out pull-right"></i> Log In</a>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                <!-- /top navigation -->

                <!-- page content -->
                    <div class="right_col" role="main">
                        <!-- CARD UNTUK LAPORAN HARIAN COUNTER AIR -->
                        <hr>
                        <h3>Grafik Laporan Counter Air</h3>
                        <hr>
                        <div class="row">
                            <!-- kotak buat grafik air murni untuk produksi -->
                            <div class="col-md-12 col-sm-12  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <figure class="highcharts-figure">
                                            <div id="grafik-airmurni-produksi"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <!-- kotak untuk grafik air murni proses acid dillution -->
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <figure class="highcharts-figure">
                                            <div id="grafik-airmurni-ad"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <!-- kotak buat grafik output limbah wwt -->
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <figure class="highcharts-figure">
                                            <div id="grafik-output-wwt"></div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                <!-- /page content -->
            </div>
        </div>

        <!-- ======================================================= SCRIPT ======================================================================= -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>
            <!-- ============================================================ GRAFIK COUNTER AIR  ============================================================== -->
            <!-- AIR MURNI UNTUK PRODUKSI =======================================================================================-->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($amp = 1; $amp <= $total_days; $amp++) {
                                echo "'$amp', ";
                            }
                        ?>
                    ];

                    var chartAMP = Highcharts.chart('grafik-airmurni-produksi', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Pemakaian Air Murni Proses Produksi <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan m3',
                            // align: 'left'
                        },
                        xAxis: {
                            title: {
                                text: 'Tanggal'
                            },
                            categories: categories
                        },
                        yAxis: {
                            title: {
                                text: 'Value Air Murni'
                            },
                            min: 0,
                            max: 300,
                            tickInterval: 25, // Menentukan jarak antara setiap nilai
                        },
                        series: [{
                            name: 'Nilai Air Murni',
                            color: 'red',
                            data: <?=json_encode($nilaiAkhir_AP)?>
                        }]
                    });
                });
            </script>

            <!-- AIR MURNI UNTUK ACID DILLUTION =================================================================================-->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($amad = 1; $amad <= $total_days; $amad++) {
                                echo "'$amad', ";
                            }
                        ?>
                    ];

                    var chartAMAD = Highcharts.chart('grafik-airmurni-ad', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Pemakaian Air Murni Proses Acid Dillution <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan m3',
                            // align: 'left'
                        },
                        xAxis: {
                            title: {
                                text: 'Tanggal'
                            },
                            categories: categories
                        },
                        yAxis: {
                            title: {
                                text: 'Value Air Murni'
                            },
                            min: -500,
                            max: 500,
                            tickInterval: 25, // Menentukan jarak antara setiap nilai
                        },
                        series: [{
                            name: 'Nilai Air Murni',
                            data: <?=json_encode($nilaiAkhir_AAD)?>
                        }]
                    });
                });
            </script>

            <!-- OUTPUT LIMBAH WWT  =============================================================================================-->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($olw = 1; $olw <= $total_days; $olw++) {
                                echo "'$olw', ";
                            }
                        ?>
                    ];

                    var chartOLW = Highcharts.chart('grafik-output-wwt', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Output Air Limbah WWT <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan m3',
                            // align: 'left'
                        },
                        xAxis: {
                            title: {
                                text: 'Tanggal'
                            },
                            categories: categories
                        },
                        yAxis: {
                            title: {
                                text: 'Value Output Air'
                            },
                            min: -1500,
                            max: 1500,
                            tickInterval: 250, // Menentukan jarak antara setiap nilai
                        },
                        series: [{
                            name: 'Nilai Output Limbah',
                            color: 'purple',
                            data: <?=json_encode($nilaiAkhir_OLW)?>
                        }]
                    });
                });
            </script>
        <!-- ======================================================= /SCRIPT ======================================================================= -->

    </body>
    
</html>