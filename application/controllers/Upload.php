<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Upload extends CI_Controller {
            function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('logged_in') == FALSE){
                redirect('Login/index');
            }
            $this->load->model('M_auth');
            $this->load->model('M_upload');
        }

        //metode untuk buka form upload dokumen
        function create()
        {
            $this->load->model('M_upload');
            $x['kd_berkas'] = $this->M_upload->buatKode(); //variabel untuk kode dokumen otomatis
            // echo $kd_berkas; 


            $this->load->view('template/header');
            $this->load->view('upload/v_upload', $x);
            $this->load->view('template/footer');
        }

        //metode untuk proses upload dokumen ke sistem
        function proses(){
            $config['upload_path']          = './documents/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|mp4|pdf|doc|docx|xlsx';
            $config['max_size']             = 20480;
            $config['max_width']            = 10240;
            $config['max_height']           = 10240;
            $config['encrypt_name']			= FALSE;
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('berkas'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload/v_upload', $error);
            }else{
                $data['kd_berkas'] = $this->input->post('kd_berkas');
                $data['no_berkas'] = $this->input->post('no_berkas');
                $data['judul_berkas'] = $this->input->post('judul_berkas');
                $data['nm_berkas'] = $this->upload->data("file_name");
                $data['keterangan_berkas'] = $this->input->post('keterangan_berkas');
                $data['tipe_berkas'] = $this->upload->data('file_ext');
                $data['ukuran_berkas'] = $this->upload->data('file_size');
                $this->db->insert('berkas',$data);
                redirect('upload/');
            }
        }

        //metode untuk buka tampilan dokumen yang ada pada sistem
        public function index()
        {
            $data['berkas'] = $this->db->get('berkas'); //ambil tabel berkas dari db

            $this->load->view('template/header');
            $this->load->view('upload/v_berkas',$data);
            $this->load->view('template/footer');
        }


        //metode untuk download berkas yg tadi di upload berdasarkan id berkas 
        function download($id)
        { 
            $data = $this->db->get_where('berkas',['id_berkas'=>$id])->row();
            force_download('documents/'.$data->nm_berkas,NULL);
        }

        //metode untuk download file pdf ke 2
        public function getDoc1()
        {
            //load view
            $this->load->view('template/header');
            // $this->load->view('upload/v_berkas');
            $this->load->view('template/footer');


            $data = file_get_contents(base_url().'documents/IKS_System_-_POV_PIC_PT_CBI.pdf');
            $name = "iks_system_pov_cbi.pdf";

            force_download($name, $data);
        }

        public function getVideo()
        {
            //load view
            $this->load->view('template/header');
            // $this->load->view('upload/v_berkas');
            $this->load->view('template/footer');


            $data = file_get_contents(base_url().'video/video_si_ptcbi.mp4');
            $name = "video_safety_induction.mp4";

            force_download($name, $data);
        }
    }
?>