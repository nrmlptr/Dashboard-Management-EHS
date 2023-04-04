<!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <!-- <h3>Form Validation</h3> -->
                </div>

                <!-- <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Input Proses WWT</h2>
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
                            <div class="form-group">
                                <form name="add_name" method="POST" action="<?= base_url('produksi/loadAddMaterial')?>">
                                    <input type="hidden" name="id" id="">
                                    <div class="table-responsive">
                                        <table class="table" id="multiple_input">
                                            <tr>
                                                <td>
                                                    <select name="addmore[][material_id]" id="material_id" class="form-control material_id_list">
                                                        <option value="0">-PILIH-</option>
                                                        <?php foreach($dataMaterial as $row):?>
                                                            <option value="<?php echo $row->id_material;?>"><?php echo $row->material;?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </td>
                                                <td><input type="text" name="addmore[][nm_user]" placeholder="Nama User" class="form-control nm_user_list" required="" /></td>
                                                <td><input type="text" name="addmore[][jml_pemakaian]" placeholder="Jumlah Pemakaian" class="form-control jml_pemakaian_list" required="" /></td>
                                                <td><input type="date" name="addmore[][tanggal_pemakaian]" placeholder="Tanggal Pemakaian" class="form-control tanggal_pemakaian_list" required="" /></td>
                                                <td><input type="text" name="addmore[][month]" placeholder="Bulan" class="form-control month_list" required="" /></td>
                                                <td><button type="button" name="add" id="add" class="btn btn-success">Tambah</button></td>
                                            </tr>
                                        </table>
                                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Simpan" />
                                    </div>
                                </form>
                            </div>
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
            title: 'Menambah Data',
            text: "Anda Yakin Akan Menambahkan Data Karyawan ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Lanjutkan'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#btn').click();
                Swal.fire('Berhasil Menambah Data !', '', 'success')
            }
        })
    });

    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#multiple_input').append('<tr id="row' + i + '" class="dynamic-added"><td><select name="addmore[][material_id]" id="material_id" class="form-control material_id_list"><option value="0">-PILIH-</option><?php foreach($dataMaterial as $row):?><option value="<?php echo $row->id_material;?>"><?php echo $row->material;?></option><?php endforeach;?></select></td><td><input type="text" name="addmore[][nm_user]" placeholder="Nama User" class="form-control nm_user_list" required="" /></td><td><input type="text" name="addmore[][jml_pemakaian]" placeholder="Jumlah Pemakaian" class="form-control jml_pemakaian_list" required="" /></td><td><input type="date" name="addmore[][tanggal_pemakaian]" placeholder="Tanggal Pemakaian" class="form-control tanggal_pemakaian_list" required="" /></td><td><input type="text" name="addmore[][month]" placeholder="Bulan" class="form-control month_list" required="" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });

</script>