<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Layout extends CI_Controller {
        public function __construct() {
            parent::__construct();

            $this->load->model('M_karyawan');
            $this->load->model('M_utama');
		    $this->load->helper('url');
        }

        //metode untuk menampilkan Dashboard Umum Utama Ketika User mengakses website dan tidak perlu login 
        //ketika masuk dashboard utama, user bisa mengakses portal untuk melihat jadwal kerja, serta grafik perkembangan segala kegiatan yang ada di dept ehs
        public function index() {

            $data['data'] = $this->M_karyawan->getJadwal();
            $data['days'] = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            // var_dump($data['JadwalKerja']);die;
        
            $this->load->view('layout/v_dashboard', $data);
            $this->load->view('template/footer');

        }

        // metode grafik proses wwt & pemakaian chemical ============================================================================================
        public function WWTChemical(){
            //PH TANGKI NETRALISASI PROSES WWT ======================================================================================================
            $url = 'https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6984';

            $hasil2 = file_get_contents($url);
            date_default_timezone_set('Asia/Jakarta');
            $start 	= date('01-m-Y');
            $now 	= date('t-m-Y');

            $data1 = json_decode($hasil2, true);
            // var_dump($start);die;
            $data['tangki_netralisasi'] = [];
            
            while (strtotime($start) <= strtotime($now)) {
                $totalValue = 0;
                $count 		= 0;

                foreach ($data1['results'] as $item) {
                    if ($item["tanggal"] === $start) {
                        // $data['tangki_netralisasi'][] = $item["value"];
                        $totalValue += floatval(str_replace([',',' '], '.', $item["value"]));
                        $count++;
                    } else {
                        // $data['tangki_netralisasi'][] = 0;
                        $totalValue += 0;
                    }
                    $averageValue = ($count > 0) ? $totalValue / $count : 0;
                }
                $data['tangki_netralisasi'][]   = (float) number_format($averageValue, 2);
                $start                          = date ("d-m-Y", strtotime("+1 days", strtotime($start)));
            }

            // var_dump($data['tangki_netralisasi']);die;

            //PH TANGKI OUTLET PROSES WWT ===========================================================================================================
            $url = 'https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6985';

            $hasil3 = file_get_contents($url);
            date_default_timezone_set('Asia/Jakarta');
            $start	= date('01-m-Y');
            $now	= date('t-m-Y');

            $dataoutlet = json_decode($hasil3, true);
            // var_dump($start);die;
            $data['tangki_outlet'] = [];
            
            while (strtotime($start) <= strtotime($now)) {
                $totalValue = 0;
                $count 		= 0;
                foreach ($dataoutlet['results'] as $item) {
                    if ($item["tanggal"] === $start) {
                        // $data['tangki_netralisasi'][] = $item["value"];
                        $totalValue += floatval(str_replace([',',' '], '.', $item["value"]));
                        $count++;
                    } else {
                        // $data['tangki_outlet'][] = 0;
                        $totalValue += 0;
                    }
                    $averageValue = ($count > 0) ? $totalValue / $count : 0;
                }
                $data['tangki_outlet'][] = (float) number_format($averageValue, 2);
                $start = date ("d-m-Y", strtotime("+1 days", strtotime($start)));
            }
            // var_dump($data['tangki_netralisasi']);die;


            // KOSTIK SODA WWT ======================================================================================================
            $kostikwwt_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $kostikwwt_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6444'),true);

            $data_kostik_wwt    = [];
            $index_kostik_wwt   = 0;

            foreach ($kostikwwt_shift['results'] as $item) {
                $data_kostik_wwt[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'value_kostikwwt'   => $kostikwwt_value['results'][$index_kostik_wwt]['value']
                ];
                $index_kostik_wwt++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_koswwt  = [];
            $uniqueKeys3    = [];

            foreach ($data_kostik_wwt as $item) {
                $key3 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys3[$key3]) && $item['value_kostikwwt'] !== "") {
                    $result_koswwt[]    = $item;
                    $uniqueKeys3[$key3] = true;
                }
            }

            // var_dump($result_koswwt);die;
            
            $data['data_koswwt_shift_1'] = [];
            $data['data_koswwt_shift_2'] = [];
            $data['data_koswwt_shift_3'] = [];

            $start_koswwt   = date('01-m-Y');
            $now_koswwt     = date('t-m-Y');

            while (strtotime($start_koswwt) <= strtotime($now_koswwt)) {
                $foundKW1 = 0;
                $foundKW2 = 0;
                $foundKW3 = 0;

                foreach ($result_koswwt as $rkw) {
                    if ($rkw["tanggal"] === $start_koswwt) {
                        switch ($rkw["shift"]) {
                            case "Shift 1":
                                $foundKW1 = (float) $rkw["value_kostikwwt"] * 1.5;
                                break;
                            case "Shift 2":
                                $foundKW2 = (float) $rkw["value_kostikwwt"] * 1.5;
                                break;
                            case "Shift 3":
                                $foundKW3 = (float) $rkw["value_kostikwwt"] * 1.5;
                                break;
                            default:
                                break;
                        }
                    }
                }

                $data['data_koswwt_shift_1'][] = $foundKW1;
                $data['data_koswwt_shift_2'][] = $foundKW2;	
                $data['data_koswwt_shift_3'][] = $foundKW3;			

                $start_koswwt = date ("d-m-Y", strtotime("+1 days", strtotime($start_koswwt)));
            }

            // echo json_encode($data['data_koswwt_shift_1']); 
            // echo json_encode($data['data_koswwt_shift_2']); 
            // echo json_encode($data['data_koswwt_shift_3']); 
            // die;

            // KOSTIK SODA REGENERASI MIXBED VER 2 ======================================================================================================
            $kosmik_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $kosmik_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6446'),true);

            $data_raw_kosmik    = [];
            $index_kosmik       = 0;

            foreach ($kosmik_shift['results'] as $item) {
                $data_raw_kosmik[] = [
                    'tanggal'       => $item['tanggal'],
                    'shift'         => $item['value'],
                    'value_kosmik'  => $kosmik_value['results'][$index_kosmik]['value']
                ];
                $index_kosmik++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_kosmik  = [];
            $uniqueKeys     = [];

            foreach ($data_raw_kosmik as $item) {
                $key = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys[$key]) && $item['value_kosmik'] !== "") {
                    $result_kosmik[]    = $item;
                    $uniqueKeys[$key]   = true;
                }
            }

            // var_dump($result_kosmik);die;
            
            $data['data_kosmik_shift_1'] = [];
            $data['data_kosmik_shift_2'] = [];
            $data['data_kosmik_shift_3'] = [];

            $start_kosmik   = date('01-m-Y');
            $now_kosmik     = date('t-m-Y');

            while (strtotime($start_kosmik) <= strtotime($now_kosmik)) {
                $foundItem1 = 0;
                $foundItem2 = 0;
                $foundItem3 = 0;

                foreach ($result_kosmik as $rk) {
                    if ($rk["tanggal"] === $start_kosmik) {
                        switch ($rk["shift"]) {
                            case "Shift 1":
                                $foundItem1 = (float) $rk["value_kosmik"] * 1.5;
                                break;
                            case "Shift 2":
                                $foundItem2 = (float) $rk["value_kosmik"] * 1.5;
                                break;
                            case "Shift 3":
                                $foundItem3 = (float) $rk["value_kosmik"] * 1.5;
                                break;
                            default:
                                break;
                        }
                    }
                }

                $data['data_kosmik_shift_1'][] = $foundItem1;
                $data['data_kosmik_shift_2'][] = $foundItem2;	
                $data['data_kosmik_shift_3'][] = $foundItem3;			

                $start_kosmik = date ("d-m-Y", strtotime("+1 days", strtotime($start_kosmik)));
            }

            // echo json_encode($data['data_kosmik_shift_1']); 
            // echo json_encode($data['data_kosmik_shift_2']); 
            // echo json_encode($data['data_kosmik_shift_3']); 
            // die;

            // KOSTIK SODA REGENERASI DEMIN 2 =============================================================================================================
            $kosdem_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $kosdem_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6448'),true);
        
            $data_raw_kosdem	= [];
            $index_kosdem		= 0;

            foreach ($kosdem_shift['results'] as $item) {
                $data_raw_kosdem[] = [
                    'tanggal'       => $item['tanggal'],
                    'shift'         => $item['value'],
                    'value_kosdem'  => $kosdem_value['results'][$index_kosdem]['value']
                ];
                $index_kosdem++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_kosdem	    = [];
            $uniqueKeys4		= [];

            foreach ($data_raw_kosdem as $item) {
                $key4 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys4[$key4]) && $item['value_kosdem'] !== "") {
                    $result_kosdem[]	= $item;
                    $uniqueKeys4[$key4]	= true;
                }
            }

            // var_dump($result_kosdem);die;

            $data['data_kosdem_shift_1'] = [];
            $data['data_kosdem_shift_2'] = [];
            $data['data_kosdem_shift_3'] = [];

            $start_kosdem	= date('01-m-Y');
            $now_kosdem		= date('t-m-Y');

            while (strtotime($start_kosdem) <= strtotime($now_kosdem)) {
                $foundKD1 = 0;
                $foundKD2 = 0;
                $foundKD3 = 0;

                foreach($result_kosdem as $rkd) {
                    if ($rkd["tanggal"] === $start_kosdem) {
                        switch ($rkd["shift"]) {
                            case "Shift 1":
                                $foundKD1 = (float) $rkd["value_kosdem"] * 1.5;
                                break;
                            case "Shift 2":
                                $foundKD2 = (float) $rkd["value_kosdem"] * 1.5;
                                break;
                            case "Shift 3":
                                $foundKD3 = (float) $rkd["value_kosdem"] * 1.5;
                                break;
                            default:
                                break;
                        }
                    }
                }

                $data['data_kosdem_shift_1'][] = $foundKD1;
                $data['data_kosdem_shift_2'][] = $foundKD2;
                $data['data_kosdem_shift_3'][] = $foundKD3;
                
                $start_kosdem = date ("d-m-Y", strtotime("+1 days", strtotime($start_kosdem)));
            }

            // echo json_encode($data['data_kosdem_shift_1']); 
            // echo json_encode($data['data_kosdem_shift_2']); 
            // echo json_encode($data['data_kosdem_shift_3']); 
            // die;

            // Pemakaian Asam Pekat ========================================================================================================================
            
            $asam_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $asam_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6450'),true);

            $data_asam  = [];
            $index_asam = 0;

            foreach ($asam_shift['results'] as $item) {
                $data_asam[] = [
                    'tanggal'       => $item['tanggal'],
                    'shift'         => $item['value'],
                    'nilai_asam'    => floatval(str_replace([' ', ','], '.', $asam_value['results'][$index_asam]['value']))
                ];
                $index_asam++;
            }

            // var_dump($data_asam);die;

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam     = [];
            $uniqueKeys1    = [];

            foreach ($data_asam as $item) {
                $key1 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys1[$key1]) && $item['nilai_asam'] !== "") {
                    $hasil_asam[]       = $item;
                    $uniqueKeys1[$key1] = true;
                }
            }

            // var_dump($hasil_asam);die;

            $data['data_asam_shift_1'] = [];
            $data['data_asam_shift_2'] = [];
            $data['data_asam_shift_3'] = [];

            $start_asam 	= date('01-m-Y');
            $now_asam 		= date('t-m-Y');
            
            while (strtotime($start_asam) <= strtotime($now_asam)) {			
                $foundValueShift1 = 0;
                $foundValueShift2 = 0;
                $foundValueShift3 = 0;
                
                foreach ($hasil_asam as $item) {
                    if ($item["tanggal"] === $start_asam) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundValueShift1 = (float) $item["nilai_asam"];
                                break;
                            case "Shift 2":
                                $foundValueShift2 = (float) $item["nilai_asam"];
                                break;
                            case "Shift 3":
                                $foundValueShift3 = (float) $item["nilai_asam"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['data_asam_shift_1'][] = $foundValueShift1;
                $data['data_asam_shift_2'][] = $foundValueShift2;
                $data['data_asam_shift_3'][] = $foundValueShift3;
                
                $start_asam = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam)));
            }

            // var_dump($data_asam_shift_1);die;

            // echo json_encode($data['data_asam_shift_1']); 
            // echo json_encode($data['data_asam_shift_2']); 
            // echo json_encode($data['data_asam_shift_3']); 
            // die;
                
            // HCL PROSES WWT ======================================================================================================================================================
            
            $hclwwt_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $hclwwt_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6452'),true);
        
            $data_hclwwt	= [];
            $index_hclwwt	= 0;

            foreach ($hclwwt_shift['results'] as $item) {
                $data_hclwwt[] = [
                    'tanggal'       => $item['tanggal'],
                    'shift'         => $item['value'],
                    'value_hclwwt'  => $hclwwt_value['results'][$index_hclwwt]['value']
                ];
                $index_hclwwt++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_hclwwt	= [];
            $uniqueKeys5	= [];

            foreach ($data_hclwwt as $item) {
                $key5 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys5[$key5]) && $item['value_hclwwt'] !== "") {
                    $result_hclwwt[]	= $item;
                    $uniqueKeys5[$key5]	= true;
                }
            }

            // var_dump($result_hclwwt);die;

            $data['data_hclwwt_shift_1'] = [];
            $data['data_hclwwt_shift_2'] = [];
            $data['data_hclwwt_shift_3'] = [];

            $start_hclwwt	= date('01-m-Y');
            $now_hclwwt	    = date('t-m-Y');

            while (strtotime($start_hclwwt) <= strtotime($now_hclwwt)) {
                $foundHCLW1 = 0;
                $foundHCLW2 = 0;
                $foundHCLW3 = 0;

                foreach($result_hclwwt as $hclw) {
                    if ($hclw["tanggal"] === $start_hclwwt) {
                        switch ($hclw["shift"]) {
                            case "Shift 1":
                                $foundHCLW1 = (float) $hclw["value_hclwwt"];
                                break;
                            case "Shift 2":
                                $foundHCLW2 = (float) $hclw["value_hclwwt"];
                                break;
                            case "Shift 3":
                                $foundHCLW3 = (float) $hclw["value_hclwwt"];
                                break;
                            default:
                                break;
                        }
                    }
                }

                $data['data_hclwwt_shift_1'][] = $foundHCLW1;
                $data['data_hclwwt_shift_2'][] = $foundHCLW2;
                $data['data_hclwwt_shift_3'][] = $foundHCLW3;
                
                $start_hclwwt = date ("d-m-Y", strtotime("+1 days", strtotime($start_hclwwt)));
            }

            // echo json_encode($data['data_hclwwt_shift_1']); 
            // echo json_encode($data['data_hclwwt_shift_2']); 
            // echo json_encode($data['data_hclwwt_shift_3']); 
            // die;

            // Pemakaian HCL Proses Mixbed 1 & 2 ===================================================================================================================================

            $hclmixbed_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $hclmixbed_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6464'),true);
        
            $data_hclmixbed	    = [];
            $index_hclmixbed	= 0;

            foreach ($hclmixbed_shift['results'] as $item) {
                $data_hclmixbed[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'value_hclmixbed'   => $hclmixbed_value['results'][$index_hclmixbed]['value']
                ];
                $index_hclmixbed++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_hclmixbed	= [];
            $uniqueKeys6		= [];

            foreach ($data_hclmixbed as $item) {
                $key6 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys6[$key6]) && $item['value_hclmixbed'] !== "") {
                    $result_hclmixbed[]	= $item;
                    $uniqueKeys6[$key6]	= true;
                }
            }

            // var_dump($result_hclmixbed);die;

            $data['data_hclmixbed_shift_1'] = [];
            $data['data_hclmixbed_shift_2'] = [];
            $data['data_hclmixbed_shift_3'] = [];

            $start_hclmixbed	= date('01-m-Y');
            $now_hclmixbed	    = date('t-m-Y');

            while (strtotime($start_hclmixbed) <= strtotime($now_hclmixbed)) {
                $foundHCLMIXBED1 = 0;
                $foundHCLMIXBED2 = 0;
                $foundHCLMIXBED3 = 0;

                foreach($result_hclmixbed as $hclm) {
                    if ($hclm["tanggal"] === $start_hclmixbed) {
                        switch ($hclm["shift"]) {
                            case "Shift 1":
                                $foundHCLMIXBED1 = (float) $hclm["value_hclmixbed"];
                                break;
                            case "Shift 2":
                                $foundHCLMIXBED2 = (float) $hclm["value_hclmixbed"];
                                break;
                            case "Shift 3":
                                $foundHCLMIXBED3 = (float) $hclm["value_hclmixbed"];
                                break;
                            default:
                                break;
                        }
                    }
                }

                $data['data_hclmixbed_shift_1'][] = $foundHCLMIXBED1;
                $data['data_hclmixbed_shift_2'][] = $foundHCLMIXBED2;
                $data['data_hclmixbed_shift_3'][] = $foundHCLMIXBED3;
                
                $start_hclmixbed = date ("d-m-Y", strtotime("+1 days", strtotime($start_hclmixbed)));
            }

            // echo json_encode($data['data_hclmixbed_shift_1']); 
            // echo json_encode($data['data_hclmixbed_shift_2']); 
            // echo json_encode($data['data_hclmixbed_shift_3']); 
            // die;

            // Pemakaian HCL Proses Regenerasi Demin 2 =============================================================================================================================
            $hcldemin_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $hcldemin_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6465'),true);
        
            $data_hcldemin	= [];
            $index_hcldemin	= 0;

            foreach ($hcldemin_shift['results'] as $item) {
                $data_hcldemin[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'value_hcldemin'    => $hcldemin_value['results'][$index_hcldemin]['value']
                ];
                $index_hcldemin++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_hcldemin	= [];
            $uniqueKeys7		= [];

            foreach ($data_hcldemin as $item) {
                $key7 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys7[$key7]) && $item['value_hcldemin'] !== "") {
                    $result_hcldemin[]	= $item;
                    $uniqueKeys7[$key7]	= true;
                }
            }

            // var_dump($result_hcldemin);die;

            $data['data_hcldemin_shift_1'] = [];
            $data['data_hcldemin_shift_2'] = [];
            $data['data_hcldemin_shift_3'] = [];

            $start_hcldemin	= date('01-m-Y');
            $now_hcldemin	= date('t-m-Y');

            while (strtotime($start_hcldemin) <= strtotime($now_hcldemin)) {
                $foundHCLD1 = 0;
                $foundHCLD2 = 0;
                $foundHCLD3 = 0;

                foreach($result_hcldemin as $hcld) {
                    if ($hcld["tanggal"] === $start_hcldemin) {
                        switch ($hcld["shift"]) {
                            case "Shift 1":
                                $foundHCLD1 = (float) $hcld["value_hcldemin"];
                                break;
                            case "Shift 2":
                                $foundHCLD2 = (float) $hcld["value_hcldemin"];
                                break;
                            case "Shift 3":
                                $foundHCLD3 = (float) $hcld["value_hcldemin"];
                                break;
                            default:
                                break;
                        }
                    }
                }

                $data['data_hcldemin_shift_1'][] = $foundHCLD1;
                $data['data_hcldemin_shift_2'][] = $foundHCLD2;
                $data['data_hcldemin_shift_3'][] = $foundHCLD3;
                
                $start_hcldemin = date ("d-m-Y", strtotime("+1 days", strtotime($start_hcldemin)));
            }

            // echo json_encode($data['data_hcldemin_shift_1']); 
            // echo json_encode($data['data_hcldemin_shift_2']); 
            // echo json_encode($data['data_hcldemin_shift_3']); 
            // die;

            // FECL3 CHEMICAL ======================================================================================================================================================

            $fecl_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $fecl_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6466'),true);
        
            $data_raw_fecl	= [];
            $index_fecl		= 0;

            foreach ($fecl_shift['results'] as $item) {
                $data_raw_fecl[] = [
                    'tanggal'       => $item['tanggal'],
                    'shift'         => $item['value'],
                    'value_fecl'    => $fecl_value['results'][$index_fecl]['value']
                ];
                $index_fecl++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_fecl	= [];
            $uniqueKeys8	= [];

            foreach ($data_raw_fecl as $item) {
                $key8 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys8[$key8]) && $item['value_fecl'] !== "") {
                    $result_fecl[]	    = $item;
                    $uniqueKeys8[$key8]	= true;
                }
            }

            // var_dump($result_fecl);die;

            $data['data_fecl_shift_1'] = [];
            $data['data_fecl_shift_2'] = [];
            $data['data_fecl_shift_3'] = [];

            $start_fecl	= date('01-m-Y');
            $now_fecl	= date('t-m-Y');

            while (strtotime($start_fecl) <= strtotime($now_fecl)) {

                $foundFECL1 = 0;
                $foundFECL2 = 0;
                $foundFECL3 = 0;

                foreach ($result_fecl as $fe) {
                    if ($fe["tanggal"] === $start_fecl) {
                        switch ($fe["shift"]) {
                            case "Shift 1":
                                $foundFECL1 = (float) $fe["value_fecl"];
                                break;
                            case "Shift 2":
                                $foundFECL2 = (float) $fe["value_fecl"];
                                break;
                            case "Shift 3":
                                $foundFECL3 = (float) $fe["value_fecl"];
                                break;
                            default:
                                break;
                        }
                    }
                }


                $data['data_fecl_shift_1'][] = $foundFECL1;
                $data['data_fecl_shift_2'][] = $foundFECL2;	
                $data['data_fecl_shift_3'][] = $foundFECL3;	

                $start_fecl = date ("d-m-Y", strtotime("+1 days", strtotime($start_fecl)));
            }

            // echo json_encode($data['data_fecl_shift_1']); 
            // echo json_encode($data['data_fecl_shift_2']); 
            // echo json_encode($data['data_fecl_shift_3']); 
            // die;

            // Pemakaian Kuriflok ==================================================================================================================================================

            $kuri_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6440'),true);
            $kuri_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6468'),true);
        
            $data_kuri	= [];
            $index_kuri	= 0;

            foreach ($kuri_shift['results'] as $item) {
                $data_kuri[] = [
                    'tanggal'       => $item['tanggal'],
                    'shift'         => $item['value'],
                    'value_kuri'    => $kuri_value['results'][$index_kuri]['value']
                ];
                $index_kuri++;
            }

            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $result_kuri	= [];
            $uniqueKeys9	= [];

            foreach ($data_kuri as $item) {
                $key9 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeys9[$key9]) && $item['value_kuri'] !== "") {
                    $result_kuri[]	    = $item;
                    $uniqueKeys9[$key9]	= true;
                }
            }

            // var_dump($result_kuri);die;

            $data['data_kuri_shift_1'] = [];
            $data['data_kuri_shift_2'] = [];
            $data['data_kuri_shift_3'] = [];

            $start_kuri	= date('01-m-Y');
            $now_kuri	= date('t-m-Y');

            while (strtotime($start_kuri) <= strtotime($now_kuri)) {

                $foundkuri1 = 0;
                $foundkuri2 = 0;
                $foundkuri3 = 0;

                foreach ($result_kuri as $kuriflok) {
                    if ($kuriflok["tanggal"] === $start_kuri) {
                        switch ($kuriflok["shift"]) {
                            case "Shift 1":
                                $foundkuri1 = (float) $kuriflok["value_kuri"];
                                break;
                            case "Shift 2":
                                $foundkuri2 = (float) $kuriflok["value_kuri"];
                                break;
                            case "Shift 3":
                                $foundkuri3 = (float) $kuriflok["value_kuri"];
                                break;
                            default:
                                break;
                        }
                    }
                }


                $data['data_kuri_shift_1'][] = $foundkuri1;
                $data['data_kuri_shift_2'][] = $foundkuri2;	
                $data['data_kuri_shift_3'][] = $foundkuri3;	

                $start_kuri = date ("d-m-Y", strtotime("+1 days", strtotime($start_kuri)));
            }

            // echo json_encode($data['data_kuri_shift_1']); 
            // echo json_encode($data['data_kuri_shift_2']); 
            // echo json_encode($data['data_kuri_shift_3']); 
            // die;

            // GET DATA TERBARU DARI TABLE MAX KOSTIK WWT
            $data['max_kostikwwt'] = $this->M_utama->getMaxWWT(); 
            $data['max_kostikmixbed'] = $this->M_utama->getMaxMixbed();
            $data['max_kostikdemin'] = $this->M_utama->getMaxDemin();
            //==============================================================================================================================================
            $this->load->view('layout/v_grafik1', $data);
            $this->load->view('template/footer');
        }

        // metode detail netralisasi ================================================================================================================
        public function detail($tanggal){
            $url    = 'https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6984';
            $url2   = 'https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6981';

            // Ambil data dari API
            $hasil  = file_get_contents($url);
            $hasil2 = file_get_contents($url2);

            $data_ph    = json_decode($hasil, true);
            $data_time  = json_decode($hasil2, true);

            // Olah data untuk mendapatkan data detail yang diminta
            $detail_data    = array();
            $index          = 0;

            // Kirim data ke tampilan
            $data['arr_value_ph']   = [];
            $data['arr_time']       = [];

            foreach ($data_ph['results'] as $d1) {
                if ($d1['tanggal'] == $tanggal) {
                    $detail_data[] = array(
                        'waktu' => $data_time['results'][$index]['value'],
                        'value' => (float) str_replace([',',' '],'.',$d1['value'])
                    );
                }
                $index++;
            }
            $data['detail_data'] = $detail_data;
            // var_dump($data);die;

            $this->load->view('layout/detail_netralisasi', $data);
            $this->load->view('template/footer');
        }

        // metode detail outlet =====================================================================================================================
        public function detailOutlet($tanggal){
            $url	= 'https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6985';
            $url2	= 'https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6981';

            // Ambil data dari API
            $hasilOutlet	= file_get_contents($url);
            $hasil1 		= file_get_contents($url2);

            $data_ph	= json_decode($hasilOutlet, true);
            $data_time	= json_decode($hasil1, true);

            // Olah data untuk mendapatkan data detail yang diminta
            $detail_dataOutlet	= array();
            $index				= 0;

            // Kirim data ke tampilan
            $data['arr_value_ph']	= [];
            $data['arr_time'] 		= [];
            foreach ($data_ph['results'] as $d1) {
                if ($d1['tanggal'] == $tanggal) {
                    // array_push($data['arr_value_ph'], (float) str_replace([',',' '],'.',$d1['value']));
                    // array_push($data['arr_time'], $data_time['results'][$index]['value']);
                    $detail_dataOutlet[] = array(
                        'waktu' => $data_time['results'][$index]['value'],
                        'value' => (float) str_replace([',',' '],'.',$d1['value'])
                    );

                }
                $index++;
            }
            $data['detail_dataOutlet'] = $detail_dataOutlet;
            // var_dump($data);die;

            $this->load->view('layout/detail_outlet', $data);
            $this->load->view('template/footer');
        }

        // metode tabel stok asam ===================================================================================================================
        public function stokAsam(){
            // ASAM 1400 ========================================================================================================================
            
            $asam1400_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1400_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6401'),true);
    
            $stok_asam1400  = [];
            $index_asam1400 = 0;

            foreach ($asam1400_shift['results'] as $item) {
                $stok_asam1400[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1400'    => floatval(str_replace([' ', ','], '.', $asam1400_value['results'][$index_asam1400]['value']))
                ];
                $index_asam1400++;
            }
    
            // var_dump($stok_asam1400);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1400     = [];
            $uniqueKeysAs1400   = [];

            foreach ($stok_asam1400 as $item) {
                $keyas1400 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1400[$keyas1400]) && $item['nilai_asam1400'] !== "") {
                    $hasil_asam1400[]               = $item;
                    $uniqueKeysAs1400[$keyas1400]   = true;
                }
            }
    
            // var_dump($hasil_asam1400);die;
    
            $data['stok_asam1400_shift_1'] = [];
            $data['stok_asam1400_shift_2'] = [];
            $data['stok_asam1400_shift_3'] = [];
    
            $start_asam1400 	= date('01-m-Y');
            $now_asam1400 		= date('t-m-Y');
            
            while (strtotime($start_asam1400) <= strtotime($now_asam1400)) {			
                $foundStokAs1400Shift1 = 0;
                $foundStokAs1400Shift2 = 0;
                $foundStokAs1400Shift3 = 0;
                
                foreach ($hasil_asam1400 as $item) {
                    if ($item["tanggal"] === $start_asam1400) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1400Shift1 = (float) $item["nilai_asam1400"];
                                break;
                            case "Shift 2":
                                $foundStokAs1400Shift2 = (float) $item["nilai_asam1400"];
                                break;
                            case "Shift 3":
                                $foundStokAs1400Shift3 = (float) $item["nilai_asam1400"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1400_shift_1'][] = $foundStokAs1400Shift1;
                $data['stok_asam1400_shift_2'][] = $foundStokAs1400Shift2;
                $data['stok_asam1400_shift_3'][] = $foundStokAs1400Shift3;
                $data['hasil_asam1400'] = $hasil_asam1400;
                
                $start_asam1400 = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1400)));
            }
    
            // echo json_encode($data['stok_asam1400_shift_1']); 
            // echo json_encode($data['stok_asam1400_shift_2']); 
            // echo json_encode($data['stok_asam1400_shift_3']); 
            // die;
            
            // ASAM 1310 ===============================================================================================================================
            $asam1310_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1310_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6402'),true);
    
            $stok_asam1310  = [];
            $index_asam1310 = 0;

            foreach ($asam1310_shift['results'] as $item) {
                $stok_asam1310[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1310'    => floatval(str_replace([' ', ','], '.', $asam1310_value['results'][$index_asam1310]['value']))
                ];
                $index_asam1310++;
            }
    
            // var_dump($stok_asam1310);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1310     = [];
            $uniqueKeysAs1310   = [];

            foreach ($stok_asam1310 as $item) {
                $keyas1310 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1310[$keyas1310]) && $item['nilai_asam1310'] !== "") {
                    $hasil_asam1310[]               = $item;
                    $uniqueKeysAs1310[$keyas1310]   = true;
                }
            }
    
            // var_dump($hasil_asam1310);die;
    
            $data['stok_asam1310_shift_1'] = [];
            $data['stok_asam1310_shift_2'] = [];
            $data['stok_asam1310_shift_3'] = [];
    
            $start_asam1310 	= date('01-m-Y');
            $now_asam1310 		= date('t-m-Y');
            
            while (strtotime($start_asam1310) <= strtotime($now_asam1310)) {			
                $foundStokAs1310Shift1 = 0;
                $foundStokAs1310Shift2 = 0;
                $foundStokAs1310Shift3 = 0;
                
                foreach ($hasil_asam1310 as $item) {
                    if ($item["tanggal"] === $start_asam1310) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1310Shift1 = (float) $item["nilai_asam1310"];
                                break;
                            case "Shift 2":
                                $foundStokAs1310Shift2 = (float) $item["nilai_asam1310"];
                                break;
                            case "Shift 3":
                                $foundStokAs1310Shift3 = (float) $item["nilai_asam1310"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1310_shift_1'][] = $foundStokAs1310Shift1;
                $data['stok_asam1310_shift_2'][] = $foundStokAs1310Shift2;
                $data['stok_asam1310_shift_3'][] = $foundStokAs1310Shift3;
                $data['hasil_asam1310'] = $hasil_asam1310;
                
                $start_asam1310 = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1310)));
            }
    
            // echo json_encode($data['stok_asam1310_shift_1']); 
            // echo json_encode($data['stok_asam1310_shift_2']); 
            // echo json_encode($data['stok_asam1310_shift_3']); 
            // die;
            
            //ASAM 1220 =================================================================================================================================
            $asam1220_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1220_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6407'),true);
    
            $stok_asam1220  = [];
            $index_asam1220 = 0;

            foreach ($asam1220_shift['results'] as $item) {
                $stok_asam1220[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1220'    => floatval(str_replace([' ', ','], '.', $asam1220_value['results'][$index_asam1220]['value']))
                ];
                $index_asam1220++;
            }
    
            // var_dump($stok_asam1220);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1220     = [];
            $uniqueKeysAs1220   = [];

            foreach ($stok_asam1220 as $item) {
                $keyas1220 = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1220[$keyas1220]) && $item['nilai_asam1220'] !== "") {
                    $hasil_asam1220[]               = $item;
                    $uniqueKeysAs1220[$keyas1220]   = true;
                }
            }
    
            // var_dump($hasil_asam1220);die;
    
            $data['stok_asam1220_shift_1'] = [];
            $data['stok_asam1220_shift_2'] = [];
            $data['stok_asam1220_shift_3'] = [];
    
            $start_asam1220 	= date('01-m-Y');
            $now_asam1220 		= date('t-m-Y');
            
            while (strtotime($start_asam1220) <= strtotime($now_asam1220)) {			
                $foundStokAs1220Shift1 = 0;
                $foundStokAs1220Shift2 = 0;
                $foundStokAs1220Shift3 = 0;
                
                foreach ($hasil_asam1220 as $item) {
                    if ($item["tanggal"] === $start_asam1220) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1220Shift1 = (float) $item["nilai_asam1220"];
                                break;
                            case "Shift 2":
                                $foundStokAs1220Shift2 = (float) $item["nilai_asam1220"];
                                break;
                            case "Shift 3":
                                $foundStokAs1220Shift3 = (float) $item["nilai_asam1220"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1220_shift_1'][] = $foundStokAs1220Shift1;
                $data['stok_asam1220_shift_2'][] = $foundStokAs1220Shift2;
                $data['stok_asam1220_shift_3'][] = $foundStokAs1220Shift3;
                $data['hasil_asam1220'] = $hasil_asam1220;
                
                $start_asam1220 = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1220)));
            }
    
            // echo json_encode($data['stok_asam1220_shift_1']); 
            // echo json_encode($data['stok_asam1220_shift_2']); 
            // echo json_encode($data['stok_asam1220_shift_3']); 
            // die;
    
            // STOK ASAM 1350 MCB =======================================================================================================================
            
            $asam1350MCB_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1350MCB_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6409'),true);
    
            $stok_asam1350MCB   = [];
            $index_asam1350MCB  = 0;

            foreach ($asam1350MCB_shift['results'] as $item) {
                $stok_asam1350MCB[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1350MCB' => floatval(str_replace([' ', ','], '.', $asam1350MCB_value['results'][$index_asam1350MCB]['value']))
                ];
                $index_asam1350MCB++;
            }
    
            // var_dump($stok_asam1350MCB);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1350MCB      = [];
            $uniqueKeysAs1350MCB    = [];

            foreach ($stok_asam1350MCB as $item) {
                $keyas1350MCB = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1350MCB[$keyas1350MCB]) && $item['nilai_asam1350MCB'] !== "") {
                    $hasil_asam1350MCB[]                = $item;
                    $uniqueKeysAs1350MCB[$keyas1350MCB] = true;
                }
            }
    
            // var_dump($hasil_asam1350MCB);die;
    
            $data['stok_asam1350MCB_shift_1'] = [];
            $data['stok_asam1350MCB_shift_2'] = [];
            $data['stok_asam1350MCB_shift_3'] = [];
    
            $start_asam1350MCB 		= date('01-m-Y');
            $now_asam1350MCB 		= date('t-m-Y');
            
            while (strtotime($start_asam1350MCB) <= strtotime($now_asam1350MCB)) {			
                $foundStokAs1350MCBShift1 = 0;
                $foundStokAs1350MCBShift2 = 0;
                $foundStokAs1350MCBShift3 = 0;
                
                foreach ($hasil_asam1350MCB as $item) {
                    if ($item["tanggal"] === $start_asam1350MCB) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1350MCBShift1 = (float) $item["nilai_asam1350MCB"];
                                break;
                            case "Shift 2":
                                $foundStokAs1350MCBShift2 = (float) $item["nilai_asam1350MCB"];
                                break;
                            case "Shift 3":
                                $foundStokAs1350MCBShift3 = (float) $item["nilai_asam1350MCB"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1350MCB_shift_1'][] = $foundStokAs1350MCBShift1;
                $data['stok_asam1350MCB_shift_2'][] = $foundStokAs1350MCBShift2;
                $data['stok_asam1350MCB_shift_3'][] = $foundStokAs1350MCBShift3;
                $data['hasil_asam1350MCB'] = $hasil_asam1350MCB;
                
                $start_asam1350MCB = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1350MCB)));
            }
    
            // echo json_encode($data['stok_asam1350MCB_shift_1']); 
            // echo json_encode($data['stok_asam1350MCB_shift_2']); 
            // echo json_encode($data['stok_asam1350MCB_shift_3']); 
            // die;
    
            // ASAM 1400 MCB ============================================================================================================================
            
            $asam1400MCB_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1400MCB_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6410'),true);
    
            $stok_asam1400MCB   = [];
            $index_asam1400MCB  = 0;

            foreach ($asam1400MCB_shift['results'] as $item) {
                $stok_asam1400MCB[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1400MCB' => floatval(str_replace([' ', ','], '.', $asam1400MCB_value['results'][$index_asam1400MCB]['value']))
                ];
                $index_asam1400MCB++;
            }
    
            // var_dump($stok_asam1400MCB);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1400MCB      = [];
            $uniqueKeysAs1400MCB    = [];

            foreach ($stok_asam1400MCB as $item) {
                $keyas1400MCB = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1400MCB[$keyas1400MCB]) && $item['nilai_asam1400MCB'] !== "") {
                    $hasil_asam1400MCB[]                = $item;
                    $uniqueKeysAs1400MCB[$keyas1400MCB] = true;
                }
            }
    
            // var_dump($hasil_asam1400MCB);die;
    
            $data['stok_asam1400MCB_shift_1'] = [];
            $data['stok_asam1400MCB_shift_2'] = [];
            $data['stok_asam1400MCB_shift_3'] = [];
    
            $start_asam1400MCB 		= date('01-m-Y');
            $now_asam1400MCB 		= date('t-m-Y');
            
            while (strtotime($start_asam1400MCB) <= strtotime($now_asam1400MCB)) {			
                $foundStokAs1400MCBShift1 = 0;
                $foundStokAs1400MCBShift2 = 0;
                $foundStokAs1400MCBShift3 = 0;
                
                foreach ($hasil_asam1400MCB as $item) {
                    if ($item["tanggal"] === $start_asam1400MCB) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1400MCBShift1 = (float) $item["nilai_asam1400MCB"];
                                break;
                            case "Shift 2":
                                $foundStokAs1400MCBShift2 = (float) $item["nilai_asam1400MCB"];
                                break;
                            case "Shift 3":
                                $foundStokAs1400MCBShift3 = (float) $item["nilai_asam1400MCB"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1400MCB_shift_1'][] = $foundStokAs1400MCBShift1;
                $data['stok_asam1400MCB_shift_2'][] = $foundStokAs1400MCBShift2;
                $data['stok_asam1400MCB_shift_3'][] = $foundStokAs1400MCBShift3;
                $data['hasil_asam1400MCB'] = $hasil_asam1400MCB;
                
                $start_asam1400MCB = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1400MCB)));
            }
    
            // echo json_encode($data['stok_asam1400MCB_shift_1']); 
            // echo json_encode($data['stok_asam1400MCB_shift_2']); 
            // echo json_encode($data['stok_asam1400MCB_shift_3']); 
            // die;
    
            // ASAM 1310 - WET BATTERY A ===================================================================================================================
    
            $asam1310A_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1310A_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6411'),true);
    
            $stok_asam1310A     = [];
            $index_asam1310A    = 0;

            foreach ($asam1310A_shift['results'] as $item) {
                $stok_asam1310A[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1310A'   => floatval(str_replace([' ', ','], '.', $asam1310A_value['results'][$index_asam1310A]['value']))
                ];
                $index_asam1310A++;
            }
    
            // var_dump($stok_asam1310A);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1310A    = [];
            $uniqueKeysAs1310A  = [];

            foreach ($stok_asam1310A as $item) {
                $keyas1310A = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1310A[$keyas1310A]) && $item['nilai_asam1310A'] !== "") {
                    $hasil_asam1310A[]              = $item;
                    $uniqueKeysAs1310A[$keyas1310A] = true;
                }
            }
    
            // var_dump($hasil_asam1310A);die;
    
            $data['stok_asam1310A_shift_1'] = [];
            $data['stok_asam1310A_shift_2'] = [];
            $data['stok_asam1310A_shift_3'] = [];
    
            $start_asam1310A 	= date('01-m-Y');
            $now_asam1310A 		= date('t-m-Y');
            
            while (strtotime($start_asam1310A) <= strtotime($now_asam1310A)) {			
                $foundStokAs1310AShift1 = 0;
                $foundStokAs1310AShift2 = 0;
                $foundStokAs1310AShift3 = 0;
                
                foreach ($hasil_asam1310A as $item) {
                    if ($item["tanggal"] === $start_asam1310A) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1310AShift1 = (float) $item["nilai_asam1310A"];
                                break;
                            case "Shift 2":
                                $foundStokAs1310AShift2 = (float) $item["nilai_asam1310A"];
                                break;
                            case "Shift 3":
                                $foundStokAs1310AShift3 = (float) $item["nilai_asam1310A"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1310A_shift_1'][] = $foundStokAs1310AShift1;
                $data['stok_asam1310A_shift_2'][] = $foundStokAs1310AShift2;
                $data['stok_asam1310A_shift_3'][] = $foundStokAs1310AShift3;
                $data['hasil_asam1310A'] = $hasil_asam1310A;
                
                $start_asam1310A = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1310A)));
            }
    
            // echo json_encode($data['stok_asam1310A_shift_1']); 
            // echo json_encode($data['stok_asam1310A_shift_2']); 
            // echo json_encode($data['stok_asam1310A_shift_3']); 
            // die;
    
            // STOK ASAM 1220 - WET BATTERY A ===========================================================================================================
            
            $asam1220A_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1220A_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6412'),true);
    
            $stok_asam1220A     = [];
            $index_asam1220A    = 0;

            foreach ($asam1220A_shift['results'] as $item) {
                $stok_asam1220A[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1220A'   => floatval(str_replace([' ', ','], '.', $asam1220A_value['results'][$index_asam1220A]['value']))
                ];
                $index_asam1220A++;
            }
    
            // var_dump($stok_asam1220A);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1220A    = [];
            $uniqueKeysAs1220A  = [];

            foreach ($stok_asam1220A as $item) {
                $keyas1220A = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1220A[$keyas1220A]) && $item['nilai_asam1220A'] !== "") {
                    $hasil_asam1220A[]              = $item;
                    $uniqueKeysAs1220A[$keyas1220A] = true;
                }
            }
    
            // var_dump($hasil_asam1220A);die;
    
            $data['stok_asam1220A_shift_1'] = [];
            $data['stok_asam1220A_shift_2'] = [];
            $data['stok_asam1220A_shift_3'] = [];
    
            $start_asam1220A 	= date('01-m-Y');
            $now_asam1220A 		= date('t-m-Y');
            
            while (strtotime($start_asam1220A) <= strtotime($now_asam1220A)) {			
                $foundStokAs1220AShift1 = 0;
                $foundStokAs1220AShift2 = 0;
                $foundStokAs1220AShift3 = 0;
                
                foreach ($hasil_asam1220A as $item) {
                    if ($item["tanggal"] === $start_asam1220A) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1220AShift1 = (float) $item["nilai_asam1220A"];
                                break;
                            case "Shift 2":
                                $foundStokAs1220AShift2 = (float) $item["nilai_asam1220A"];
                                break;
                            case "Shift 3":
                                $foundStokAs1220AShift3 = (float) $item["nilai_asam1220A"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1220A_shift_1'][] = $foundStokAs1220AShift1;
                $data['stok_asam1220A_shift_2'][] = $foundStokAs1220AShift2;
                $data['stok_asam1220A_shift_3'][] = $foundStokAs1220AShift3;
                $data['hasil_asam1220A'] = $hasil_asam1220A;
                
                $start_asam1220A = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1220A)));
            }
    
            // echo json_encode($data['stok_asam1220A_shift_1']); 
            // echo json_encode($data['stok_asam1220A_shift_2']); 
            // echo json_encode($data['stok_asam1220A_shift_3']); 
            // die;
    
            // ASAM 1310 - WET BATTERY F ================================================================================================================
    
            $asam1310F_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1310F_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6413'),true);
    
            $stok_asam1310F     = [];
            $index_asam1310F    = 0;

            foreach ($asam1310F_shift['results'] as $item) {
                $stok_asam1310F[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1310F'   => floatval(str_replace([' ', ','], '.', $asam1310F_value['results'][$index_asam1310F]['value']))
                ];
                $index_asam1310F++;
            }
    
            // var_dump($stok_asam1310F);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1310F    = [];
            $uniqueKeysAs1310F  = [];

            foreach ($stok_asam1310F as $item) {
                $keyas1310F = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1310F[$keyas1310F]) && $item['nilai_asam1310F'] !== "") {
                    $hasil_asam1310F[]              = $item;
                    $uniqueKeysAs1310F[$keyas1310F] = true;
                }
            }
    
            // var_dump($hasil_asam1310F);die;
    
            $data['stok_asam1310F_shift_1'] = [];
            $data['stok_asam1310F_shift_2'] = [];
            $data['stok_asam1310F_shift_3'] = [];
    
            $start_asam1310F 	= date('01-m-Y');
            $now_asam1310F 		= date('t-m-Y');
            
            while (strtotime($start_asam1310F) <= strtotime($now_asam1310F)) {			
                $foundStokAs1310FShift1 = 0;
                $foundStokAs1310FShift2 = 0;
                $foundStokAs1310FShift3 = 0;
                
                foreach ($hasil_asam1310F as $item) {
                    if ($item["tanggal"] === $start_asam1310F) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1310FShift1 = (float) $item["nilai_asam1310F"];
                                break;
                            case "Shift 2":
                                $foundStokAs1310FShift2 = (float) $item["nilai_asam1310F"];
                                break;
                            case "Shift 3":
                                $foundStokAs1310FShift3 = (float) $item["nilai_asam1310F"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1310F_shift_1'][] = $foundStokAs1310FShift1;
                $data['stok_asam1310F_shift_2'][] = $foundStokAs1310FShift2;
                $data['stok_asam1310F_shift_3'][] = $foundStokAs1310FShift3;
                $data['hasil_asam1310F'] = $hasil_asam1310F;
                
                $start_asam1310F = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1310F)));
            }
    
            // echo json_encode($data['stok_asam1310F_shift_1']); 
            // echo json_encode($data['stok_asam1310F_shift_2']); 
            // echo json_encode($data['stok_asam1310F_shift_3']); 
            // die;
    
            // ASAM 1160 - WET BATTERY F ================================================================================================================
    
            $asam1160F_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1160F_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6414'),true);
    
            $stok_asam1160F     = [];
            $index_asam1160F    = 0;

            foreach ($asam1160F_shift['results'] as $item) {
                $stok_asam1160F[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1160F'   => floatval(str_replace([' ', ','], '.', $asam1160F_value['results'][$index_asam1160F]['value']))
                ];
                $index_asam1160F++;
            }
    
            // var_dump($stok_asam1160F);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1160F    = [];
            $uniqueKeysAs1160F  = [];

            foreach ($stok_asam1160F as $item) {
                $keyas1160F = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1160F[$keyas1160F]) && $item['nilai_asam1160F'] !== "") {
                    $hasil_asam1160F[]              = $item;
                    $uniqueKeysAs1160F[$keyas1160F] = true;
                }
            }
    
            // var_dump($hasil_asam1160F);die;
    
            $data['stok_asam1160F_shift_1'] = [];
            $data['stok_asam1160F_shift_2'] = [];
            $data['stok_asam1160F_shift_3'] = [];
    
            $start_asam1160F 	= date('01-m-Y');
            $now_asam1160F 		= date('t-m-Y');
            
            while (strtotime($start_asam1160F) <= strtotime($now_asam1160F)) {			
                $foundStokAs1160FShift1 = 0;
                $foundStokAs1160FShift2 = 0;
                $foundStokAs1160FShift3 = 0;
                
                foreach ($hasil_asam1160F as $item) {
                    if ($item["tanggal"] === $start_asam1160F) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1160FShift1 = (float) $item["nilai_asam1160F"];
                                break;
                            case "Shift 2":
                                $foundStokAs1160FShift2 = (float) $item["nilai_asam1160F"];
                                break;
                            case "Shift 3":
                                $foundStokAs1160FShift3 = (float) $item["nilai_asam1160F"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1160F_shift_1'][] = $foundStokAs1160FShift1;
                $data['stok_asam1160F_shift_2'][] = $foundStokAs1160FShift2;
                $data['stok_asam1160F_shift_3'][] = $foundStokAs1160FShift3;
                $data['hasil_asam1160F'] = $hasil_asam1160F;
                
                $start_asam1160F = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1160F)));
            }
    
            // echo json_encode($data['stok_asam1160F_shift_1']); 
            // echo json_encode($data['stok_asam1160F_shift_2']); 
            // echo json_encode($data['stok_asam1160F_shift_3']); 
            // die;
    
            // ASAM 1260 - WET BATTERY F ================================================================================================================
    
            $asam1260F_shift	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6399'),true);
            $asam1260F_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6416'),true);
    
            $stok_asam1260F     = [];
            $index_asam1260F    = 0;

            foreach ($asam1260F_shift['results'] as $item) {
                $stok_asam1260F[] = [
                    'tanggal'           => $item['tanggal'],
                    'shift'             => $item['value'],
                    'nilai_asam1260F'   => floatval(str_replace([' ', ','], '.', $asam1260F_value['results'][$index_asam1260F]['value']))
                ];
                $index_asam1260F++;
            }
    
            // var_dump($stok_asam1260F);die;
    
            // REMOVE DUPLIKAT JIKA ADA VALUE KOSONG DI TANGGAL YANG SAMA
            $hasil_asam1260F    = [];
            $uniqueKeysAs1260F  = [];

            foreach ($stok_asam1260F as $item) {
                $keyas1260F = $item['tanggal'] . '-' . $item['shift'];
                if (!isset($uniqueKeysAs1260F[$keyas1260F]) && $item['nilai_asam1260F'] !== "") {
                    $hasil_asam1260F[]              = $item;
                    $uniqueKeysAs1260F[$keyas1260F] = true;
                }
            }
    
            // var_dump($hasil_asam1260F);die;
    
            $data['stok_asam1260F_shift_1'] = [];
            $data['stok_asam1260F_shift_2'] = [];
            $data['stok_asam1260F_shift_3'] = [];
    
            $start_asam1260F 	= date('01-m-Y');
            $now_asam1260F 		= date('t-m-Y');
            
            while (strtotime($start_asam1260F) <= strtotime($now_asam1260F)) {			
                $foundStokAs1260FShift1 = 0;
                $foundStokAs1260FShift2 = 0;
                $foundStokAs1260FShift3 = 0;
                
                foreach ($hasil_asam1260F as $item) {
                    if ($item["tanggal"] === $start_asam1260F) {
                        switch ($item["shift"]) {
                            case "Shift 1":
                                $foundStokAs1260FShift1 = (float) $item["nilai_asam1260F"];
                                break;
                            case "Shift 2":
                                $foundStokAs1260FShift2 = (float) $item["nilai_asam1260F"];
                                break;
                            case "Shift 3":
                                $foundStokAs1260FShift3 = (float) $item["nilai_asam1260F"];
                                break;
                            default:
                                break;
                        }
                    }
                }
                
                $data['stok_asam1260F_shift_1'][] = $foundStokAs1260FShift1;
                $data['stok_asam1260F_shift_2'][] = $foundStokAs1260FShift2;
                $data['stok_asam1260F_shift_3'][] = $foundStokAs1260FShift3;
                $data['hasil_asam1260F'] = $hasil_asam1260F;
                
                $start_asam1260F = date ("d-m-Y", strtotime("+1 days", strtotime($start_asam1260F)));
            }
    
            // echo json_encode($data['stok_asam1260F_shift_1']); 
            // echo json_encode($data['stok_asam1260F_shift_2']); 
            // echo json_encode($data['stok_asam1260F_shift_3']); 
            // die;
            //===========================================================================================================================================
            $this->load->view('layout/v_tabel1', $data);
            $this->load->view('template/footer');
        }

        // metode grafik pembuatan asam =============================================================================================================
        public function PembuatanAsam(){
            // ASAM RECYCLE =============================================================================================================================
            $recycle_jenis	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6351'),true);
            $recycle_value	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6354'),true);
    
            $data_recycle	= [];
            $index_recycle	= 0;

            foreach ($recycle_jenis['results'] as $item) {
                $data_recycle[] = [
                    'tanggal'       => $item['tanggal'],
                    'jenis_asam'    => $item['value'],
                    'value_recycle' => floatval(str_replace([' ', ','], '.', $recycle_value['results'][$index_recycle]['value']))                    
                ];
                $index_recycle++;
            }

            $result_recycle = [];
            $uniqueKeysRC   = [];
            $finish_recycle = [];
            $totalValue     = 0;
    
            foreach ($data_recycle as $item) {

                $keyRC = $item['tanggal'] . '-' . $item['jenis_asam'];
    
                if (!isset($uniqueKeysRC[$keyRC])) {
                    $uniqueKeysRC[$keyRC]   = true;
                    $result_recycle[$keyRC] = $item;
                } else {
                    if (isset($item['value_recycle'])) {
                        $result_recycle[$keyRC]['value_recycle'] += $item['value_recycle'];
                        $totalValue += $item['value_recycle'];
                    }
                }
            }
    
            // var_dump($result_recycle);die;
    
            foreach($result_recycle as $row){
                $finish_recycle[] = $row;
            }
    
            // var_dump($finish_recycle);die;
            
            $data['data_asam_1400']     = [];
            $data['data_asam_1310']     = [];
            $data['data_asam_1160']     = [];
            $data['data_asam_1260']     = [];
            $data['data_asam_1220']     = [];
            $data['data_asam_1350HP']   = [];
            $data['data_asam_1400HP']   = [];
    
            $start_rc	= date('01-m-Y');
            $now_rc		= date('t-m-Y');
    
            while (strtotime($start_rc) <= strtotime($now_rc)) {
    
                $found1400      = 0;
                $found1310      = 0;
                $found1160      = 0;
                $found1260      = 0;
                $found1220      = 0;
                $found1350HP    = 0;
                $found1400HP    = 0;
    
                foreach ($finish_recycle as $rcf) {
                    if ($rcf["tanggal"] === $start_rc) {
                        switch ($rcf["jenis_asam"]) {
                            case "1400":
                                $found1400 = (float) $rcf["value_recycle"];
                                break;
                            case "1310":
                                $found1310 = (float) $rcf["value_recycle"];
                                break;
                            case "1160":
                                $found1160 = (float) $rcf["value_recycle"];
                                break;
                            case "1260":
                                $found1260 = (float) $rcf["value_recycle"];
                                break;
                            case "1220":
                                $found1220 = (float) $rcf["value_recycle"];
                                break;  
                            case "1350HP":
                                $found1350HP = (float) $rcf["value_recycle"];
                                break;
                            case "1400HP":
                                $found1400HP = (float) $rcf["value_recycle"];
                                break;
                            default:
                                break;
                        }
                    }
                }
    
    
                $data['data_asam_1400'][]       = $found1400;
                $data['data_asam_1310'][]       = $found1310;	
                $data['data_asam_1160'][]       = $found1160;	
                $data['data_asam_1260'][]       = $found1260;
                $data['data_asam_1220'][]       = $found1220;	
                $data['data_asam_1350HP'][]     = $found1350HP;	
                $data['data_asam_1400HP'][]     = $found1400HP;	
                
    
                $start_rc = date ("d-m-Y", strtotime("+1 days", strtotime($start_rc)));
            }
    
            // echo json_encode($data['data_asam_1310']); 
            // echo json_encode($data['data_asam_1400']); 
            // echo json_encode($data['data_asam_1160']); 
            // echo json_encode($data['data_asam_1260']); 
            // echo json_encode($data['data_asam_1220']); 
            // echo json_encode($data['data_asam_1350HP']); 
            // echo json_encode($data['data_asam_1400HP']);
            // die;
    
            // HASIL PEMBUATAN ASAM =====================================================================================================================
            $jenisasam	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6351'),true);
            $qtyasam	= json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6352'),true);
    
            $data_pembuatan	    = [];
            $index_pembuatan	= 0;

            foreach ($jenisasam['results'] as $item) {
                $data_pembuatan[] = [
                    'tanggal'       => $item['tanggal'],
                    'jenis_asam'    => $item['value'],
                    'qty_asam'      => floatval(str_replace([' ', ','], '.', $qtyasam['results'][$index_pembuatan]['value']))
    
                    
                ];
                $index_pembuatan++;
            }
    
            // var_dump($data_pembuatan);die;
    
            $qty_sementara  = [];
            $uniqueKeysAsam = [];
            $qty_finish     = [];
            $totalValueA    = 0;
    
            foreach ($data_pembuatan as $item) {
                $keyA = $item['tanggal'] . '-' . $item['jenis_asam'];
    
                if (!isset($uniqueKeysAsam[$keyA])) {
                    $uniqueKeysAsam[$keyA]  = true;
                    $qty_sementara[$keyA]   = $item;
                } else {
                    if (isset($item['qty_asam'])) {
                        $qty_sementara[$keyA]['qty_asam'] += $item['qty_asam'];
                        $totalValueA += $item['qty_asam'];
                    }
                }
            }
    
            // var_dump($qty_sementara);die;
    
    
            foreach($qty_sementara as $row){
                $qty_finish[] = $row;
            }
    
            // var_dump($qty_finish);die;
    
    
            $data['qty_asam_1400']      = [];
            $data['qty_asam_1310']      = [];
            $data['qty_asam_1160']      = [];
            $data['qty_asam_1260']      = [];
            $data['qty_asam_1220']      = [];
            $data['qty_asam_1350HP']    = [];
            $data['qty_asam_1400HP']    = [];
    
            $start_Hasam	= date('01-m-Y');
            $now_Hasam	= date('t-m-Y');
    
            while (strtotime($start_Hasam) <= strtotime($now_Hasam)) {
    
                
                $foundH1400     = 0;
                $foundH1310     = 0;
                $foundH1160     = 0;
                $foundH1260     = 0;
                $foundH1220     = 0;
                $foundH1350HP   = 0;
                $foundH1400HP   = 0;
    
                foreach ($qty_finish as $qty) {
                    if ($qty["tanggal"] === $start_Hasam) {
                        switch ($qty["jenis_asam"]) {
                            case "1400":
                                $foundH1400 = (float) $qty["qty_asam"];
                                break;
                            case "1310":
                                $foundH1310 = (float) $qty["qty_asam"];
                                break;
                            case "1160":
                                $foundH1160 = (float) $qty["qty_asam"];
                                break;
                            case "1260":
                                $foundH1260 = (float) $qty["qty_asam"];
                                break;
                            case "1220":
                                $foundH1220 = (float) $qty["qty_asam"];
                                break;
                            case "1350HP":
                                $foundH1350HP = (float) $qty["qty_asam"];
                                break;
                            case "1400HP":
                                $foundH1400HP = (float) $qty["qty_asam"];
                                break;
                            default:
                                break;
                        }
                    }
                }
    
    
                $data['qty_asam_1400'][]    = $foundH1400;
                $data['qty_asam_1310'][]    = $foundH1310;	
                $data['qty_asam_1160'][]    = $foundH1160;	
                $data['qty_asam_1260'][]    = $foundH1260;
                $data['qty_asam_1220'][]    = $foundH1220;	
                $data['qty_asam_1350HP'][]  = $foundH1350HP;	
                $data['qty_asam_1400HP'][]  = $foundH1400HP;	
                
    
                $start_Hasam = date ("d-m-Y", strtotime("+1 days", strtotime($start_Hasam)));
            }
    
            // echo json_encode($data['qty_asam_1310']); 
            // echo json_encode($data['qty_asam_1400']); 
            // echo json_encode($data['qty_asam_1160']); 
            // echo json_encode($data['qty_asam_1260']); 
            // echo json_encode($data['qty_asam_1220']); 
            // echo json_encode($data['qty_asam_1350HP']); 
            // echo json_encode($data['qty_asam_1400HP']);
            // die;
            //=======================================================================================================================================
            $this->load->view('layout/v_grafik2', $data);
            $this->load->view('template/footer');            
        }

        public function counterAir(){
            // AIR MURNI UNTUK PRODUKSI ===================================================================================================================
            $ap_shift = json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6419'));
            $ap_value = json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6429'));
            
            $data_ap            = [];
            $index_ap           = 0;
            $previous_value_ap  = null; // Nilai value_ap pada shift sebelumnya
            
            foreach ($ap_shift->results as $item) {
                $current_value_ap = $ap_value->results[$index_ap]->value;
                
                if ($previous_value_ap !== null) {
                    $value_ap_difference =  $previous_value_ap - $current_value_ap ;
                } else {
                    $value_ap_difference = null; // Tidak ada selisih pada shift pertama
                }
            
                $data_ap[] = [
                    'tanggal'               => $item->tanggal,
                    'shift'                 => $item->value,
                    'value_ap'              => $current_value_ap,
                    'value_ap_difference'   => $value_ap_difference
                ];
                $previous_value_ap = $current_value_ap;
                $index_ap++;
            }

            $hasilAP            = [];
            $previous_date      = null; // Tanggal sebelumnya
            $total_difference   = 0; // Total penjumlahan value_ap_difference

            foreach ($data_ap as $row) {
                $current_date       = $row['tanggal'];
                $current_difference = $row['value_ap_difference'];

                if ($previous_date !== null && $current_date !== $previous_date) {
                    // Tanggal berubah, tambahkan hasil penjumlahan pada tanggal sebelumnya ke $hasilAP
                    $hasilAP[] = [
                        'tanggal' => $previous_date,
                        'nilaiAP' => $total_difference
                    ];

                    $total_difference = 0; // Reset total_difference untuk tanggal baru
                }

                if ($current_difference !== null) {
                    $total_difference += $current_difference;
                }

                $previous_date = $current_date;
            }

            // Menambahkan hasil penjumlahan untuk tanggal terakhir ke $hasilAP
            if ($previous_date !== null) {
                $hasilAP[] = [
                    'tanggal' => $previous_date,
                    'nilaiAP' => $total_difference
                ];
            }

            // $data['nilaiAkhir_AP'] = $hasilAP; 

            $data['nilaiAkhir_AP']  = []; 
            $startAMP	            = date('01-m-Y');
            $nowAMP	                = date('t-m-Y');

            while (strtotime($startAMP) <= strtotime($nowAMP)) {

                $foundAMP = 0;
                foreach ($hasilAP as $amp) {
                    if ($amp["tanggal"] === $startAMP) {
                        $foundAMP =$amp["nilaiAP"];
                    }
                }

                $data['nilaiAkhir_AP'][]    = $foundAMP;
                $startAMP                   = date ("d-m-Y", strtotime("+1 days", strtotime($startAMP)));
            }
            
            // echo json_encode($data['nilaiAkhir_AP']); die;
            // var_dump($hasilAP);die;

            // AIR MURNI UNTUK PRODUKSI ===================================================================================================================
            $aad_shift = json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6419'));
            $aad_value = json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6432'));
            
            $data_aad           = [];
            $index_aad          = 0;
            $previous_value_aad = null; // Nilai value_ap pada shift sebelumnya
            
            foreach ($aad_shift->results as $item) {
                $current_value_aad = $aad_value->results[$index_aad]->value;
                
                if ($previous_value_aad !== null) {
                    $value_aad_difference =  $previous_value_aad - $current_value_aad ;
                } else {
                    $value_aad_difference = null; // Tidak ada selisih pada shift pertama
                }
            
                $data_aad[] = [
                    'tanggal'               => $item->tanggal,
                    'shift'                 => $item->value,
                    'value_aad'             => $current_value_aad,
                    'value_aad_difference'  => $value_aad_difference
                ];
                $previous_value_aad = $current_value_aad;
                $index_aad++;
            }

            // var_dump($data_aad);die; // data sudah terambil tapi masih per shift 

            $hasilAAD           = [];
            $previous_date1     = null; // Tanggal sebelumnya
            $total_difference1  = 0; // Total penjumlahan value_ap_difference

            foreach ($data_aad as $row) {

                $current_date1          = $row['tanggal'];
                $current_difference1    = $row['value_aad_difference'];

                if ($previous_date1 !== null && $current_date1 !== $previous_date1) {
                    // Tanggal berubah, tambahkan hasil penjumlahan pada tanggal sebelumnya ke $hasilAP
                    $hasilAAD[] = [
                        'tanggal'   => $previous_date1,
                        'nilaiAAD'  => $total_difference1
                    ];

                    $total_difference1 = 0; // Reset total_difference untuk tanggal baru
                }

                if ($current_difference1 !== null) {
                    $total_difference1 += $current_difference1;
                }

                $previous_date1 = $current_date1;
            }

            // Menambahkan hasil penjumlahan untuk tanggal terakhir ke $hasilAP
            if ($previous_date1 !== null) {
                $hasilAAD[] = [
                    'tanggal'   => $previous_date1,
                    'nilaiAAD'  => $total_difference1
                ];
            }

            // var_dump($hasilAAD);die; // INI Udah di jumlah untuk di kelompokin per tanggal 

            $data['nilaiAkhir_AAD'] = []; 
            $startAMAD	            = date('01-m-Y');
            $nowAMAD	            = date('t-m-Y');

            while (strtotime($startAMAD) <= strtotime($nowAMAD)) {

                $foundAMAD = 0;
                foreach ($hasilAAD as $amad) {
                    if ($amad["tanggal"] === $startAMAD) {
                        $foundAMAD =$amad["nilaiAAD"];
                    }
                }

                $data['nilaiAkhir_AAD'][]   = $foundAMAD;
                $startAMAD                  = date ("d-m-Y", strtotime("+1 days", strtotime($startAMAD)));
            }
            
            // echo json_encode($data['nilaiAkhir_AAD']); die;


            // AIR MURNI UNTUK PRODUKSI ===================================================================================================================
            $olw_shift = json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6419'));
            $olw_value = json_decode(file_get_contents('https://portal2.incoe.astra.co.id/production_control/api/getDataChecksheetEhs/6437'));
            
            $data_olw           = [];
            $index_olw          = 0;
            $previous_value_olw = null; // Nilai value_ap pada shift sebelumnya
            
            foreach ($olw_shift->results as $item) {
                $current_value_olw = $olw_value->results[$index_olw]->value;
                
                if ($previous_value_olw !== null) {
                    $value_olw_difference =  $previous_value_olw - $current_value_olw;
                } else {
                    $value_olw_difference = null; // Tidak ada selisih pada shift pertama
                }
            
                $data_olw[] = [
                    'tanggal'               => $item->tanggal,
                    'shift'                 => $item->value,
                    'value_olw'             => $current_value_olw,
                    'value_olw_difference'  => $value_olw_difference
                ];
                $previous_value_olw = $current_value_olw;
                $index_olw++;
            }

            // var_dump($data_olw);die; // data sudah terambil tapi masih per shift 

            $hasilOLW           = [];
            $previous_date2     = null; // Tanggal sebelumnya
            $total_difference2  = 0; // Total penjumlahan value_ap_difference

            foreach ($data_olw as $row) {
                $current_date2       = $row['tanggal'];
                $current_difference2 = $row['value_olw_difference'];

                if ($previous_date2 !== null && $current_date2 !== $previous_date2) {
                    // Tanggal berubah, tambahkan hasil penjumlahan pada tanggal sebelumnya ke $hasilAP
                    $hasilOLW[] = [
                        'tanggal'   => $previous_date2,
                        'nilaiOLW'  => $total_difference2
                    ];

                    $total_difference2 = 0; // Reset total_difference untuk tanggal baru
                }

                if ($current_difference2 !== null) {
                    $total_difference2 += $current_difference2;
                }

                $previous_date2 = $current_date2;
            }

            // Menambahkan hasil penjumlahan untuk tanggal terakhir ke $hasilAP
            if ($previous_date2 !== null) {
                $hasilOLW[] = [
                    'tanggal'   => $previous_date2,
                    'nilaiOLW'  => $total_difference2
                ];
            }

            // var_dump($hasilOLW);die; // INI Udah di jumlah untuk di kelompokin per tanggal 

            $data['nilaiAkhir_OLW'] = []; 
            $startOLW	            = date('01-m-Y');
            $nowOLW	                = date('t-m-Y');

            while (strtotime($startOLW) <= strtotime($nowOLW)) {

                $foundOLW = 0;
                foreach ($hasilOLW as $olw) {
                    if ($olw["tanggal"] === $startOLW) {
                        $foundOLW =$olw["nilaiOLW"];
                    }
                }

                $data['nilaiAkhir_OLW'][]   = $foundOLW;
                $startOLW                   = date ("d-m-Y", strtotime("+1 days", strtotime($startOLW)));
            }
            
            // echo json_encode($data['nilaiAkhir_OLW']); die;
            //===========================================================================================================================================
            $this->load->view('layout/v_grafik3', $data);
            $this->load->view('template/footer');
                
        }  
    }
   
?>