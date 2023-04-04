<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <!-- <h3>Users <small>Some examples to get you started</small></h3> -->
            </div>

            <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div> -->
        </div>

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
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li> -->
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>   
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama Karyawan</th>
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
                                                    <td><?= $row->nik?></td>
                                                    <td><?= $row->nm_karyawan?></td>
                                                    <td align="center"><img src="<?= base_url('uploads/'.$row->foto_karyawan)?>" alt="" style="width: 150px; height: 150px;"></td>
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