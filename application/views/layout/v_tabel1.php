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
                                    <!-- <h3>General</h3> -->
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
                        <!-- CARD UNTUK STOK ASAM 1400 & 1310 -->
                        <hr>
                        <h1 style="text-align: center;">Display Stok Asam</h1>
                        <hr>
                        <div class="row">
                            <!-- kotak untuk STOK ASAM 1400 -->
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1400</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $start_asam1400 = date('d-m-Y');
                                                    // $today_found = false;
                                                    $tanggal = date('01-m-Y');
                                                    foreach ($stok_asam1400_shift_1 as $index => $stok_shift_1) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $tanggal ?></td>
                                                            <td><?= $stok_shift_1 ?></td>
                                                            <td><?= $stok_asam1400_shift_2[$index] ?></td>
                                                            <td><?= $stok_asam1400_shift_3[$index] ?></td>
                                                        </tr>
                                                    <?php
                                                        $tanggal = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <!-- kotak untuk STOK ASAM 1310 -->
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1310</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1310" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $start_asam1310 = date('d-m-Y');
                                                    $tanggal_asam1310 = date('01-m-Y');
                                                    foreach($stok_asam1310_shift_1 as $row => $stok_1310_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1310?></td>
                                                        <td><?= $stok_1310_shift1?></td>
                                                        <td><?= $stok_asam1310_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1310_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1310 = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1310)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>

                        <!-- CARD UNTUK STOK ASAM 1220 & 1350 MCB -->
                        <div class="row">
                            <!-- kotak untuk STOK ASAM 1220 -->
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1220</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1220" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $start_asam1220 = date('d-m-Y');
                                                    $tanggal_asam1220 = date('01-m-Y');
                                                    foreach($stok_asam1220_shift_1 as $row => $stok_1220_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1220?></td>
                                                        <td><?= $stok_1220_shift1?></td>
                                                        <td><?= $stok_asam1220_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1220_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1220 = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1220)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- kotak untuk STOK ASAM 1350 MCB -->
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1350 MCB</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1350MCB" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1350MCB      = date('d-m-Y');
                                                        $tanggal_asam1350MCB    = date('01-m-Y');
                                                        foreach($stok_asam1350MCB_shift_1 as $row => $stok_1350MCB_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1350MCB?></td>
                                                        <td><?= $stok_1350MCB_shift1?></td>
                                                        <td><?= $stok_asam1350MCB_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1350MCB_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1350MCB = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1350MCB)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>     

                        <!-- CARD UNTUK STOK ASAM 1400MCB & 1310A -->
                        <div class="row">
                            <!-- kotak untuk STOK ASAM 1400 MCB-->
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1400 MCB</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1400MCB" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1400MCB      = date('d-m-Y');
                                                        $tanggal_asam1400MCB    = date('01-m-Y');
                                                        foreach($stok_asam1400MCB_shift_1 as $row => $stok_1400MCB_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1400MCB?></td>
                                                        <td><?= $stok_1400MCB_shift1?></td>
                                                        <td><?= $stok_asam1400MCB_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1400MCB_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1400MCB = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1400MCB)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- kotak untuk STOK ASAM 1310 - WET BATTERY A -->
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1310 - WET BATTERY A</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1310A" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1310A      = date('d-m-Y');
                                                        $tanggal_asam1310A    = date('01-m-Y');
                                                        foreach($stok_asam1310A_shift_1 as $row => $stok_1310A_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1310A?></td>
                                                        <td><?= $stok_1310A_shift1?></td>
                                                        <td><?= $stok_asam1310A_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1310A_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1310A = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1310A)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                        </div> 

                        <!-- CARD UNTUK STOK ASAM 1220A & 1310F -->
                        <div class="row">
                            <!-- kotak untuk STOK ASAM 1220 - WET BATTERY A -->
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1220 - WET BATTERY A</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1220A" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1220A      = date('d-m-Y');
                                                        $tanggal_asam1220A    = date('01-m-Y');
                                                        foreach($stok_asam1220A_shift_1 as $row => $stok_1220A_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1220A?></td>
                                                        <td><?= $stok_1220A_shift1?></td>
                                                        <td><?= $stok_asam1220A_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1220A_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1220A = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1220A)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- kotak buat STOK ASAM 1310 - WET BATTERY F-->
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1310 - WET BATTERY F</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1310F" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1310F      = date('d-m-Y');
                                                        $tanggal_asam1310F    = date('01-m-Y');
                                                        foreach($stok_asam1310F_shift_1 as $row => $stok_1310F_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1310F?></td>
                                                        <td><?= $stok_1310F_shift1?></td>
                                                        <td><?= $stok_asam1310F_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1310F_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1310F = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1310F)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CARD STOK ASAM WET BATTERY F - 1160 & 1260 -->
                        <div class="row">
                            <!-- kotak untuk STOK ASAM 1160 - WET BATTERY F -->
                            <div class="col-md-6 col-sm-6">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1160 - WET BATTERY F</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1160F" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1160F      = date('d-m-Y');
                                                        $tanggal_asam1160F    = date('01-m-Y');
                                                        foreach($stok_asam1160F_shift_1 as $row => $stok_1160F_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1160F?></td>
                                                        <td><?= $stok_1160F_shift1?></td>
                                                        <td><?= $stok_asam1160F_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1160F_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1160F = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1160F)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- kotak untuk STOK ASAM 1260 - WET BATTERY F-->
                            <div class="col-md-6 col-sm-6  ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <div class="card-box table-responsive">
                                            <h5 align="center">Jumlah Stok Asam 1260 - WET BATTERY F</h5>
                                            <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                            <hr>
                                            <table id="data_stok_asam1260F" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr align="center">
                                                        <th>Tanggal</th>
                                                        <th>Shift 1<br>
                                                            <small style="color: black;"><b>Jam : 16:00</b></small>
                                                        </th>
                                                        <th>Shift 2<br>
                                                            <small style="color: black;"><b>Jam : 00:00</b></small>
                                                        </th>
                                                        <th>Shift 3<br>
                                                            <small style="color: black;"><b>Jam : 07:00</b></small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $start_asam1260F      = date('d-m-Y');
                                                        $tanggal_asam1260F    = date('01-m-Y');
                                                        foreach($stok_asam1260F_shift_1 as $row => $stok_1260F_shift1){
                                                    ?>
                                                    <tr>
                                                        <td><?= $tanggal_asam1260F?></td>
                                                        <td><?= $stok_1260F_shift1?></td>
                                                        <td><?= $stok_asam1260F_shift_2[$row]?></td>
                                                        <td><?= $stok_asam1260F_shift_3[$row]?></td>
                                                    </tr>
                                                    <?php 
                                                        $tanggal_asam1260F = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1260F)));
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                <!-- /page content -->
                
            </div>
        </div>

        <!-- SCRIPT -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>
            <!-- ================================================= SCRIPT TABLE STOK ASAM ================================================================= -->
            <script type="text/javascript">
                // stok asam 1400 =============================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1310 =============================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1310').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1220 =============================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1220').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1350 MCB ========================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1350MCB').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                // stok asam 1400 MCB ========================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1400MCB').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1310 WET BATTERY A =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1310A').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1220 WET BATTERY A =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1220A').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1310 WET BATTERY F =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1310F').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                // stok asam 1160 WET BATTERY F =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1160F').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                // stok asam 1260 WET BATTERY F =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1260F').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })
            </script>
        <!-- /SCRIPT -->

    </body>

</html>


















    