<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Telur_model extends CI_Model
{
    private $_table = "tbl_telur_harian";

    public $id_input;
    public $tgl_input;
    public $id_user;
    public $id_kandang;
    public $jumlah;
    public $telur_sehat;
    public $telur_cacat;
    public $kalkulasi_butir;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],

            ['field' => 'telur_sehat',
            'label' => 'Telur Sehat',
            'rules' => 'numeric'],

            ['field' => 'telur_cacat',
            'label' => 'Telur Cacat',
            'rules' => 'numeric']
        ];
    }

    public function getRelation()
    {
            $query = $this->db->query("SELECT * FROM tbl_telur_harian INNER JOIN tbl_user ON tbl_telur_harian.id_user=tbl_user.id_user INNER JOIN tbl_kandang ON tbl_telur_harian.id_kandang=tbl_kandang.id_kandang");
            return $query->result();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_input" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->tgl_input = $post["tgl_input"];
        $this->id_user = $post["id_user"];
        $this->id_kandang = $post["id_kandang"];
        $this->jumlah = $post["jumlah"];
        $this->telur_sehat = $post["telur_sehat"];
        $this->telur_cacat = $post["telur_cacat"];
        $this->kalkulasi_butir = $post["kalkulasi_butir"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'tgl_input' => $post["tgl_input"],
            'id_user' => $post["id_user"],
            'id_kandang' => $post["id_kandang"],
            'jumlah' => $post["jumlah"],
            'telur_sehat' => $post["telur_sehat"],
            'telur_cacat' => $post["telur_cacat"],
            'kalkulasi_butir' => $post["kalkulasi_butir"],
        );

       
        $this->db->where('id_input',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_input" => $id));
    }
}