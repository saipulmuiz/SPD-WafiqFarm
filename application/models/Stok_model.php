<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model
{
    private $_table = "tbl_stok";

    public $id_stok;
    public $jenis;
    public $satuan;
    public $tgl_update;
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
        return $this->db->get_where($this->_table, ["id_stok" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_stok = uniqid();
        $this->jenis = $post["jenis"];
        $this->satuan = $post["satuan"];
        $this->tgl_update = $post["tgl_update"];
        $this->jumlah = $post["jumlah"];
        $this->db->insert($this->_table, $this);
    }

    public function update_stok_pakan()
    {
        $post = $this->input->post();
        $data= array(
            'jumlah' => $post["jumlah"],
            'tgl_update' => $post["tgl_update"]
        );

        $this->db->where('jenis','Pakan');
        $this->db->update($this->_table, $data);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'jenis' => $post["jenis"],
            'satuan' => $post["satuan"],
            'tgl_update' => $post["tgl_update"],
            'jumlah' => $post["jumlah"]
        );

        $this->db->where('id_stok',$post['id']);
        $this->db->update($this->_table, $data);
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_stok" => $id));
    }
}