<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class M_karyawan extends CI_Model {

        //metode ambil data karyawan =================================================================================================================
        public function getKaryawan(){

            $this->db->select('karyawan.*, karyawan.nik as npk, posisi.keterangan');
            $this->db->from('karyawan');
            $this->db->join('posisi','posisi.id_posisi = karyawan.posisi_id');
            return $this->db->get()->result();
        }

        //metode untuk ambil karyawan by id ==========================================================================================================
        public function getKaryawanById($id_karyawan){
            $query = $this->db->get_where('karyawan', array('id_karyawan' => $id_karyawan));
            return $query->result();
        }

        //buat metode query untuk ambil data posisi seluruhan ========================================================================================
        public function getPosisi(){
            $query = $this->db->get('posisi');
            return $query->result();
        }

        // metode untuk menyimpan data karyawan ======================================================================================================
        public function save_kyw($data){
            $proses = $this->db->insert('karyawan', $data);
            if($proses){
                return 1;
            }else{
                return 0;
            }
        }

        // metode ubah karyawan ======================================================================================================================
        public function proses_perbaruiKyw($data){
            $this->db->where('id_karyawan', $data['id_karyawan']);
            $query = $this->db->update('karyawan', $data);
            if($query){
                redirect('Dashboard/showKaryawan');
                // echo 'Data berhasil Diperbarui';
            }else{
                // echo 'Data gagal diperbarui';
                redirect('Dashboard/editKaryawan');
            }
        }

        //metode untuk hapus data karyawan ===========================================================================================================
        public function hapusKaryawanById($id){
            $this->db->delete('karyawan', array('id_karyawan' => $id));
            redirect('dashboard/showKaryawan');
        }

        //metode untuk ambil jumlah data karyawan yg ada pada tb di tampilkan di dashboard ===========================================================
        public function getKywOn()
        {
            $this->db->select('COUNT(id_karyawan) as onnn');
            $this->db->from('karyawan');
            $query = $this->db->get();
            return $query->result_object();
        }

        // metode untuk ambil data jadwal kerja ======================================================================================================
        public function getJadwal(){
            // $startOfWeek = date('Y-m-d', strtotime('this week Monday'));
            // $endOfWeek = date('Y-m-d', strtotime('this week Sunday'));
            $this->db->select('jadwalKerja.date_in as start_date, jadwalKerja.date_out as end_date, shift.nm_shift as shift, karyawan.nm_karyawan as name, karyawan.foto_karyawan as gambar, jadwalKerja.created_at');
            $this->db->from('jadwalKerja');
            $this->db->join('karyawan','karyawan.id_karyawan = jadwalKerja.karyawan_id');
            $this->db->join('shift','shift.id_shift = jadwalKerja.shift_id');
            // $this->db->where('jadwalKerja.date_in >=', $startOfWeek);
            // $this->db->where('jadwalKerja.date_out <=', $endOfWeek);
            $this->db->order_by('created_at', 'DESC');
            return $this->db->get()->result_array();
        }

        // metode ambil jadwal ot ====================================================================================================================
        public function getJadwalOT(){
            $this->db->select('jadwalKerjaOT.date_in as start_date, jadwalKerjaOT.date_out as end_date, jadwalKerjaOT.time_in as start_time, jadwalKerjaOT.time_out as end_time, jadwalKerjaOT.keterangan as alasanOT, jadwalKerjaOT.total as totaljam, shift.nm_shift as shift, karyawan.nm_karyawan as name');
            $this->db->from('jadwalkerjaot');
            $this->db->join('karyawan','karyawan.id_karyawan = jadwalkerjaot.karyawan_id');
            $this->db->join('shift','shift.id_shift = jadwalkerjaot.shift_id');
            return $this->db->get()->result_array();
        }
    }
?>