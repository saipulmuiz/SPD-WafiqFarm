<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_model extends CI_Model
{
    private $_table = "tbl_pakan";

    public $id_pakan;
    public $merk;
    public $id_supplier;
    public $stok;
    public $tgl_update;

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
        return $this->db->get_where($this->_table, ["id_pakan" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_pakan = uniqid();
        $this->merk = $post["merk"];
        $this->id_supplier = $post["id_supplier"];
        $this->stok = $post["stok"];
        $this->tgl_update = $post["tgl_update"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'merk' => $post["merk"],
            'id_supplier' => $post["id_supplier"],
            'stok' => $post["stok"],
            'tgl_update' => $post["tgl_update"]
        );

       
        $this->db->where('id_pakan',$post['id']);
        $this->db->update($this->_table, $data);
    }

    function update_pakan(){
        $kobar=$this->input->post('kobar');
        $nabar=$this->input->post('nabar');
        $harga=$this->input->post('harga');
        $data=$this->m_barang->update_barang($kobar,$nabar,$harga);
        echo json_encode($data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_pakan" => $id));
    }
}