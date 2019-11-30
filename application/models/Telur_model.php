<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Telur_model extends CI_Model
{
    private $_table = "tbl_telur";

    public $id_telur;
    public $jenis;
    public $kualitas;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_telur" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_telur = uniqid();
        $this->jenis = $post["jenis"];
        $this->kualitas = $post["kualitas"];
        $this->jumlah = $post["jumlah"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'jenis' => $post["jenis"],
            'kualitas' => $post["kualitas"],
            'jumlah' => $post["jumlah"]
        );

       
        $this->db->where('id_telur',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_telur" => $id));
    }
}