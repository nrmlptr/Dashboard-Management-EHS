<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE){
			redirect('Login/index');
		}
		$this->load->model('M_auth');
		$this->load->model('M_karyawan');
		$this->load->model('M_shift');
		$this->load->model('M_utama');
		$this->load->helper('url');
		$this->load->model('M_chart');
	}
	
	//==========================================================================================================================================================================
	public function index()
	{
		$karyawan_on = $this->M_karyawan->getKywOn();
		// $apar_off = $this->HomeModel->getAparOff();

		foreach ($karyawan_on as $on) {
			$data['on'] = $on->onnn;
		}

		// foreach ($apar_off as $off) {
		// 	$data['off'] = $off->offff;
		// }

		$data['dataProses']=$this->M_utama->getProses()->result(); //data buat di tabel based tanggal hari ini saja

		$data['reportMat'] = $this->M_chart->report(); // panggil data grafik tapi malah nyatu

        $data['grafik'] = $this->M_chart->getGrafikPemakaianMaterial(); //data grafik buat jml_pemakaiannya

		$data['tanggal'] = $this->M_chart->getDataTanggal(); //kata ka luky buat data grafik baru buat ambil tanggalnya aja 

		$data['stokMaterial'] = $this->M_chart->getSisaStok(); //ambil sisastok ditabel material

		$data['dataShift'] = $this->M_chart->getShift();

		// var_dump($data['dataShift']);die;
 
		$this->load->view('template/header');
		$this->load->view('dashboard/v_utama', $data);
		$this->load->view('template/footer');
	}

	//===================================================== MASTER KARYAWAN ===================================================================

	//metode untuk tampilkan data master karyawan
	public function showKaryawan(){

		// $this->load->model('M_karyawan');
		$data['list_karyawan'] = $this->M_karyawan->getKaryawan();
		// var_dump($data['list_karyawan']);die;

		$this->load->view('template/header');
		$this->load->view('dashboard/v_karyawan', $data);
		$this->load->view('template/footer');
	}

	//metode tampilkan form tambah karyawan
	public function addKaryawan(){
		$this->load->view('template/header');
		$this->load->view('dashboard/v_addKaryawan');
		$this->load->view('template/footer');
	}

	//metode proses simpan tambah karyawan
	public function loadAddKaryawan(){
		// var_dump($_POST);die;
		//proses upload
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('karyawanFile'))
				{
					$error = array('error' => $this->upload->display_errors());

					// $this->load->view('upload_form', $error);
					redirect('dashboard/addKaryawan');
				}
				else
				{
					$dataUpload = array('upload_data' => $this->upload->data());

					// $this->load->view('upload_success', $data);
				}
			//end upload
		
		$data['nik'] = $this->input->post('nik');
		$data['nm_karyawan'] = $this->input->post('nm_karyawan');
		$data['foto_karyawan'] = $this->upload->data('file_name');


		$this->load->model('M_karyawan');
		$this->M_karyawan->addKaryawan($data);
	}

	//metode tampilkan edit karyawan
	public function editKaryawan(){
		// echo "Ini tempat perbarui data";
		//buat ngetes buttonnya berfungsi atau engga
		$this->load->view('template/header');

		$id_karyawan = $this->uri->segment(3);
		$data['kyw'] = $this->M_karyawan->getKaryawanById($id_karyawan);

		// var_dump($data['kyw']);die();
		$this->load->view('dashboard/v_editKaryawan',$data);
		$this->load->view('template/footer');
	}

	//metode proses simpan edit karyawan
	public function loadEditKaryawan(){
		// var_dump($_POST);die;

		//proses upload gambar
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2048;
			$config['max_width']            = 1024;
			$config['max_height']           = 1024;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('karyawanFile')){
				$error = array('error' => $this->upload->display_errors());
				$id = $this->input->post('id_karyawan');
				$data['nik'] = $this->input->post('nik');
				$data['nm_karyawan'] = $this->input->post('nm_karyawan');

				$this->load->model('M_karyawan');
				$this->M_karyawan->updateKaryawan($id, $data);
				// $this->load->view('upload_form', $error);
				redirect('dashboard/editKaryawan');
			}
			else{
				$dataUpload = array('upload_data' => $this->upload->data());
				// $this->load->view('upload_success', $data);
				$id = $this->input->post('id_karyawan');
				$data['nik'] = $this->input->post('nik');
				$data['nm_karyawan'] = $this->input->post('nm_karyawan');
				$data['foto_karyawan'] = $this->upload->data('file_name');


				$this->load->model('M_karyawan');
				$this->M_karyawan->updateKaryawan($id, $data);

			}
		//end upload
	}

	//metode hapus karyawan by id
	public function deleteKaryawanById(){
		$id = $this->uri->segment(3);
		$this->load->model('M_karyawan');
		$this->M_karyawan->hapusKaryawanById($id);
	}

	//==============================================================================================================================================================================

	//metode untuk tampilan menu shift
	public function showShift(){

		// $this->load->model('M_karyawan');
		$data['list_shift'] = $this->M_shift->getShift();
		// var_dump($data['list_shift']);die;

		$this->load->view('template/header');
		$this->load->view('dashboard/v_shift', $data);
		$this->load->view('template/footer');
	}

	public function editShift(){
		// echo "ini tempat untuk edit shift";
		$this->load->view('template/header');

		$id_shift = $this->uri->segment(3);
		$data['shift'] = $this->M_shift->getShiftbyID($id_shift);

		// var_dump($data['shift']);die;
		$this->load->view('dashboard/v_editShift', $data);
		$this->load->view('template/footer');
	}

	//metode proses simpan edit shift
	public function loadEditShift(){
		// var_dump($_POST);die;
		// array(3) { ["nm_shift"]=> string(8) "Shift 22" ["id_shift"]=> string(1) "1" ["wkt_shift"]=> string(13) "09.00 - 12.30" }

		$id = $this->input->post('id_shift');
		$data['nm_shift'] = $this->input->post('nm_shift');
		$data['waktu_shift'] = $this->input->post('waktu_shift');

		$this->load->model('M_shift');
		$this->M_shift->updateShift($id, $data);

	}

	//metode hapus data shift by id
	public function deleteShiftById(){
		$id = $this->uri->segment(3);
		$this->load->model('M_shift');
		$this->M_shift->hapusShiftById($id);
	}
}
