<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= base_url('assets/gentelella-master/')?>production/images/k3logo.ico" type="image/ico" />

        <title>Grafik Detail PH Tangki Netralisasi</title>

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
        <script src="<?= base_url('assets/highcharts')?>/code/modules/data.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code//modules/series-label.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/exporting.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/export-data.js"></script>
        <script src="<?= base_url('assets/highcharts')?>/code/modules/accessibility.js"></script>
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
                        <?php
                            $range_pengecekan   = ['07:30','09:30','11:30','13:30','15:30','16:30','18:30','20:30','22:30','00:30','02:30','04:30','06:30'];
                            $arr_value          = [];
                            
                            foreach ($range_pengecekan as $time) {
                                $found = false;
                                foreach ($detail_data as $item) {
                                    if ($item["waktu"] === $time) {
                                        $arr_value[] = $item["value"];
                                        $found       = true;
                                        break;
                                    }
                                }
                                if (!$found) {
                                    $arr_value[] = 0;
                                }
                            }
                        ?>
                        <div class="row">
                            <!-- kotak buat grafik detail ph tangki netralisasi -->
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <figure class="highcharts-figure">
                                            <div id="grafikdetail"></div>
                                        </figure>
                                        <a href="<?= base_url('Layout/WWTChemical/')?>" class="btn btn-secondary"><i class="glyphicon glyphicon-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /page content -->
            </div>
        </div>

        <!-- script -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>

            <!-- ========================================detail grafik ph tangki netralisasi================================================================ -->
            <!-- detail grafik ph tangki netralisasi -->
            <script>
                $(document).ready(function() {
                    Highcharts.chart('grafikdetail', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Grafik Detail Value PH Tangki Netralisasi Proses WWT'
                        },
                        xAxis: {
                            categories: <?=json_encode($range_pengecekan)?>,
                            title:{
                                text: 'Jam Pengecekan'
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Value PH'
                            },
                            min: 0, // Set the minimum value to 0
                            max: 14, // Set the maximum value to 14
                            tickInterval: 2 // Menentukan jarak antara setiap nilai
                        },
                        series: [{
                            name: 'Value PH Netralisasi',
                            data: <?=json_encode($arr_value)?>
                        }]
                    });
                });
            </script>
        <!-- /script -->
        
    </body>
</html>
