<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    private $_table = "tbl_supplier";

    public $id_supplier;
    public $nama;
    public $alamat;
    public $no_telp;
    public $jenis_supply;

    public function rules()
    {
        return [
            ['field' => 'no_telp',
            'label' => 'No_telp',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_supplier" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_supplier = uniqid();
        $this->nama = htmlspecialchars($post["nama"], ENT_QUOTES);
        $this->alamat = htmlspecialchars($post["alamat"], ENT_QUOTES);
        $this->no_telp = htmlspecialchars($post["no_telp"], ENT_QUOTES);
        $this->jenis_supply = $post["jenis_supply"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_supplier = $post["id"];
        $this->nama = htmlspecialchars($post["nama"], ENT_QUOTES);
        $this->alamat = htmlspecialchars($post["alamat"], ENT_QUOTES);
        $this->no_telp = htmlspecialchars($post["no_telp"], ENT_QUOTES);
        $this->jenis_supply = $post["jenis_supply"];
        $this->db->update($this->_table, $this, array('id_supplier' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_supplier" => $id));
    }
}