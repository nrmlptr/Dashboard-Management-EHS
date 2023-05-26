<!-- page content onload="startTime()"-->
    <body>
        <div class="right_col" role="main">
            <!-- CARD UNTUK PEMBUATAN ASAM -->
                <hr>
                <h3>Grafik Laporan Pembuatan Asam</h3>
                <hr>
                <div class="row">
                    <!-- kotak untuk grafik pembuatan asam -->
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <figure class="highcharts-figure">
                                    <div>
                                    <div id="grafik-hasil-asam"></div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <!-- kotak buat grafik asam recycle -->
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <figure class="highcharts-figure">
                                    <div id="grafik-asam-recycle"></div>
                                </figure>
                            </div>
                        </div>
                    </div>  
                </div>
            <!-- /CARD UNTUK PEMBUATAN ASAM -->
        </div>

        <!-- script -->
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

            <!-- =======================================================GRAFIK PEMBUATAN ASAM ============================================================== -->
            <!--====== GRAFIK PEMBUATAN ASAM =========================================================================== -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($qty = 1; $qty  <= $total_days; $qty++) {
                                echo "$qty, ";
                            }
                        ?>
                    ];

                    var charRC = Highcharts.chart('grafik-hasil-asam', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pembuatan Asam (Bulan - <?php echo date('F'); ?>)'
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
                                text: 'QTY Asam'
                            },
                            min: 0,
                            max: 50,
                            tickInterval: 5, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Asam 1400',
                                    color: 'purple',
                                    data: <?=json_encode($qty_asam_1400)?>
                                }, {
                                    name: 'Asam 1310',
                                    color: 'blue',
                                    data: <?=json_encode($qty_asam_1310)?>
                                }, {
                                    name: 'Asam 1160',
                                    color: 'red',
                                    data: <?=json_encode($qty_asam_1160)?>
                                },{
                                    name: 'Asam 1260',
                                    color: 'grey',
                                    data: <?=json_encode($qty_asam_1260)?>
                                }, {
                                    name: 'Asam 1220',
                                    color: 'yellow',
                                    data: <?=json_encode($qty_asam_1220)?>
                                }, {
                                    name: 'Asam 1350HP',
                                    color: 'black',
                                    data: <?=json_encode($qty_asam_1350HP)?>
                                },{
                                    name: 'Asam 1400HP',
                                    color: 'green',
                                    data: <?=json_encode($qty_asam_1400HP)?>
                                ,}]
                    });
                });
            </script>
            <!--====== GRAFIK ASAM RECYCLE =========================================================================== -->
            <script type="text/javascript">

                $(document).ready(function() {

                    var categories = [
                        <?php 
                            $start_date = date('Y-m-01'); // Mengambil tanggal awal bulan ini
                            $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
                            $total_days = date('j', strtotime($end_date)); // Menghitung jumlah hari dalam bulan ini

                            for ($rc = 1; $rc  <= $total_days; $rc++) {
                                echo "$rc, ";
                            }
                        ?>
                    ];

                    var charRC = Highcharts.chart('grafik-asam-recycle', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Pemakaian Asam Recycle (Bulan - <?php echo date('F'); ?>)'
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
                                text: 'Value Asam Recycle'
                            },
                            min: 0,
                            max: 20,
                            tickInterval: 1, // Menentukan jarak antara setiap nilai
                        },
                        plotOptions: {
                            column: {
                                stacking: 'normal'
                            }
                        },
                        series: [{
                                    name: 'Asam 1400',
                                    color: 'purple',
                                    data: <?=json_encode($data_asam_1400)?>
                                }, {
                                    name: 'Asam 1310',
                                    color: 'blue',
                                    data: <?=json_encode($data_asam_1310)?>
                                }, {
                                    name: 'Asam 1160',
                                    color: 'red',
                                    data: <?=json_encode($data_asam_1160)?>
                                },{
                                    name: 'Asam 1260',
                                    color: 'grey',
                                    data: <?=json_encode($data_asam_1260)?>
                                }, {
                                    name: 'Asam 1220',
                                    color: 'yellow',
                                    data: <?=json_encode($data_asam_1220)?>
                                }, {
                                    name: 'Asam 1350HP',
                                    color: 'black',
                                    data: <?=json_encode($data_asam_1350HP)?>
                                },{
                                    name: 'Asam 1400HP',
                                    color: 'green',
                                    data: <?=json_encode($data_asam_1400HP)?>
                                ,}]
                    });
                });
            </script>
        <!-- /script -->

    </body>
<!-- /page content -->




















    