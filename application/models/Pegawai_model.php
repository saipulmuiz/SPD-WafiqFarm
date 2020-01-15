<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    private $_table = "tbl_pegawai";

    public $id_pegawai;
    public $nama;
    public $alamat;
    public $no_hp;
    // public $username;
    // public $password;
    // public $foto;

    public function rules()
    {
        return [
            ['field' => 'no_hp',
            'label' => 'No_hp',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pegawai" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_pegawai = uniqid();
        $this->nama = htmlspecialchars($post["nama"], ENT_QUOTES);
        $this->no_hp = htmlspecialchars($post["no_hp"], ENT_QUOTES);
        $this->alamat = htmlspecialchars($post["alamat"], ENT_QUOTES);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pegawai = $post["id"];
        $this->nama = htmlspecialchars($post["nama"], ENT_QUOTES);
        $this->no_hp = htmlspecialchars($post["no_hp"], ENT_QUOTES);
        $this->alamat = htmlspecialchars($post["alamat"], ENT_QUOTES);
        $this->db->update($this->_table, $this, array('id_pegawai' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pegawai" => $id));
    }
}