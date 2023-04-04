<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE){
			redirect('Login/index');
		}
		$this->load->model('M_auth');
		$this->load->model('M_utama');
	}

    public function index()
	{
		$this->load->view('template/header');
		$this->load->view('home/v_utama');
		$this->load->view('template/footer');
	}

	public function prosesWWT(){
		// echo "ini tempat untuk input proses wwt";
		$data['dataMaterial']=$this->M_utama->getMaterial()->result();
		// var_dump($data['dataMaterial']);die;

		$this->load->view('template/header');
		$this->load->view('home/v_inputWWT', $data);
		$this->load->view('template/footer');
	}

	public function loadAddMaterial()
    {
		// ini buat nerima data dari view terus di split pake array_chunk(cari aja buat lebih jelasnya)
		// kenapa harus di split karena data yg dari view kalo inputnya multiple alias lebih dari row itu akan terus tambah index keliapatan 4
		// misal ada 3 row array nya jadi ada  4x3 = 12, sedangkan kalo seperti itu nanti susah buuat looping ke db nya
		// makanya perlu di split dulu setiap row nya
		$arrData = array_chunk($this->input->post('addmore'), 5);

		// kalo udah di split tinggal di looping aja disini
		// kalo bingung di vardump aja setiap prosesnya
		for ($i = 0;  $i < count($arrData); $i++) {
			$data = array(
				'material_id' => $arrData[$i][0]['material_id'], //ini kenapa manggilnya kek gini karena sesuai sama struktur array yg tadi di chunk atau di split, jadi bisa aja manggil nya beda tergantung array yg di kasih kaya gimana
				'nm_user' => $arrData[$i][1]['nm_user'],
				'jml_pemakaian' => $arrData[$i][2]['jml_pemakaian'],
				'tanggal_pemakaian' => $arrData[$i][3]['tanggal_pemakaian'],
				'month' => $arrData[$i][4]['month']
			);
			// var_dump($data);die;
			$this->db->insert('pemakaian_material', $data);

			$this->load->model('M_utama'); //panggil model
			$this->M_utama->reduceStock($data); //panggil metode yg buat ngurangin jml_stok ketika ada pemakaian
		}
		redirect('Dashboard/');
        // print_r('Data berhasil disimpan');

    }

	public function showDataPWWT(){
		// echo 'tempat buat show data material yang dipakai untuk proses wwt';
		$data['dataProses']=$this->M_utama->getProsesWWT()->result();

		$this->load->view('template/header');
		$this->load->view('home/v_showDataPWWT', $data);
		$this->load->view('template/footer');
	}
}