<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kandang_model extends CI_Model
{
    private $_table = "tbl_kandang";

    public $id_kandang;
    public $nama_kandang;
    public $kapasitas;
    public $jml_ayam;
    public $tgl_update;

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

    public function updateKandang()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_kandang SET jml_ayam = jml_ayam - $post[jumlah], tgl_update = '$post[tgl_update]' WHERE id_kandang = '$post[id_kandang]'");
            return $query;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->nama_kandang = htmlspecialchars($post["nama_kandang"], ENT_QUOTES);
        $this->kapasitas = htmlspecialchars($post["kapasitas"], ENT_QUOTES);
        $this->jml_ayam = htmlspecialchars($post["jml_ayam"], ENT_QUOTES);
        $this->tgl_update = $post["tgl_update"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'nama_kandang' => htmlspecialchars($post["nama_kandang"], ENT_QUOTES),
            'kapasitas' => htmlspecialchars($post["kapasitas"], ENT_QUOTES),
            'jml_ayam' => htmlspecialchars($post["jml_ayam"], ENT_QUOTES),
            'tgl_update' => $post["tgl_update"]
        );

       
        $this->db->where('id_kandang',$post['id']);
        $this->db->update($this->_table, $data);
    }
    
    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kandang" => $id));
    }
}