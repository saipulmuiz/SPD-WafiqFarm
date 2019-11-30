<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    private $_table = "tbl_pegawai";

    public $id_pegawai;
    public $nama;
    public $alamat;
    public $no_hp;
    // public $username;
    // public $password;
    // public $foto;

    public function rules()
    {
        return [
            ['field' => 'no_hp',
            'label' => 'No_hp',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_pegawai" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_pegawai = uniqid();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        // $this->username = strtolower(stripslashes($post["username"]));
        // $this->password = md5($post["password"]);
        // $this->foto = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_pegawai = $post["id"];
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        // $this->username = strtolower(stripslashes($post["username"]));
        // $this->password = md5($post["password"]);
        // if (!empty($_FILES["foto"]["name"])) {
        //     $this->foto = $this->_uploadImage();
        // } else {
        //     $this->foto = $post["old_foto"];
        // }
        $this->db->update($this->_table, $this, array('id_pegawai' => $post['id']));
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_pegawai" => $id));
    }

//     private function _deleteImage($id)
// {
//     $product = $this->getById($id);
//     if ($product->foto != "default.jpg") {
// 	    $filename = explode(".", $product->foto)[0];
// 		return array_map('unlink', glob(FCPATH."assets/uploads/$filename.*"));
//     }
// }

//     private function _uploadImage()
// {
//     $config['upload_path']          = './assets/uploads/';
//     $config['allowed_types']        = 'gif|jpg|png';
//     $config['file_name']            = $this->id_pegawai;
//     $config['overwrite']			= true;
//     $config['max_size']             = 1024; // 1MB
//     // $config['max_width']            = 1024;
//     // $config['max_height']           = 768;

//     $this->load->library('upload', $config);

//     if ($this->upload->do_upload('foto')) {
//         return $this->upload->data("file_name");
//     }
    
//     return "default.jpg";
// }
}