<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Shift Kerja Karyawan EHS Dept</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Shift</th>
                                                    <th>Waktu Shift</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $loop = 1;
                                                    
                                                    foreach($list_shift as $row){ ?>
                                                    <tr align="center">
                                                        <td><?= $loop++?></td>
                                                        <td><?= $row->nm_shift?></td>
                                                        <td><?= $row->waktu_shift?></td>
                                                        <td>
                                                            <a href="<?= base_url('Dashboard/editShift/'.$row->id_shift)?>" class="btn btn-app">
                                                                <i class="fa fa-edit"></i>Edit
                                                            </a>
                                                            <!-- <a href="<?= base_url('Dashboard/deleteShiftById/'.$row->id_shift);?>" class="btn btn-app" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')">
                                                                <i class="fa fa-trash"></i>Delete
                                                            </a> -->
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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