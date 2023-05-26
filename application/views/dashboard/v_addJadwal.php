<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Jadwal Kerja Karyawan - EHS Dept</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="close-link"  href="<?= base_url('Dashboard/showJadwal')?>"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="" name="add_name" action="<?= base_url('dashboard/loadAddJadwal');?>" method="POST" novalidate>
                                <input type="hidden" name="id_jadwal">
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date In<span class="required">*</span></label>
                                    <div class="col-md-2 col-sm-6">
                                        <input class="form-control" type="date" name="date_in" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Date Out<span class="required">*</span></label>
                                    <div class="col-md-2 col-sm-6">
                                        <input class="form-control" type="date" name="date_out" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Shift<span class="required">*</span></label>
                                    <div class="col-md-2 col-sm-6">
                                        <select name="shift_id" id="shift_id" class="form-control" required="required">
                                            <option value="">-Pilih Shift-</option>
                                            <?php
                                                foreach($dataShift as $row){
                                                    echo "<option value='".$row->id_shift."'>".$row->nm_shift."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="control-label col-md-3 col-sm-3 label-align">Nama Karyawan<span class="required">*</span></label>
                                    <div class="table-responsive">
                                        <table class="table" id="multiple_input">
                                            <tr>
                                                <td>
                                                    <select name="addmore[][karyawan_id]" id="karyawan_id" class="form-control karyawan_id_list">
                                                        <option value="0">-Pilih Karyawan-</option>
                                                        <?php foreach($dataKaryawan as $row):?>
                                                            <option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nm_karyawan;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </td>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>
                                            </tr>
                                        </table>
                                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Simpan" />
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

    // form dinamis karyawan
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#multiple_input').append('<tr id="row' + i + '" class="dynamic-added"><td><select name="addmore[][karyawan_id]" id="karyawan_id" class="form-control karyawan_id_list"><option value="0">-PILIH-</option><?php foreach($dataKaryawan as $row):?><option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nm_karyawan;?></option><?php endforeach;?><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
</script>