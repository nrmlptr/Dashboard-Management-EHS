<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= base_url('assets/gentelella-master/')?>production/images/k3logo.ico" type="image/ico" />

        <title>EHS System | Dashboard</title>

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

                        <!-- CARD UNTUK PROSES WWT -->
                            <h3>Grafik Proses WWT</h3>
                            <hr>
                            <div class="row">
                                <!-- kotak buat grafik tangki netralisasi -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafiknetral"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>  
                                <!-- kotak untuk grafik tangki outlet wwt -->
                                <div class="col-md-6 col-sm-6  ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div>
                                                <div id="grafikoutlet"></div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                        <!-- /CARD UNTUK PROSES WWT -->

                        <hr>

                        <!-- CARD UNTUK PEMAKAIAN CHEMICAL -->
                            <h3>Grafik Pemakaian Chemical</h3>
                            <div class="row">
                                <!-- kotak buat grafik KOSTK SODA WWT-->
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-kostik-wwt"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD UNTUK MIXBED & DEMIN -->
                            <div class="row">
                                <!-- kotak untuk grafik KOSTIK SODA REGENERASI MIXBED -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-kostik-mixbed"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- kotak buat grafik KOSTIK SODA REGENERASI DEMIN 2-->
                                <div class="col-md-6 col-sm-6  ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-kostik-demin2"></div>
                                            </figure>
                                        </div> 
                                    </div>
                                </div>
                            </div>     

                            <!-- CARD UNTUK FECL3 & ASAM PEKAT -->
                            <div class="row"> 
                                <!-- kotak untuk grafik Asam Pekat -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-asam-pekat"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div> 
                                <!-- kotak buat grafik fecl3-->
                                <div class="col-md-6 col-sm-6  ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-fecl3"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>      
                            </div> 

                            <!-- CARD UNTUK hcl wwt & FeCl3 -->
                            <div class="row">
                                <!-- kotak untuk grafik kuriflok -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-kuriflok"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- kotak untuk grafik hcl wwt -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-hcl-wwt"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD UNTUK HCL DEMIN & MIXBED -->
                            <div class="row">
                                <!-- kotak buat grafik hcl mixbed-->
                                <div class="col-md-6 col-sm-6  ">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-hcl-mixbed"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <!-- kotak untuk grafik hcl demin -->
                                <div class="col-md-6 col-sm-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <figure class="highcharts-figure">
                                                <div id="grafik-hcl-demin"></div>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <!-- /CARD UNTUK PEMAKAIAN CHEMICAL -->
                        
                    </div>
                <!-- /page content -->
            </div>
        </div>

        <!-- ========================================================= SCRIPT =================================================================== -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>
            <!-- ===SCRIPT GRAFIK PH NETRALISASI PROSES WWT========================================================================================== -->
            <script type="text/javascript">
                <?php
                    $labels         = array();
                    $values         = array();
                    $current_month  = date('m');
                    $days_in_month  = date('t'); // Mengambil jumlah hari dalam bulan saat ini

                    for ($day = 1; $day <= $days_in_month; $day++) {
                        $date       = date('Y-m') . '-' . str_pad($day, 2, '0', STR_PAD_LEFT); // Format tanggal YYYY-MM-DD
                        $labels[]   = date('d', strtotime($date));
                        $values[]   = 0; // Mengisi nilai awal dengan 0 (jika diperlukan)
                    }

                    foreach ($tangki_netralisasi as $tanggal => $value ) {
                        if (date('m', strtotime($tanggal)) == $current_month) {
                            $day                = date('d', strtotime($tanggal));
                            $values[$day - 1]   = floatval($value); // Menggunakan indeks 0-based
                        }
                    }
                    // var_dump($tangki_netralisasi);die;
                ?>

                $(document).ready(function() {
                    var data        = <?php echo json_encode($values); ?>;
                    var categories  = <?php echo json_encode($labels); ?>;
                    Highcharts.chart('grafiknetral', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Grafik Utama PH Tangki Netralisasi Proses WWT <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        xAxis: {
                            title: {
                                text: 'Tanggal'
                            },
                            categories: categories
                        },
                        yAxis: {
                            title: {
                                text: 'Value PH'
                            },
                            min: 0, // Set the minimum value to 0
                            max: 14, // Set the maximum value to 14
                            tickInterval: 1, // Menentukan jarak antara setiap nilai
                            plotLines: [
                                {
                                    color: 'red',
                                    dashStyle: 'solid',
                                    value: 9, // Batas maksimum untuk Shift 1
                                    width: 2,
                                    label: {
                                        text: 'Batas Maksimum PH'
                                    }
                                },
                                {
                                    color: 'green',
                                    dashStyle: 'solid',
                                    value: 5, // Batas maksimum untuk Shift 1
                                    width: 2,
                                    label: {
                                        text: 'Batas Minimum PH'
                                    }
                                }
                            ]
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: true
                            }
                        },
                        plotOptions: {
                            series: {
                                point: {
                                    events: {
                                        click: function() {
                                            var tanggal = this.category+'-<?=date('m-Y')?>';
                                            // console.log(tanggal);
                                            window.location.href = '<?php echo base_url("Layout/detail/") ?>' + tanggal;
                                        }
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Average PH Netralisasi',
                            data: <?=json_encode($tangki_netralisasi)?>
                        }],
                        tooltip: {
                        }
                    });
                });
                
            </script>

            <!-- ===SCRIPT GRAFIK PH OUTLET PROSES WWT=============================================================================================== -->
            <script type="text/javascript">
                <?php
                    $labels         = array();
                    $values         = array();
                    $current_month  = date('m');
                    $days_in_month  = date('t'); // Mengambil jumlah hari dalam bulan saat ini

                    for ($day = 1; $day <= $days_in_month; $day++) {
                        $date       = date('Y-m') . '-' . str_pad($day, 2, '0', STR_PAD_LEFT); // Format tanggal YYYY-MM-DD
                        $labels[]   = date('d', strtotime($date));
                        $values[]   = 0; // Mengisi nilai awal dengan 0 (jika diperlukan)
                    }

                    foreach ($tangki_outlet as $tanggal => $value ) {
                        if (date('m', strtotime($tanggal)) == $current_month) {
                            $day                = date('d', strtotime($tanggal));
                            $values[$day - 1]   = floatval($value); // Menggunakan indeks 0-based
                        }
                    }

                    // var_dump($tangki_outlet);die;
                ?>

                $(document).ready(function() {

                    var data        = <?php echo json_encode($values); ?>;
                    var categories  = <?php echo json_encode($labels); ?>;
                    Highcharts.chart('grafikoutlet', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Grafik Utama PH Tangki Outlet Proses WWT <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        xAxis: {
                            title: {
                                text: 'Tanggal'
                            },
                            categories: categories
                        },
                        yAxis: {
                            title: {
                                text: 'Value PH'
                            },
                            min: 0, // Set the minimum value to 0
                            max: 14, // Set the maximum value to 14
                            tickInterval: 1, // Menentukan jarak antara setiap nilai
                            plotLines: [
                                {
                                    color: 'red',
                                    dashStyle: 'solid',
                                    value: 9, // Batas maksimum untuk Shift 1
                                    width: 2,
                                    label: {
                                        text: 'Batas Maksimum PH'
                                    }
                                },
                                {
                                    color: 'green',
                                    dashStyle: 'solid',
                                    value: 5, // Batas maksimum untuk Shift 1
                                    width: 2,
                                    label: {
                                        text: 'Batas Minimum PH'
                                    }
                                }
                            ]
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: true
                            }
                        },
                        plotOptions: {
                            series: {
                                point: {
                                    events: {
                                        click: function() {
                                            var tanggal = this.category+'-<?=date('m-Y')?>';
                                            // console.log(tanggal);
                                            window.location.href = '<?php echo base_url("Layout/detailOutlet/") ?>' + tanggal;
                                        }
                                    }
                                }
                            }
                        },
                        series: [{
                            name: 'Average PH Outlet',
                            data: <?=json_encode($tangki_outlet)?>,
                            color: 'green'
                        }],
                        tooltip: {
                        }
                    });
                }); 
            </script>

            <!-- =======================================================GRAFIK PEMAKAIAN CHEMICAL==================================================== -->
            <!--====== GRAFIK KOSTIK SODA PROSES WWT=========================================================================== -->
            <script type="text/javascript">
                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($kw = 1; $kw <= $total_days; $kw++) {
                                echo "$kw, ";
                            }
                        ?>
                    ];

                    var chartWWT = Highcharts.chart('grafik-kostik-wwt', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian Kostik Soda WWT (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan kg',
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
                                text: 'Value Kostik Soda WWT'
                            },
                            min: 0,
                            max: 4000,
                            tickInterval: 500, // Menentukan jarak antara setiap nilai
                            plotLines: [
                                {
                                    color: 'red',
                                    dashStyle: 'solid',
                                    value: <?=(!empty($max_kostikwwt)) ? $max_kostikwwt[0]['max_kostik'] : 0?>, // Batas maksimum 
                                    width: 2,
                                    label: {
                                        text: 'Batas Maksimum Pemakaian'
                                    }
                                }
                            ]
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_koswwt_shift_1)?>
                                }, {
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_koswwt_shift_2)?>
                                }, {
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_koswwt_shift_3)?>
                                }]
                    });
                });
            </script>

            <!--====== GRAFIK KOSTIK SODA REGENERASI MIXBED==================================================================== -->
            <script type="text/javascript">
                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($i = 1; $i <= $total_days; $i++) {
                                echo "$i, ";
                            }
                        ?>
                    ];

                    var chartMixbed = Highcharts.chart('grafik-kostik-mixbed', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian Kostik Soda Regenerasi Mixbed <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan kg',
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
                                text: 'Value Kostik Soda Mixbed'
                            },
                            min: 0,
                            max: 1000,
                            tickInterval: 100, // Menentukan jarak antara setiap nilai
                            plotLines: [
                                {
                                    color: 'red',
                                    dashStyle: 'solid',
                                    value: <?=(!empty($max_kostikmixbed)) ? $max_kostikmixbed[0]['max_kostikmixbed'] : 0?>, // Batas maksimum untuk Shift 1
                                    width: 2,
                                    label: {
                                        text: 'Batas Maksimum Pemakaian'
                                    }
                                }
                            ]
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_kosmik_shift_1)?>
                                }, {
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_kosmik_shift_2)?>
                                }, {
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_kosmik_shift_3)?>
                                }]
                    });
                });
            </script>

            <!--====== GRAFIK KOSTIK SODA REGENERASI DEMIN 2==================================================================== -->
            <script type="text/javascript">

                $(document).ready(function() {
                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($i = 1; $i <= $total_days; $i++) {
                                echo "$i, ";
                            }
                        ?>
                    ];

                    var chartKosdem = Highcharts.chart('grafik-kostik-demin2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian Kostik Soda Regenerasi Demin 2 <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan kg',
                        },
                        xAxis: {
                            title: {
                                text: 'Tanggal'
                            },
                            categories: categories // Menggunakan array categories yang telah dibuat sebelumnya
                        },
                        yAxis: {
                            title: {
                                text: 'Value Kostik Soda Demin 2'
                            },
                            min: 0,
                            max: 1000,
                            tickInterval: 100, // Menentukan jarak antara setiap nilai
                            plotLines: [
                                {
                                    color: 'red',
                                    dashStyle: 'solid',
                                    value: <?=(!empty($max_kostikdemin)) ? $max_kostikdemin[0]['max_kostikdemin'] : 0?>, // Batas maksimum 
                                    width: 2,
                                    label: {
                                        text: 'Batas Maksimum Pemakaian'
                                    }
                                }
                            ]
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_kosdem_shift_1)?>
                                }, {
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_kosdem_shift_2)?>
                                }, {
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_kosdem_shift_3)?>
                                }]
                    });
                });
            </script>

            <!--====== GRAFIK ASAM PEKAT ======================================================================================= -->
            <script type="text/javascript">

                $(document).ready(function() {
                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($w = 1; $w <= $total_days; $w++) {
                                echo "$w, ";
                            }

                            // Menyimpan data ke dalam variabel JavaScript
                        
                        ?>
                    ];

                    var data_asam_shift_1 = <?=json_encode(array_values($data_asam_shift_1)) ?>;
                    var data_asam_shift_2 = <?=json_encode(array_values($data_asam_shift_2)) ?>;
                    var data_asam_shift_3 = <?=json_encode(array_values($data_asam_shift_3)) ?>;

                    // Gunakan data dalam script JavaScript
                    var series = [
                        {
                            name: 'Shift 1',
                            data: data_asam_shift_1
                        },
                        {
                            name: 'Shift 2',
                            data: data_asam_shift_2
                        },
                        {
                            name: 'Shift 3',
                            data: data_asam_shift_3
                        }
                    ];

                    Highcharts.chart('grafik-asam-pekat', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian Asam Pekat (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan Ton',
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
                                text: 'Value Asam Pekat'
                            },
                            min: 0,
                            max: 15,
                            tickInterval: 1, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: series
                    });
                });
            </script>

            <!--====== GRAFIK HCL WWT ========================================================================================== -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($hclw = 1; $hclw <= $total_days; $hclw++) {
                                echo "$hclw, ";
                            }
                        ?>
                    ];

                    var chartHCLW = Highcharts.chart('grafik-hcl-wwt', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian HCL Proses WWT (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan liter',
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
                                text: 'Value HCL WWT'
                            },
                            min: 0,
                            max: 500,
                            tickInterval: 50, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_hclwwt_shift_1)?>
                                }, {
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_hclwwt_shift_2)?>
                                }, {
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_hclwwt_shift_3)?>
                                }]
                    });
                });

            </script>

            <!--====== GRAFIK HCL MIXBED ======================================================================================= -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($hclm = 1; $hclm <= $total_days; $hclm++) {
                                echo "$hclm, ";
                            }
                        ?>
                    ];

                    var chartHCLM = Highcharts.chart('grafik-hcl-mixbed', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian HCL Proses Regenerasi Mixbed <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan liter',
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
                                text: 'Value HCL Mixbed'
                            },
                            min: 0,
                            max: 100,
                            tickInterval: 10, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_hclmixbed_shift_1)?>
                                }, {
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_hclmixbed_shift_2)?>
                                }, {
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_hclmixbed_shift_3)?>
                                }]
                    });
                });
            </script>

            <!--====== GRAFIK HCL DEMIN ======================================================================================== -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($hcld = 1; $hcld <= $total_days; $hcld++) {
                                echo "$hcld, ";
                            }
                        ?>
                    ];

                    var chartHCLD = Highcharts.chart('grafik-hcl-demin', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian HCL Proses Regenerasi Demin 2 <br> (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan liter',
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
                                text: 'Value HCL Demin 2'
                            },
                            min: 0,
                            max: 500,
                            tickInterval: 50, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_hcldemin_shift_1)?>
                                }, {
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_hcldemin_shift_2)?>
                                }, {
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_hcldemin_shift_3)?>
                                }]
                    });
                });
            </script>

            <!--====== GRAFIK FECL3 ============================================================================================ -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($fe = 1; $fe <= $total_days; $fe++) {
                                echo "$fe, ";
                            }
                        ?>
                    ];

                    var chartFECL = Highcharts.chart('grafik-fecl3', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian FeCl3 (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan kg',
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
                                text: 'Value FeCl3'
                            },
                            min: 0,
                            max: 15,
                            tickInterval: 1, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_fecl_shift_1)?>
                                },{
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_fecl_shift_2)?>
                                },{
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_fecl_shift_3)?>
                                }]
                    });
                });

            </script>

            <!--====== GRAFIK KURIFLOK ========================================================================================= -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($kr = 1; $kr <= $total_days; $kr++) {
                                echo "$kr, ";
                            }
                        ?>
                    ];

                    var chartKR = Highcharts.chart('grafik-kuriflok', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian Kuriflok (Bulan - <?php echo date('F'); ?>)'
                        },
                        subtitle: {
                            text: 'Grafik dalam satuan kg',
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
                                text: 'Value Kuriflok'
                            },
                            min: 0,
                            max: 10,
                            tickInterval: 1, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Shift 1',
                                    data: <?=json_encode($data_kuri_shift_1)?>
                                },{
                                    name: 'Shift 2',
                                    data: <?=json_encode($data_kuri_shift_2)?>
                                },{
                                    name: 'Shift 3',
                                    data: <?=json_encode($data_kuri_shift_3)?>
                                }]
                    });
                });
            </script>
        <!-- ========================================================= /SCRIPT =================================================================== -->

    </body>
</html>