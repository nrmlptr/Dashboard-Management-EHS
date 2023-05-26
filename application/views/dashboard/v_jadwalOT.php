<!-- page content -->
    <div class="right_col" role="main">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Jadwal OT Kerja Karyawan - Department EHS</h2> 
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <a class="btn btn-app" href="<?= base_url('Dashboard/addJadwalOT');?>" title="Tombol Untuk Buat Jadwal OT">
                                    <i class="fa fa-plus"></i> Add
                                </a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>   
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-12  col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="jadwal_kerja_ot" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Waktu Shift</th>
                                        <th>Date In</th>
                                        <th>Date Out</th>
                                        <th>Waktu Lembur</th>
                                        <th>Total Jam</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $dayList = array(
                                            'Sun' => 'Minggu',
                                            'Mon' => 'Senin',
                                            'Tue' => 'Selasa',
                                            'Wed' => 'Rabu',
                                            'Thu' => 'Kamis',
                                            'Fri' => 'Jumat',
                                            'Sat' => 'Sabtu'
                                        );

                                        foreach ($dataOT as $row) { 
                                            $date_in = date('D', strtotime($row['start_date']));
                                            $date_out = date('D', strtotime($row['end_date']));?>
                                            <tr align="center">
                                                <td><?=$no;?></td>
                                                <td><?=$row['name']?></td>
                                                <?php if($row['shift'] == 'Shift 1'){?>
                                                    <td style="width: auto;"><span class="badge badge-success"><?=$row['shift']?></span></td>    
                                                <?php }elseif($row['shift'] == 'Shift 2'){ ?>
                                                    <td style="width: auto;"><span class="badge badge-info"><?=$row['shift']?></span></td>    
                                                <?php }else{ ?>
                                                    <td style="width: auto;"><span class="badge badge-warning"><?=$row['shift']?></span></td>    
                                                <?php } ?>
                                                <td><?=$dayList[$date_in].', '.date('d M Y',strtotime($row['start_date']))?></td>
                                                <td><?=$dayList[$date_out].', '.date('d M Y',strtotime($row['end_date']))?></td>
                                                <td><?= $row['start_time'].' s/d '.$row['end_time']?></td>
                                                <td><?= $row['totaljam']?></td>
                                                <td><?= $row['alasanOT']?></td>
                                            </tr>
                                        <?php $no++; } 
                                    ?>
                                </tbody>
                            </table> 
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <figure class="highcharts-figure">
                            <div id="grafik-ot"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /page content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- script table jadwal -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#jadwal_kerja_ot').DataTable({
                dom: 'Blfrtip',
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']],
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]
                        }
                    }
                ]
            });
        });
    </script>
<!-- script table jadwal -->

<!-- script grafik ot -->
    <script>
        Highcharts.chart('grafik-ot', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Rekap Lembur Karyawan ( Bulan - <?php echo date('F'); ?>)'
            },
            subtitle: {
                text: 'Department EHS - PT Century Batteries Indonesia'
            },
            xAxis: {
                title: {
                        text: 'Nama Karyawan'
                    },
                categories: [
                    <?php foreach ($karyawan as $row) { ?>
                        '<?php echo $row->nm_karyawan; ?>',
                    <?php } ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Lembur'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Total Lembur',
                data: [
                    <?php foreach ($karyawan as $row) { ?>
                        <?php
                            $totalLembur = 0;
                            foreach ($dataOT as $lembur) {
                                if ($lembur['name'] === $row->nm_karyawan) {
                                    $totalLembur += $lembur['totaljam'];
                                }
                            }
                            echo $totalLembur . ',';
                        ?>
                    <?php } ?>
                ]
            }]
        });
    </script>
<!-- script grafik ot -->