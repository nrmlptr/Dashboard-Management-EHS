<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_upload extends CI_Model {
	
    public function buatKode(){
        $this->db->select('RIGHT(berkas.kd_berkas,5) as kd_berkas', FALSE);
        $this->db->order_by('kd_berkas','DESC');    
        $this->db->limit(1);    
        $query = $this->db->get('berkas');
            if($query->num_rows() <> 0){      
                $data = $query->row();
                $kode = intval($data->kd_berkas) + 1; 
            }
            else{      
                $kode = 1;  
            }
        $batas = str_pad($kode, 5, "0", STR_PAD_LEFT);    
        $kodetampil = "DOC".$batas;
        return $kodetampil;  
    }
}
?>