<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kandang_model extends CI_Model
{
    private $_table = "tbl_kandang";

    public $id_kandang;
    public $kapasitas;
    public $jml_ayam;

    public function rules()
    {
        return [
            ['field' => 'kapasitas',
            'label' => 'Kapasitas',
            'rules' => 'numeric'],

            ['field' => 'jml_ayam',
            'label' => 'Jml_ayam',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kandang" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->kapasitas = $post["kapasitas"];
        $this->jml_ayam = $post["jml_ayam"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kandang = $post["id"];
        $this->kapasitas = $post["kapasitas"];
        $this->jml_ayam = $post["jml_ayam"];
        $this->db->update($this->_table, $this, array('id_kandang' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kandang" => $id));
    }
}