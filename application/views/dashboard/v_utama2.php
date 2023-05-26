<!-- page content  onload="startTime()"-->
    <body>
        <div class="right_col" role="main">

            <!-- CARD UNTUK STOK ASAM 1400 & 1310 -->
                <hr>
                <h1 style="text-align: center;">Display Stok Asam</h1>
                <hr>
                <div class="row">
                    <!-- kotak untuk STOK ASAM 1400 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1400</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1400 = date('d-m-Y');
                                                // $today_found = false;
                                                $tanggal = date('01-m-Y');
                                                foreach ($stok_asam1400_shift_1 as $index => $stok_shift_1) {
                                            ?>
                                                <tr>
                                                    <td><?= $tanggal ?></td>
                                                    <td><?= $stok_shift_1 ?></td>
                                                    <td><?= $stok_asam1400_shift_2[$index] ?></td>
                                                    <td><?= $stok_asam1400_shift_3[$index] ?></td>
                                                </tr>
                                            <?php
                                                $tanggal = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <!-- kotak untuk STOK ASAM 1310 -->
                    <div class="col-md-6 col-sm-6  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1310</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1310" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $start_asam1310 = date('d-m-Y');
                                            $tanggal_asam1310 = date('01-m-Y');
                                            foreach($stok_asam1310_shift_1 as $row => $stok_1310_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1310?></td>
                                                <td><?= $stok_1310_shift1?></td>
                                                <td><?= $stok_asam1310_shift_2[$row]?></td>
                                                <td><?= $stok_asam1310_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1310 = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1310)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            <!-- CARD UNTUK STOK ASAM 1400 & 1310 -->

            <!-- CARD UNTUK STOK ASAM 1220 & 1350 MCB -->
                <div class="row">
                    <!-- kotak untuk STOK ASAM 1220 -->
                    <div class="col-md-6 col-sm-6  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1220</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1220" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $start_asam1220 = date('d-m-Y');
                                            $tanggal_asam1220 = date('01-m-Y');
                                            foreach($stok_asam1220_shift_1 as $row => $stok_1220_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1220?></td>
                                                <td><?= $stok_1220_shift1?></td>
                                                <td><?= $stok_asam1220_shift_2[$row]?></td>
                                                <td><?= $stok_asam1220_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1220 = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1220)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kotak untuk STOK ASAM 1350 MCB -->
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1350 MCB</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1350MCB" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1350MCB      = date('d-m-Y');
                                                $tanggal_asam1350MCB    = date('01-m-Y');
                                                foreach($stok_asam1350MCB_shift_1 as $row => $stok_1350MCB_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1350MCB?></td>
                                                <td><?= $stok_1350MCB_shift1?></td>
                                                <td><?= $stok_asam1350MCB_shift_2[$row]?></td>
                                                <td><?= $stok_asam1350MCB_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1350MCB = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1350MCB)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
            <!-- CARD UNTUK STOK ASAM 1220 & 1350 MCB -->

            <!-- CARD UNTUK STOK ASAM 1400MCB & 1310A -->
                <div class="row">
                    <!-- kotak untuk STOK ASAM 1400 MCB-->
                    <div class="col-md-6 col-sm-6  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1400 MCB</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1400MCB" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1400MCB      = date('d-m-Y');
                                                $tanggal_asam1400MCB    = date('01-m-Y');
                                                foreach($stok_asam1400MCB_shift_1 as $row => $stok_1400MCB_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1400MCB?></td>
                                                <td><?= $stok_1400MCB_shift1?></td>
                                                <td><?= $stok_asam1400MCB_shift_2[$row]?></td>
                                                <td><?= $stok_asam1400MCB_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1400MCB = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1400MCB)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kotak untuk STOK ASAM 1310 - WET BATTERY A -->
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1310 - WET BATTERY A</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1310A" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1310A      = date('d-m-Y');
                                                $tanggal_asam1310A    = date('01-m-Y');
                                                foreach($stok_asam1310A_shift_1 as $row => $stok_1310A_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1310A?></td>
                                                <td><?= $stok_1310A_shift1?></td>
                                                <td><?= $stok_asam1310A_shift_2[$row]?></td>
                                                <td><?= $stok_asam1310A_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1310A = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1310A)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>       
                </div> 
            <!-- CARD UNTUK STOK ASAM 1400MCB & 1310A -->

            <!-- CARD UNTUK STOK ASAM 1220A & 1310F -->
                <div class="row">
                    <!-- kotak untuk STOK ASAM 1220 - WET BATTERY A -->
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1220 - WET BATTERY A</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1220A" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1220A      = date('d-m-Y');
                                                $tanggal_asam1220A    = date('01-m-Y');
                                                foreach($stok_asam1220A_shift_1 as $row => $stok_1220A_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1220A?></td>
                                                <td><?= $stok_1220A_shift1?></td>
                                                <td><?= $stok_asam1220A_shift_2[$row]?></td>
                                                <td><?= $stok_asam1220A_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1220A = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1220A)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kotak buat STOK ASAM 1310 - WET BATTERY F-->
                    <div class="col-md-6 col-sm-6  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1310 - WET BATTERY F</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1310F" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1310F      = date('d-m-Y');
                                                $tanggal_asam1310F    = date('01-m-Y');
                                                foreach($stok_asam1310F_shift_1 as $row => $stok_1310F_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1310F?></td>
                                                <td><?= $stok_1310F_shift1?></td>
                                                <td><?= $stok_asam1310F_shift_2[$row]?></td>
                                                <td><?= $stok_asam1310F_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1310F = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1310F)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- CARD UNTUK STOK ASAM 1220A & 1310F -->

            <!-- CARD STOK ASAM WET BATTERY F - 1160 & 1260 -->
                <div class="row">
                    <!-- kotak untuk STOK ASAM 1160 - WET BATTERY F -->
                    <div class="col-md-6 col-sm-6">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1160 - WET BATTERY F</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1160F" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1160F      = date('d-m-Y');
                                                $tanggal_asam1160F    = date('01-m-Y');
                                                foreach($stok_asam1160F_shift_1 as $row => $stok_1160F_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1160F?></td>
                                                <td><?= $stok_1160F_shift1?></td>
                                                <td><?= $stok_asam1160F_shift_2[$row]?></td>
                                                <td><?= $stok_asam1160F_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1160F = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1160F)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- kotak untuk STOK ASAM 1260 - WET BATTERY F-->
                    <div class="col-md-6 col-sm-6  ">
                        <div class="x_panel">
                            <div class="x_title">
                                <div class="card-box table-responsive">
                                    <h5 align="center">Jumlah Stok Asam 1260 - WET BATTERY F</h5>
                                    <h6 align="center" style="color: red;">(Data dalam satuan m3)</h6>
                                    <hr>
                                    <table id="data_stok_asam1260F" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr align="center">
                                                <th>Tanggal</th>
                                                <th>Shift 1<br>
                                                    <small style="color: black;"><b>Jam : 16:00</b></small>
                                                </th>
                                                <th>Shift 2<br>
                                                    <small style="color: black;"><b>Jam : 00:00</b></small>
                                                </th>
                                                <th>Shift 3<br>
                                                    <small style="color: black;"><b>Jam : 07:00</b></small>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $start_asam1260F      = date('d-m-Y');
                                                $tanggal_asam1260F    = date('01-m-Y');
                                                foreach($stok_asam1260F_shift_1 as $row => $stok_1260F_shift1){
                                            ?>
                                            <tr>
                                                <td><?= $tanggal_asam1260F?></td>
                                                <td><?= $stok_1260F_shift1?></td>
                                                <td><?= $stok_asam1260F_shift_2[$row]?></td>
                                                <td><?= $stok_asam1260F_shift_3[$row]?></td>
                                            </tr>
                                            <?php 
                                                $tanggal_asam1260F = date ("d-m-Y", strtotime("+1 days", strtotime($tanggal_asam1260F)));
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            <!-- CARD STOK ASAM WET BATTERY F - 1160 & 1260 -->

        </div>

        <!-- script -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/data.js"></script>
            <script src="https://code.highcharts.com/modules/series-label.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/highcharts-3d.js"></script>
            <script src="https://code.highcharts.com/modules/cylinder.js"></script>

            <!-- ================================================= SCRIPT TABLE STOK ASAM ================================================================= -->
            <script type="text/javascript">
                // stok asam 1400 =============================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1310 =============================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1310').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1220 =============================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1220').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1350 MCB ========================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1350MCB').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                // stok asam 1400 MCB ========================================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1400MCB').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1310 WET BATTERY A =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1310A').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1220 WET BATTERY A =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1220A').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })

                // stok asam 1310 WET BATTERY F =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1310F').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                // stok asam 1160 WET BATTERY F =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1160F').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                // stok asam 1260 WET BATTERY F =============================================================================================================
                $(document).ready(function () {
                    $('#data_stok_asam1260F').DataTable({
                        'search' : {
                            'search' : "<?=date('d-m-Y')?>"
                        }
                    ,
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf'
                        ]
                    });
                })


                //FUNGSI JAM =================================================================================================================================
                // function startTime() {
                //     var today = new Date();
                //     var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                //     var d = days[today.getDay()];
                //     var h = today.getHours();
                //     var m = today.getMinutes();
                //     var s = today.getSeconds();
                //     //   m = checkTime(m);
                //     //   s = checkTime(s);

                //         h = (h<10) ? "0" + h : h;
                //         m = (m<10) ? "0" + m : m;
                //         s = (s<10) ? "0" + s : s;
                //     document.getElementById('clock').innerHTML =
                //     d + " " + h + ":" + m + ":" + s;
                //     var t = setTimeout(startTime, 1000);
                // }
            </script>
        <!-- /script -->
        
    </body>
<!-- /page content -->


















    