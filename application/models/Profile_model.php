<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    private $_table = "tbl_user";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    function Getuser($where) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where($where);
        $data=$this->db->get();
        return $data;
    }

    function updatePass($username,$newpass){
        $hasil=$this->db->query("UPDATE tbl_user SET password='$newpass' WHERE username='$username'");
        return $hasil;
    }

    public function updateProfile()
    {
        $post = $this->input->post();
        $data= array(
            'nama' => $post["nama"],
        );
       
        $this->db->where('id_user',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function db_update($data,$id_user)
    {
        $this->db->where('id_user', $id_user);       
        $this->db->update('tbl_user', $data);
    }

    
}