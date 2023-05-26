<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_shift extends CI_Model {
        
        //model untuk get data dari tabel shift ======================================================================================================
        public function getShift(){
            $query = $this->db->get('shift');
            return $query->result();  
        }

        //model untuk ambil data shift by id =========================================================================================================
        public function getShiftbyID($id_shift){
            $query = $this->db->get_where('shift', array('id_shift' => $id_shift));
            return $query->result();
        }

        // model untuk mengubah shift ================================================================================================================
        public function updateShift($id, $data){

            $this->db->where('id_shift', $id);
            $run = $this->db->update('shift', $data);

            if($run){
                redirect('Dashboard/showShift');
            }else{
                echo"(Gagal Ubah Data)";
                redirect('Dashboard/editShift');
            }
        }

        // model untuk menghapus data shift ===========================================================================================================
        public function hapusShiftById($id){
            $this->db->delete('shift', array('id_shift' => $id));
            redirect('dashboard/showShift');
        }
    }
?>