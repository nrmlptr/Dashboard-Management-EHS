<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_karyawan extends CI_Model {
        
        //metode yang dibuat untuk mengambil data dari tabel karyawan pada db secara keseluruhan
        public function getKaryawan(){
            $query = $this->db->get('karyawan');
            return $query->result();  
        }

        //metode untuk ambil karyawan by id
        public function getKaryawanById($id_karyawan){
            $query = $this->db->get_where('karyawan', array('id_karyawan' => $id_karyawan));
            return $query->result();
        }

        //metode untuk tambah data karyawan
        public function addKaryawan($data){
            $data = array(
                'nik' => $data['nik'],
                'nm_karyawan' => $data['nm_karyawan'],
                'foto_karyawan' => $data['foto_karyawan']
            );

            $run = $this->db->insert('karyawan', $data);
            if($run){
                redirect('Dashboard/showKaryawan');
            }else{
                echo("Gagal Simpan");
                redirect('Dashboard/addKaryawan');
            }
        }

        //metode untuk edit data karyawan
        public function updateKaryawan($id, $data){

            $this->db->where('id_karyawan', $id);
            $run = $this->db->update('karyawan', $data);

            if($run){
                redirect('Dashboard/showKaryawan');
            }else{
                echo"(Gagal Ubah Data)";
                redirect('Dashboard/editKaryawan');
            }
        }

        //metode untuk hapus data karyawan
        public function hapusKaryawanById($id){
            $this->db->delete('karyawan', array('id_karyawan' => $id));
            redirect('dashboard/showKaryawan');
        }

        //metode untuk ambil jumlah data karyawan yg ada pada tb di tampilkan di dashboard
        public function getKywOn()
        {
            $this->db->select('COUNT(id_karyawan) as onnn');
            $this->db->from('karyawan');
            // $this->db->where('expired_date >=', date('Y-m-d'));
            $query = $this->db->get();
            return $query->result_object();
        }
    }
?>