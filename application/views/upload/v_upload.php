<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <!-- <h3>Form Upload Document</h3> -->
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Upload Document</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li> -->
                            <li><a class="close-link" href="<?= base_url('upload/');?>"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <?php 
                            if (isset($error)) {
                                echo "ERROR UPLOAD : </br>";
                                print_r($error);
                                echo "</hr>";
                            }
                        ?>
                        <!-- start form for validation -->
                        <form id="demo-form" method="POST" action="<?= base_url('upload/proses');?>" enctype="multipart/form-data">
                            <label for="kd_berkas">Kode Document * :</label>
                            <input type="text" id="kd_berkas" class="form-control" name="kd_berkas" value="<?= $kd_berkas?>" readonly/>

                            <label for="judul_berkas">Nomor Document * :</label>
                            <input type="text" id="no_berkas" class="form-control" name="no_berkas" required/>

                            <label for="judul_berkas">Nama Document * :</label>
                            <input type="text" id="judul_berkas" class="form-control" name="judul_berkas" required/>

                            <label for="berkas">Berkas * :</label>
                            <input type="file" id="berkas" class="form-control" name="berkas" required />

                            <label for="keterangan_berkas">Keterangan * :</label>
                            <textarea id="keterangan_berkas" required="required" class="form-control" name="keterangan_berkas"></textarea>

                            
                            <br />
                            <!-- <button class="btn btn-primary" type="submit">Simpan</button> -->
                            <div class="col-md-6 mt-4">
                                <button type="submit" id="btn" class="form-control btn btn-primary d-none">Upload</button>
                                <button type="button" id="btnAlert" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $('#btnAlert').on('click',function(){
        Swal.fire({
            title: 'Menambah Data',
            text: "Upload Document Pada Sistem ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#btn').click();
                Swal.fire('Berhasil Upload!', '', 'success')
            }
        })
    });
</script>