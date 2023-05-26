<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Data Karyawan EHS Dept</h2> 
                            <ul class="nav navbar-right panel_toolbox">
                                <li>
                                    <a class="btn btn-app" href="<?= base_url('Dashboard/addKaryawan');?>">
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
                                        <table id="data_karyawan" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIK</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Posisi</th>
                                                    <th>Gambar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $loop = 1;

                                                    foreach($list_karyawan as $row){ ?>
                                                    <tr>
                                                        <td><?= $loop++ ?></td>
                                                        <td><?= $row->npk?></td>
                                                        <td><?= $row->nm_karyawan?></td>
                                                        <td><?= $row->keterangan?></td>
                                                        <td align="center"><img src="<?= base_url('uploads/'.$row->foto_karyawan)?>" alt="" style="width: 180px; height: 200px;"></td>
                                                        <td align="center">
                                                            <a class="btn btn-app" href="<?= base_url('Dashboard/editKaryawan/'.$row->id_karyawan);?>">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                            <a class="btn btn-app" href="<?= base_url('Dashboard/deleteKaryawanById/'.$row->id_karyawan);?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#data_karyawan').DataTable({
            dom: 'Blfrtip',
            lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, 'All']],
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }
            ]
        });
    });
</script>