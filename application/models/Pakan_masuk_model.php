<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_masuk_model extends CI_Model
{
    private $_table = "tbl_pakan_masuk";

    public $id_input;
    public $merk;
    public $id_supplier;
    public $tgl_masuk;
    public $harga;
    public $jumlah;
    public $total_harga;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Stok',
            'rules' => 'numeric'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function get_supplier()
    {
            // $query = $this->db->query("SELECT * FROM tbl_pakan INNER JOIN tbl_supplier ON tbl_pakan.id_supplier=tbl_supplier.id_supplier ");
            $query = $this->db->query("SELECT * FROM tbl_supplier");
            return $query->result();
    }

    public function getSupplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_pakan_masuk INNER JOIN tbl_supplier ON tbl_pakan_masuk.id_supplier=tbl_supplier.id_supplier ");
            return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_input" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->merk = $post["merk"];
        $this->id_supplier = $post["id_supplier"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->harga = $post["harga"];
        $this->jumlah = $post["jumlah"];
        $this->total_harga = $post["total_harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'merk' => $post["merk"],
            'id_supplier' => $post["id_supplier"],
            'tgl_masuk' => $post["tgl_masuk"],
            'harga' => $post["harga"],
            'jumlah' => $post["jumlah"],
            'total_harga' => $post["total_harga"]
        );

       
        $this->db->where('id_input',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_input" => $id));
    }
}