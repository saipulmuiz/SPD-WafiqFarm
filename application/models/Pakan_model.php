<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_model extends CI_Model
{
    private $_table = "tbl_pakan";

    public $kd_pakan;
    public $jenis;
    public $merk;
    public $id_supplier;
    public $harga;
    public $stok;
    public $tgl_masuk;

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
            // $query = $this->db->query("SELECT * FROM tbl_pakan INNER JOIN tbl_supplier ON tbl_pakan.id_supplier=tbl_supplier.id_supplier ");
            $query = $this->db->query("SELECT * FROM tbl_supplier");
            return $query->result();
    }

    public function getSupplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_pakan INNER JOIN tbl_supplier ON tbl_pakan.id_supplier=tbl_supplier.id_supplier ");
            return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["kd_pakan" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->kd_pakan = $post["kd_pakan"];
        $this->jenis = $post["jenis"];
        $this->merk = $post["merk"];
        $this->id_supplier = $post["id_supplier"];
        $this->harga = $post["harga"];
        $this->stok = $post["stok"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'jenis' => $post["jenis"],
            'merk' => $post["merk"],
            'id_supplier' => $post["id_supplier"],
            'harga' => $post["harga"],
            'stok' => $post["stok"],
            'tgl_masuk' => $post["tgl_masuk"]
            
        );

       
        $this->db->where('kd_pakan',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("kd_pakan" => $id));
    }
}