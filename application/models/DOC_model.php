<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DOC_model extends CI_Model
{
    private $_table = "tbl_doc";

    public $id_doc;
    public $jenis;
    public $id_supplier;
    public $tgl_masuk;
    public $umur;
    public $jumlah;
    public $harga;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],
            ['field' => 'umur',
            'label' => 'Umur',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function get_supplier()
    {
            // $query = $this->db->query("SELECT * FROM tbl_doc INNER JOIN tbl_supplier ON tbl_doc.id_supplier=tbl_supplier.id_supplier ");
            $query = $this->db->query("SELECT * FROM tbl_supplier");
            return $query->result();
    }

    public function getSupplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_doc INNER JOIN tbl_supplier ON tbl_doc.id_supplier=tbl_supplier.id_supplier ");
            return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_doc" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_doc = $post["id_doc"];
        $this->jenis = $post["jenis"];
        $this->id_supplier = $post["id_supplier"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->umur = $post["umur"];
        $this->jumlah = $post["jumlah"];
        $this->harga = $post["harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'jenis' => $post["jenis"],
            'id_supplier' => $post["id_supplier"],
            'tgl_masuk' => $post["tgl_masuk"],
            'umur' => $post["umur"],
            'jumlah' => $post["jumlah"],
            'harga' => $post["harga"]
        );

       
        $this->db->where('id_doc',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_doc" => $id));
    }
}