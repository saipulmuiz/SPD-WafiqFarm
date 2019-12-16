<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vitamin_pakai_model extends CI_Model
{
    private $_table = "tbl_vitamin_pakai";

    public $id_input;
    public $merk;
    public $tgl_input;
    public $waktu_input;
    public $id_user;
    public $id_kandang;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric']
        ];
    }

    public function getRelation()
    {
            $query = $this->db->query("SELECT * FROM tbl_vitamin_pakai INNER JOIN tbl_user ON tbl_vitamin_pakai.id_user=tbl_user.id_user INNER JOIN tbl_kandang ON tbl_vitamin_pakai.id_kandang=tbl_kandang.id_kandang");
            return $query->result();
    }

    public function getMerk()
    {
            $query = $this->db->query("SELECT * FROM tbl_vitamin ");
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

    public function updateStok_keluar()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_vitamin SET stok = stok - $post[jumlah], tgl_update = '$post[tgl_update]' WHERE merk = '$post[merk]'");
            return $query;
    }

    public function ubahStok_keluar()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_vitamin SET stok = stok + $post[fix_jml], tgl_update = '$post[tgl_update]' WHERE merk = '$post[merk]'");
            return $query;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->merk = $post["merk"];
        $this->tgl_input = $post["tgl_input"];
        $this->waktu_input = $post["waktu_input"];
        $this->id_user = $post["id_user"];
        $this->id_kandang = $post["id_kandang"];
        $this->jumlah = $post["jumlah"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'merk' => $post["merk"],
            'tgl_input' => $post["tgl_input"],
            'waktu_input' => $post["waktu_input"],
            'id_user' => $post["id_user"],
            'id_kandang' => $post["id_kandang"],
            'jumlah' => $post["jumlah"],
        );

       
        $this->db->where('id_input',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_input" => $id));
    }
}