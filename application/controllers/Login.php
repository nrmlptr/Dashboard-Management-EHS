<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_auth');
			$this->load->helper('url_helper');
			$this->load->library('session');
			$this->load->library('form_validation');
		}


		//metode untuk pertama masuk sistem tampilkan login halaman
		public function index()
		{
			if ($this->session->userdata('logged_in')) {
				redirect('');
			}
			$this->load->view('auth/v_login.php');
		}

		//=============================================================================================================================
		//metode yang dibuat berfungsi untuk memvalidasi apakah data yang dimasukan ketika login benar ada atau tidak
		// public function verifyLogin(){
			// //inputan oleh user
			// $username =  $this->input->post('username');
			// $password =  $this->input->post('upass');
			

		// 	//bandingkan inputan dengan data tersimpan dalam DB
		// 	$this->load->model('M_auth');
		// 	$getUser = $this->M_auth->verifyAkun($username,$password);
		// 	if(!$getUser){
		// 		redirect('Login/index');//kondisi jika data username dan pw tidak ada dalm tabel users di db, maka akan diarahkan kembali pada halaman login (tidak bisa akses dashboard)
		// 	}else{
		// 		// echo "Berhasil Masuk";
		// 		$datauser = array(
		// 			'username' 		=> $username,
		// 			'akses' 	=> $getUser->akses,
		// 			'logged_in' => TRUE
		// 		);

		// 		$this->session->set_userdata($datauser);  //buat session untuk hak izin akses

		// 		//buat kondisi jika berhasil login akan pergi kemana
		// 		if($getUser->akses == 1){
		// 		    redirect('Dashboard/');
		// 		}elseif($getUser->akses == 2){
		// 		    redirect('Produksi/');
		// 		}
		// 	}
		// }

		public function verifyLogin(){
			//inputan oleh user
			$username =  $this->input->post('username');
			$password =  $this->input->post('upass');
			$getUser   = $this->M_auth->verifyAkun($username, $password);

			if($getUser){
				$datauser = array(
					'username' 		=> $username,
					'akses' 		=> $getUser->akses,
					'logged_in' 	=> TRUE
				);
				$this->session->set_userdata($datauser); //buat session untuk hak izin akses


				//buat kondisi jika berhasil login akan pergi kemana
				if($getUser->akses == 1){
					redirect('Dashboard/');
				}elseif($getUser->akses == 2){
					redirect('Produksi/');
				}

			}else {
				//if login failed
				$this->session->set_flashdata('error', 'Username atau Password Salah!');
				redirect('Login/index');//kondisi jika data username dan pw tidak ada dalm tabel users di db, maka akan diarahkan kembali pada halaman login (tidak bisa akses dashboard)
			}
		}

		//=============================================================================================================================================================================================
		//buat metode untuk logout dari sistem
		public function logout(){
			$this->session->sess_destroy();
			redirect('Login/index');
		}



	}

?>