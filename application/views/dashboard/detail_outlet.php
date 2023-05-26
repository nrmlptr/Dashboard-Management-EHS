<!DOCTYPE html>
<html>
    <head>
        <title>Grafik Detail PH Outlet WWT</title>
    </head>
    <body>

        <div class="right_col" role="main">
            <?php
                $range_pengecekan = ['07:30','09:30','11:30','13:30','15:30','16:30','18:30','20:30','22:30','00:30','02:30','04:30','06:30'];
                $arr_value        = [];
                
                foreach ($range_pengecekan as $time) {
                    $found = false;
                    foreach ($detail_dataOutlet as $item) {
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
                <!-- kotak buat detail grafik ph tangki outlet proses wwt -->
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <figure class="highcharts-figure">
                                <div id="grafikdetail_outlet"></div>
                            </figure>
                            <a href="<?= base_url('Dashboard/index/')?>" class="btn btn-secondary"><i class="glyphicon glyphicon-arrow-left"></i></a>
                        </div>
                    </div>
                </div>
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
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>

            <!-- ==================================================detail grafik php outlet wwt============================================================= -->
            <script>
                $(document).ready(function() {
                    // console.log(data);
                    // // Mengambil label dan value dari data
                    // data.forEach(function(d) {
                    //     labels.push(d.waktu);
                    //     values.push(d.value);
                    // });

                    Highcharts.chart('grafikdetail_outlet', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: 'Grafik Detail Value PH Outlet Proses WWT'
                        },
                        xAxis: {
                            categories: <?=json_encode($range_pengecekan)?>,
                            title: {
                                text: 'Jam Pengecekan'
                            },
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
                            name: 'Value PH Outlet',
                            data: <?=json_encode($arr_value)?>,
                            color: 'green'
                        }]
                    });
                });
            </script>
        <!-- /script -->
    </body> 
</html>
