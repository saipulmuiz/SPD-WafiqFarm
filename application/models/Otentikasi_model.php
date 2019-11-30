<?php 

class Otentikasi_model extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	public function get($username){
        $this->db->where('username', $username);
        $result = $this->db->get('tbl_user')->row();
        return $result;
    }
}