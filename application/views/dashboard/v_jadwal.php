<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <!-- <h3>Users <small>Some examples to get you started</small></h3> -->
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Jadwal Kerja Karyawan - Department EHS</h2> 
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="btn btn-app" href="<?= base_url('Dashboard/addJadwal');?>">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                </li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a></li>   
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="jadwal_kerja" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Waktu Shift</th>
                                                    <th>Date In</th>
                                                    <th>Date Out</th>
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
                                                    foreach ($data as $row) { 
                                                        $date_in = date('D', strtotime($row['start_date']));
                                                        $date_out = date('D', strtotime($row['end_date']));?>
                                                        <tr align="center">
                                                            <td><?=$no;?></td>
                                                            <td><?=$row['name']?></td>
                                                            <!-- <td><?=$row['shift']?></td> -->
                                                            <?php if($row['shift'] == 'Shift 1'){?>
                                                                <td style="width: auto;"><span class="badge badge-success"><?=$row['shift']?></span></td>    
                                                            <?php }elseif($row['shift'] == 'Shift 2'){ ?>
                                                                <td style="width: auto;"><span class="badge badge-info"><?=$row['shift']?></span></td>    
                                                            <?php }else{ ?>
                                                                <td style="width: auto;"><span class="badge badge-warning"><?=$row['shift']?></span></td>    
                                                            <?php } ?>
                                                            <td><?=$dayList[$date_in].', '.date('d M Y',strtotime($row['start_date']))?></td>
                                                            <td><?=$dayList[$date_out].', '.date('d M Y',strtotime($row['end_date']))?></td>
                                                        </tr>
                                                    <?php $no++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /page content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    // jadwal kerja karyawan ehs ========================================================
    $(document).ready(function () {
        $('#jadwal_kerja').DataTable({
            dom: 'Blfrtip',
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
            buttons: ['excel', 'pdf']
        });
    });
</script>