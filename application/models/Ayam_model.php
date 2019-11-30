<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam_model extends CI_Model
{
    private $_table = "tbl_ayam";

    public $id_ayam;
    public $jenis;
    public $umur;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'umur',
            'label' => 'Umur',
            'rules' => 'numeric'],

            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_ayam" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_ayam = uniqid();
        $this->jenis = $post["jenis"];
        $this->umur = $post["umur"];
        $this->jumlah = $post["jumlah"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'jenis' => $post["jenis"],
            'umur' => $post["umur"],
            'jumlah' => $post["jumlah"]
        );

       
        $this->db->where('id_ayam',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_ayam" => $id));
    }
}