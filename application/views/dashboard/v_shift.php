<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <!-- <h3>Users <small>Some examples to get you started</small></h3> -->
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Shift Kerja Karyawan EHS Dept</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>
                                <!-- <a class="btn btn-app" href="<?= base_url('Dashboard/addShift');?>">
                                    <i class="fa fa-plus"></i> Add
                                </a> -->
                            </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li> -->
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
                                                        <a href="<?= base_url('Dashboard/deleteShiftById/'.$row->id_shift);?>" class="btn btn-app" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')">
                                                            <i class="fa fa-trash"></i>Delete
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