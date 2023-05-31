<!-- page content onload="startTime()" -->
    <body>
        <div class="right_col" role="main">
            <!-- CARD UNTUK LAPORAN HARIAN COUNTER AIR -->
                <hr>
                <h3>Grafik Laporan Counter Air</h3>
                <hr>
                <div class="row">
                    <!-- kotak buat grafik air murni untuk produksi -->
                    <div class="col-md-12 col-md-12  ">
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
                    <div class="col-md-12 col-md-12">
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
                    <div class="col-md-12 col-md-12  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <figure class="highcharts-figure">
                                    <div id="grafik-output-wwt"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div> 
            <!-- CARD UNTUK LAPORAN HARIAN COUNTER AIR -->
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
                            min: -150000,
                            max: 150000,
                            tickInterval: 1500, // Menentukan jarak antara setiap nilai
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
                            min: -1500,
                            max: 1500,
                            tickInterval: 250, // Menentukan jarak antara setiap nilai
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
        <!-- /script -->
    </body>
<!-- /page content -->



















    