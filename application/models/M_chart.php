<?php
    class M_chart extends Ci_Model{
    
        function report(){
            $query = $this->db->query("SELECT * FROM pemakaian_material, material WHERE pemakaian_material.material_id = material.id_material");
            if($query->num_rows() > 0){
                foreach($query->result() as $data){
                    $hasil[] = $data;
                }
                return $hasil;
            }
        }

        function getGrafikPemakaianMaterial() {
            $this->db->distinct();
            $this->db->select('pemakaian_material.*, material.id_material, material.material');
            $this->db->from('pemakaian_material');
            $this->db->join('material', 'pemakaian_material.material_id = material.id_material');
            $this->db->group_by('pemakaian_material.material_id, pemakaian_material.tanggal_pemakaian');
            $query = $this->db->get();

            
            $data = array();
            foreach ($query->result() as $row) {
                $data[] = array(
                    'id_material' => $row->id_material,
                    'material' => $row->material,
                    'jml_pemakaian' => $row->jml_pemakaian,
                    'tanggal_pemakaian' => $row->tanggal_pemakaian
                );
            }

            // var_dump($query);die;
            // dd($data);
            return $data;
        }

        function getDataTanggal() {
            $this->db->select('tanggal_pemakaian');
            $this->db->from('pemakaian_material');
            $this->db->distinct('tanggal_pemakaian');
            $this->db->group_by('tanggal_pemakaian'); // menambahkan group by
            $query = $this->db->get();
        
            $dataTanggal = array();
            foreach ($query->result() as $row) {
                $dataTanggal[] = array(
                    // 'material_id' => $row->material_id,
                    'tanggal_pemakaian' => $row->tanggal_pemakaian
                );
            }
        
            // var_dump($dataTanggal);die;
            return $dataTanggal;
        }

        function getSisaStok(){
            $this->db->select('*');
            $this->db->from('material');
            $query = $this->db->get();

            $sisaStok = array();
            foreach ($query->result() as $row) {
                $sisaStok[] = array(
                    'id_material' => $row->id_material,
                    'material' => $row->material,
                    'jml_stok' => $row->jml_stok
                );
            }
            
           
            // var_dump($sisaStok);die;
            return $sisaStok;

        }

        function getShift(){
            $this->db->select('*');
            $this->db->from('shift');
            $query = $this->db->get();

            return $query->result();
        }
        
    
    }
?>