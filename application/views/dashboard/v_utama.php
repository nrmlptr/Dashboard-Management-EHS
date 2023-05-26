<!-- page content -->
    <body onload="startTime()">
        <div class="right_col" role="main">
            <!-- top tiles -->
                <div class="row" style="display: inline-block;" >
                    <div class="tile_count">
                        <div class="col-md-20 col-sm-15 tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i>Time Today</span>
                            <div class="count" id="clock"></div>
                        </div>
                    </div>
                </div>
            <!-- /top tiles -->

            <hr>
            <!-- CARD UNTUK PROSES WWT -->
                <h3>Grafik Laporan Proses WWT</h3>
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

            <!-- GRAFIK UNTUK PEMAKAIAN CHEMICAL -->
                <h3>Grafik Laporan Pemakaian Chemical</h3>
                <!-- CARD GRAFIK KOSTIK SODA WWT -->
                <div class="row">
                    <!-- kotak buat grafik KOSTK SODA WWT-->
                    <div class="col-md-12 col-sm-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <figure class="highcharts-figure">
                                    <div id="grafik-kostik-wwt"></div>
                                </figure>
                            </div>

                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_set_max_wwt">
                                    Ubah Nilai Maksimum
                                </button>
                            <!-- /Button trigger modal -->

                            <!-- Modal -->
                                <div class="modal fade" id="modal_set_max_wwt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Ubah Nilai Maksimum Kostik Soda <br>
                                                    <small style="color: red;">Nilai inputan perlu di konversi menjadi kg (dikali 1.5)</small>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- TAMBAH FORM UNTUK MENGIRIMKAN DATA KE CONTROLLER -->
                                                <form action="<?=base_url()?>dashboard/set_max_wwt" method="post"> 
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="col-lg-6">
                                                                <input type="number" class="form-control" name="nilai_maks_wwt" placeholder="Masukkan Nilai" value="<?=(!empty($max_kostikwwt)) ? $max_kostikwwt[0]['max_kostik'] : ''?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            <!-- /TAMBAH FORM UNTUK MENGIRIMKAN DATA KE CONTROLLER -->
                                        </div>
                                    </div>
                                </div>
                            <!-- /Modal -->
                        </div>
                    </div>
                </div>

                <!-- CARD KOSTIK SODA MIXBED & DEMIN 2 -->
                <div class="row">
                    <!-- kotak untuk grafik KOSTIK SODA REGENERASI MIXBED -->
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <figure class="highcharts-figure">
                                    <div id="grafik-kostik-mixbed"></div>
                                </figure>
                            </div>
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKosmik">
                                    Ubah Nilai Maksimum
                                </button>
                            <!-- /Button trigger modal -->

                            <!-- Modal -->
                                <div class="modal fade" id="modalKosmik" tabindex="-1" aria-labelledby="modalKosmik" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalKosmik" style="color: black;">Ubah Nilai Maksimum Kostik Soda Regenerasi Mixbed<br>
                                                    <small style="color: red;">Nilai inputan perlu di konversi menjadi kg (dikali 1.5)</small>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url()?>dashboard/set_maksmixbed" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-lg-6">
                                                            <input type="number" class="form-control" name="nilai_maksmixbed" placeholder="Masukkan Nilai" value="<?=(!empty($max_kostikmixbed)) ? $max_kostikmixbed[0]['max_kostikmixbed'] : ''?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="ubah-nimaks-kosmik">Save changes</button>
                                                </div>
                                            </form>    
                                        </div>
                                    </div>
                                </div>
                            <!-- /Modal -->
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
                            <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalKosdem">
                                    Ubah Nilai Maksimum
                                </button>
                            <!-- /Button trigger modal -->

                            <!-- Modal -->
                                <div class="modal fade" id="modalKosdem" tabindex="-1" aria-labelledby="modalKosdem" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalKosdem" style="color: black;">Ubah Nilai Maksimum Kostik Soda Regenerasi Demin 2<br>
                                                    <small style="color: red;">Nilai inputan perlu di konversi menjadi kg (dikali 1.5)</small>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url()?>dashboard/set_maksdemin" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-lg-6">
                                                            <input type="number" class="form-control" name="nilai_maksDemin" placeholder="Masukkan Nilai" value="<?=(!empty($max_kostikdemin)) ? $max_kostikdemin[0]['max_kostikdemin'] : ''?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info" id="ubah-nimaks-kosdem">Save changes</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            <!-- /Modal -->
                        </div>
                    </div>
                </div>     

                <!-- CARD UNTUK FECL3 & ASAM PEKAT -->
                <div class="row">
                    <!-- kotak untuk grafik Asam Pekat after -->
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

                <!-- CARD UNTUK kuriflok & hcl wwt -->
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

                <!-- CARD UNTUK HCL WWT & MIXBED -->
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

            <!-- /GRAFIK UNTUK PEMAKAIAN CHEMICAL -->
 
        </div>
        <!--  =========================================== SCRIPT ==============================================-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>
            
            <!-- SCRIPT JAM -->
                <script type="text/javascript">
                    function startTime() {
                        var today = new Date();
                        var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                        var d = days[today.getDay()];
                        var h = today.getHours();
                        var m = today.getMinutes();
                        var s = today.getSeconds();
                        //   m = checkTime(m);
                        //   s = checkTime(s);

                            h = (h<10) ? "0" + h : h;
                            m = (m<10) ? "0" + m : m;
                            s = (s<10) ? "0" + s : s;
                        document.getElementById('clock').innerHTML =
                        d + " " + h + ":" + m + ":" + s;
                        var t = setTimeout(startTime, 1000);
                    }
                </script>
            <!-- /SCRIPT JAM -->

            <!-- SCRIPT GRAFIK LAPORAN PROSES WWT -->
                <!-- ===SCRIPT GRAFIK PH NETRALISASI PROSES WWT==================================================================================================== -->
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
                                                window.location.href = '<?php echo base_url("Dashboard/detail/") ?>' + tanggal;
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

                <!-- ===SCRIPT GRAFIK PH OUTLET PROSES WWT========================================================================================================= -->
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
                                                window.location.href = '<?php echo base_url("Dashboard/detailOutlet/") ?>' + tanggal;
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
            <!-- /SCRIPT GRAFIK LAPORAN PROSES WWT -->

            <!-- GRAFIK PEMAKAIAN CHEMICAL -->
                
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
                                $end_date = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
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
                                $end_date   = date('Y-m-t'); // Mengambil tanggal akhir bulan ini
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

            <!--/GRAFIK PEMAKAIAN CHEMICAL -->

        <!--  ========================================== /SCRIPT ==============================================-->
    </body>
<!-- /page content -->



















    