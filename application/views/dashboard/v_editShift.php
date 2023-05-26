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
                            <h2>Edit Data Shift</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li>
                                    <a class="close-link" href="<?= base_url('dashboard/showShift')?>"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <?php
                                foreach ($shift as $row){
                                    $nm_shift = $row->nm_shift;
                                    $waktu_shift = $row->waktu_shift;
                                    $id_shift = $row->id_shift;
                                }
                                // var_dump($nik);die;
                            ?>
                            <form class="" action="<?= base_url('dashboard/loadEditShift')?>" method="post" novalidate>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Shift<span>*</span></label>
                                    <div class="col-md-2 col-sm-6">
                                        <input class="form-control" type="text" name="nm_shift" value="<?= $nm_shift?>"/>
                                        <input type="hidden" name="id_shift" value="<?php echo $id_shift?>">
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Waktu Shift<span>*</span></label>
                                    <div class="col-md-4 col-sm-6">
                                        <input class="form-control" class='optional' name="waktu_shift" type="text" value="<?= $waktu_shift?>"/></div>
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
            text: "Anda Yakin Akan Merubah Data Shift ?",
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