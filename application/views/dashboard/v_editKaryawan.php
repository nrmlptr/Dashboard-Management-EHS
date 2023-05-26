<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Data Karyawan</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li>
                                    <a class="close-link" href="<?= base_url('dashboard/showKaryawan')?>"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php
                                foreach ($kyw as $row){
                                    $nik = $row->nik;
                                    $nm_karyawan = $row->nm_karyawan;
                                    $nm_karyawan = $row->nm_karyawan;
                                    $foto_karyawan = $row->foto_karyawan;
                                    $id_karyawan = $row->id_karyawan;
                                }
                                // var_dump($nik);die;
                            ?>
                            <form class="" action="<?= base_url('dashboard/loadEditKaryawan')?>" method="post" enctype="multipart/form-data" novalidate>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">NIK<span>*</span></label>
                                    <div class="col-md-1 col-sm-6">
                                        <input class="form-control" data-validate-length-range="4" data-validate-words="2" type="number" name="nik" value="<?= $nik?>"/>
                                        <input type="hidden" name="id_karyawan" value="<?php echo $id_karyawan?>">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Karyawan<span>*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="nm_karyawan" type="text" value="<?= $nm_karyawan?>"/>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Posisi<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select name="keterangan" id="keterangan" class="form-control">
                                            <?php
                                                foreach($dataPosisi as $row){
                                                    if($row->id_posisi == $posisi_id){
                                                    echo "<option value='".$row->id_posisi."' selected>".$row->keterangan."</option>";
                                                    }
                                                    echo "<option value='".$row->id_posisi."'>".$row->keterangan."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Foto Karyawan<span>*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="karyawanFile" type="file" size="20" /></div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Ubah Foto Karyawan<span>*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <img src="<?= base_url('uploads/'.$foto_karyawan)?>" alt="" width="230px" height="210px">
                                    </div>
                                </div>
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3 mt-4">
                                            <button type="submit" id="btn" class="form-control btn btn-primary d-none">Ubah</button>
                                            <button type="button" id="btnAlert" class="btn btn-primary">Ubah</button>
                                            <button type="reset" class="btn btn-success">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /page content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= base_url('assets/gentelella-master/')?>vendors/validator/multifield.js"></script>
<script src="<?= base_url('assets/gentelella-master/')?>vendors/validator/validator.js"></script>

<!-- Javascript functions	-->
<script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);


    $('#btnAlert').on('click',function(){
        Swal.fire({
            title: 'Merubah Data',
            text: "Anda Yakin Akan Merubah Data Karyawan ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#btn').click();
                Swal.fire('Data Berhasil Dirubah !', '', 'success')
            }
        })
    });

</script>