<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vitamin_model extends CI_Model
{
    private $_table = "tbl_vitamin";

    public $id_vitamin;
    public $merk;
    public $id_supplier;
    public $stok;

    public function rules()
    {
        return [
            ['field' => 'stok',
            'label' => 'Stok',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function get_supplier()
    {
            // $query = $this->db->query("SELECT * FROM tbl_vitamin INNER JOIN tbl_supplier ON tbl_vitamin.id_supplier=tbl_supplier.id_supplier ");
            $query = $this->db->query("SELECT * FROM tbl_supplier");
            return $query->result();
    }

    public function getSupplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_vitamin INNER JOIN tbl_supplier ON tbl_vitamin.id_supplier=tbl_supplier.id_supplier ");
            return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_vitamin" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_vitamin = uniqid();
        $this->merk = $post["merk"];
        $this->id_supplier = $post["id_supplier"];
        $this->stok = $post["stok"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'merk' => $post["merk"],
            'id_supplier' => $post["id_supplier"],
            'stok' => $post["stok"]
        );

       
        $this->db->where('id_vitamin',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_vitamin" => $id));
    }
}