<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
	public function verifyAkun($username,$password)
	{
		$query = $this->db->get_where('users', array('username' => $username, 'upass' => $password));

		if(isset($query)){
			if(count($query->result()) > 1){
				return false;
			}else{
				return $query->row();
			}
		}
	}
}
?>