<!-- page content -->
<body onload="startTime()">
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;" >
            <div class="tile_count">
                <div class="col-md-20 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i>Total Karyawan EHS</span>
                    <div class="count"><?= $on.' Peop'?></div>
                </div>
                <div class="col-md-20 col-sm-8 tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i>Time Today</span>
                    <div class="count" id="clock"></div>
                </div>
                <!-- <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
                    <div class="count green">2,500</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
                    <div class="count">4,567</div>
                    <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
                    <div class="count">2,315</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                    <div class="count">7,325</div>
                    <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                </div> -->
            </div>
        </div>
        <!-- /top tiles -->

        <div class="row">
            <!-- kotak buat grafik pemakaian -->
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <figure class="highcharts-figure">
                            <div id="container-grafik"></div>
                        </figure>
                    </div>
                </div>
            </div>
            <!-- kotak untuk grafik sisa stok -->
            <div class="col-md-6 col-sm-6">
                <div class="x_panel">
                    <div class="x_title">
                        <figure class="highcharts-figure">
                            <div id="container-sisa-stok"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <!-- kotak untuk tabel pemakaian -->
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Proses WWT</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start pop-over -->
                        <div class="bs-example-popovers">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pemakaian</th>
                                            <th>Bulan</th>
                                            <th>Nama Karyawan</th>
                                            <th>Nama Material</th>
                                            <th>Jumlah Pemakaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $loop = 1;
                                            foreach($dataProses as $row){?>                                            
                                                <tr>
                                                    <td><?= $loop++?></td>
                                                    <td><?= date('d-m-Y', strtotime($row->tanggal_pemakaian))?></td>
                                                     <td><?= $row->month?></td>
                                                    <td><?= $row->nm_user?></td>
                                                    <td><?= $row->material?></td>
                                                    <td><?= $row->jml_pemakaian?></td>
                                                </tr>
                                        <?php }?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end pop-over -->
                    </div>
                </div>
            </div>
           <!-- kotak untuk tabel limbah cair dan pemakaian kostik harian -->
           <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Daily Report Limbah cair dan Pemakaian Kostik</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start pop-over -->
                        <div class="bs-example-popovers">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Tanggal Pemakaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $loop = 1; 
                                        ?>                                       
                                            <tr>
                                                <td><?= $loop++?></td>
                                                <td>Volume Limbah (m3)</td>
                                            </tr>
                                            <tr>
                                                <td><?= $loop++?></td>
                                                <td>Konsumsi Konstik (kg)</td>
                                            </tr>
                                            <tr>
                                                
                                                <?php foreach($dataShift as $data){?> 
                                                <td><?= $data->nm_shift?></td>
                                                <?php }?>
                                                <td></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end pop-over -->
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <figure class="highcharts-figure">
                            <!-- <div id="container-output-limbah"></div> -->
                            <div>
                                <canvas id="myChart"></canvas>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <!-- kotak untuk tabel monitoring output limbah -->
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Monitoring Output Limbah WWT</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- start pop-over -->
                        <div class="bs-example-popovers">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr align="center">
                                            <th rowspan="2">Shift</th>
                                            <th colspan="31">Tanggal Proses</th>
                                        </tr>
                                        <tr>
                                            <th>1</th>
                                            <th>2</th>
                                            <th>3</th>
                                            <th>4</th>
                                            <th>5</th>
                                            <th>6</th>
                                            <th>7</th>
                                            <th>8</th>
                                            <th>9</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>12</th>
                                            <th>13</th>
                                            <th>14</th>
                                            <th>15</th>
                                            <th>16</th>
                                            <th>17</th>
                                            <th>18</th>
                                            <th>19</th>
                                            <th>20</th>
                                            <th>21</th>
                                            <th>22</th>
                                            <th>23</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                            <th>28</th>
                                            <th>29</th>
                                            <th>30</th>
                                            <th>31</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach($dataShift as $row){?>                                            
                                                <tr align="center">
                                                    <td><?= $row->nm_shift?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                        <?php }?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end pop-over -->
                    </div>
                </div>
            </div>
        </div> 
    </div>
</body>

<!-- /page content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script> -->
<script>
    //script grafik tabung untuk tampilin stok  ===============================================================================================
    Highcharts.chart('container-sisa-stok', {
        chart: {
            type: 'cylinder',
            options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 100 }
        },
        title: {
            text: 'Grafik Material'
        },
        xAxis: {
            categories: [
                <?php foreach ($stokMaterial as $row) { ?>
                    '<?php echo $row['material']; ?>',
                <?php } ?>
            ],
            title: {
                text: 'Nama Material'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Stok'
            }
        },
        plotOptions: {
            series: {
            depth: 300,
            colorByPoint: true
            }
        },
        series: [{
            name: 'Jumlah Stok',
            data: [
                <?php foreach ($stokMaterial as $row) { ?>
                    <?php echo $row['jml_stok']; ?>,
                <?php } ?>
            ]
        }]
    });

    // script untuk jam manual dan tanggal waktu manual =======================================================================================
    function startTime() {
      var today = new Date();
      var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
      var d = days[today.getDay()];
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      document.getElementById('clock').innerHTML =
      d + " " + h + ":" + m + ":" + s;
      var t = setTimeout(startTime, 1000);
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
      return i;
    }


    // script grafik pemakaian material dikit lagi bener ======================================================================================
    // let data = <?= json_encode($grafik) ?>;
    // test = "";
    // test2 = [];
    // data.forEach(d => {
    //     if(d.id_material == 1) {
    //         test = test + d.jml_pemakaian +','
    //     } else if(d.id_material == 4) {
    //         test2.push(d.jml_pemakaian)
    //     }
    // })
    // console.log(test)
    // console.log(test2)
    // let grouped = _.uniqBy(data,'tanggal_pemakaian');
    // console.log(data)
    Highcharts.chart('container-grafik', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Grafik Pemakaian Material'
        },
        xAxis: {
            categories: [
                <?php foreach ($tanggal as $row) { ?>
                    '<?php echo date('dd', strtotime($row['tanggal_pemakaian'])); ?>',
                <?php } ?>
            ],
            title: {
                text: 'Tanggal Pemakaian Material'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Pemakaian'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} pcs</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Kostik Soda Tangki Besar',
            data: [
                <?php 
                $exist = [];
                foreach($grafik as $data) {
                    if(!array_key_exists($data['tanggal_pemakaian'], $exist)) {
                        $exist[$data['tanggal_pemakaian']] = $data['tanggal_pemakaian'];
                    if($data['id_material'] == '1') {
                            echo $data['jml_pemakaian'] . ','; 
                        } else {
                            echo '0,';
                        }
                    } else {
                        if($data['id_material'] == '1') {
                            echo $data['jml_pemakaian'] . ','; 
                        } else {
                            echo '0,';
                        }
                    }
                } ?>
            ]
            
        },{
            name: 'Kostik Soda Tangki Kecil',
            data: [
                <?php 
                $exist = [];
                foreach($grafik as $data) {
                    if(!array_key_exists($data['tanggal_pemakaian'], $exist)) {
                        $exist[$data['tanggal_pemakaian']] = $data['tanggal_pemakaian'];
                    if($data['id_material'] == '2') {
                            echo $data['jml_pemakaian'] . ','; 
                        } else {
                            echo '0,';
                        }
                    } else {
                        if($data['id_material'] == '2') {
                            echo $data['jml_pemakaian'] . ','; 
                        } else {
                            echo '0,';
                        }
                    }
                } ?>
                ]
        },{
            name: 'Kostik flake',
            data: [
                <?php 
                $exist = [];
                foreach($grafik as $data) {
                    if(!array_key_exists($data['tanggal_pemakaian'], $exist)) {
                        $exist[$data['tanggal_pemakaian']] = $data['tanggal_pemakaian'];
                    if($data['id_material'] == '3') {
                            echo $data['jml_pemakaian'] . ','; 
                        } else {
                            echo '0,';
                        }
                    } else {
                        if($data['id_material'] == '3') {
                            echo $data['jml_pemakaian'] . ','; 
                        } else {
                            echo '0,';
                        }
                    }
                } ?>
            ]
        },{
            name: 'Kuriflok',
            data: 
                [
                    <?php 
                        $exist = [];
                        foreach($grafik as $data) {
                            if(!array_key_exists($data['tanggal_pemakaian'], $exist)) {
                                $exist[$data['tanggal_pemakaian']] = $data['tanggal_pemakaian'];
                            if($data['id_material'] == '4') {
                                    echo $data['jml_pemakaian'] . ','; 
                                } else {
                                    echo '0,';
                                }
                            } else {
                                if($data['id_material'] == '4') {
                                    echo $data['jml_pemakaian'] . ','; 
                                } else {
                                    echo '0,';
                                }
                            }
                        }
                    ?>
                ]
        },{
            name: 'Fecl3',
            data: 
            [
                <?php 
                    $exist = [];
                    foreach($grafik as $data) {
                        if(!array_key_exists($data['tanggal_pemakaian'], $exist)) {
                            $exist[$data['tanggal_pemakaian']] = $data['tanggal_pemakaian'];
                        if($data['id_material'] == '5') {
                                echo $data['jml_pemakaian'] . ','; 
                            } else {
                                echo '0,';
                            }
                        } else {
                            if($data['id_material'] == '5') {
                                echo $data['jml_pemakaian'] . ','; 
                            } else {
                                echo '0,';
                            }
                        }
                    }
                ?>
            ]
        },{
            name: 'HCL',
            data: [
                <?php 
                    $exist = [];
                    foreach($grafik as $data) {
                        if(!array_key_exists($data['tanggal_pemakaian'], $exist)) {
                            $exist[$data['tanggal_pemakaian']] = $data['tanggal_pemakaian'];
                            if($data['id_material'] == '6') {
                                echo $data['jml_pemakaian'] . ','; 
                            } else {
                                echo '0,';
                            }
                        } else {
                            if($data['id_material'] == '6') {
                                echo $data['jml_pemakaian'] . ','; 
                            } else {
                                echo '0,';
                            }
                        }
                    }
                ?>
            ]
        }
    ]
    });

    // script grafik output limbah yang dihasilkan --------------------------------------------------------------------------------------------
    // A point click event that uses the Renderer to draw a label next to the point
    // On subsequent clicks, move the existing label instead of creating a new one.
    // Highcharts.addEvent(Highcharts.Point, 'click', function () {
    // if (this.series.options.className.indexOf('popup-on-click') !== -1) {
    //     const chart = this.series.chart;
    //     const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
    //     const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

    //     const anchorX = this.plotX + this.series.xAxis.pos;
    //     const anchorY = this.plotY + this.series.yAxis.pos;
    //     const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
    //     const x = align === 'left' ? anchorX + 10 : anchorX - 10;
    //     const y = anchorY - 30;
    //     if (!chart.sticky) {
    //     chart.sticky = chart.renderer
    //         .label(text, x, y, 'callout',  anchorX, anchorY)
    //         .attr({
    //         align,
    //         fill: 'rgba(0, 0, 0, 0.75)',
    //         padding: 10,
    //         zIndex: 7 // Above series, below tooltip
    //         })
    //         .css({
    //         color: 'white'
    //         })
    //         .on('click', function () {
    //         chart.sticky = chart.sticky.destroy();
    //         })
    //         .add();
    //     } else {
    //     chart.sticky
    //         .attr({ align, text })
    //         .animate({ anchorX, anchorY, x, y }, { duration: 250 });
    //     }
    // }
    // });
    // Highcharts.chart('container-output-limbah', {

    //     chart: {
    //         scrollablePlotArea: {
    //         minWidth: 700
    //         }
    //     },

    //     data: {
    //         csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
    //         beforeParse: function (csv) {
    //         return csv.replace(/\n\n/g, '\n');
    //         }
    //     },

    //     title: {
    //         text: 'Monitoring Output Limbah WWT',
    //         align: 'center'
    //     },

    //     subtitle: {
    //         text: 'PT CBI',
    //         align: 'center'
    //     },

    //     xAxis: {
    //         tickInterval: 7 * 24 * 3600 * 1000, // one week
          
    //         tickWidth: 0,
    //         gridLineWidth: 1,
    //         labels: {
    //             align: 'left',
    //             x: 3,
    //             y: -3
    //         }
    //     },

    //     yAxis: [{ // left y axis
    //         title: {
    //         text: null
    //         },
    //         labels: {
    //         align: 'left',
    //         x: 3,
    //         y: 16,
    //         format: '{value:.,0f}'
    //         },
    //         showFirstLabel: false
    //     }, { // right y axis
    //         linkedTo: 0,
    //         gridLineWidth: 0,
    //         opposite: true,
    //         title: {
    //         text: null
    //         },
    //         labels: {
    //         align: 'right',
    //         x: -3,
    //         y: 16,
    //         format: '{value:.,0f}'
    //         },
    //         showFirstLabel: false
    //     }],

    //     legend: {
    //         align: 'left',
    //         verticalAlign: 'top',
    //         borderWidth: 0
    //     },

    //     tooltip: {
    //         shared: true,
    //         crosshairs: true
    //     },

    //     plotOptions: {
    //         series: {
    //         cursor: 'pointer',
    //         className: 'popup-on-click',
    //         marker: {
    //             lineWidth: 1
    //         }
    //         }
    //     },

    //     series: [{
    //         name: 'kostik soda tangki besar',
    //         lineWidth: 4,
    //         marker: {
    //         radius: 4
    //         }
    //     }, {
    //         name: 'kostik soda tangki besar'
    //     }]
    // });


    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'line',
        data: {
        labels: [ 
                    <?php foreach ($tanggal as $row) { ?>
                        '<?php echo date('d', strtotime($row['tanggal_pemakaian'])); ?>',
                    <?php } ?>
                ],
        datasets: [{
            label: 'kostik soda tangki besar',
            data: [
                <?php foreach ($grafik as $data) { ?>
                    <?php if ($data['id_material'] == '1') { echo $data['jml_pemakaian'].','; } ?>
                <?php } ?>
                ],
            borderWidth: 1,
        },{
            label: 'kostik soda tangki kecil',
            data: [
                <?php foreach ($grafik as $data) { ?>
                    <?php if ($data['id_material'] == '2') { echo $data['jml_pemakaian'].','; } ?>
                <?php } ?>
                ],
            borderWidth: 1
        },{
            label: 'kostik flake',
            data: [
                <?php foreach ($grafik as $data) { ?>
                    <?php if ($data['id_material'] == '3') { echo $data['jml_pemakaian'].','; } ?>
                <?php } ?>
                ],
            borderWidth: 1
        },{
            label: 'Fecl3',
            data: [
                <?php foreach ($grafik as $data) { ?>
                    <?php if ($data['id_material'] == '5') { echo $data['jml_pemakaian'].','; } ?>
                <?php } ?>
                ],
            borderWidth: 1
        },{
            label: 'kuriflok',
            data: [
                <?php foreach ($grafik as $data) { ?>
                    <?php if ($data['id_material'] == '4') { echo $data['jml_pemakaian'].','; } ?>
                <?php } ?>
                ],
            borderWidth: 1
        },{
            label: 'HCL',
            data: [
                <?php foreach ($grafik as $data) { ?>
                    <?php if ($data['id_material'] == '6') { echo $data['jml_pemakaian'].','; } ?>
                <?php } ?>
                ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
    



</script>




    