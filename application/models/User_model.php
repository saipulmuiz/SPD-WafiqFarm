<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "tbl_user";

    public $id_user;
    public $nama;
    public $username;
    public $password;
    public $foto;

    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_user" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_user = uniqid();
        $this->nama = $post["nama"];
        $this->username = strtolower(stripslashes($post["username"]));
        $this->password = md5($post["password"]);
        $this->level = $post["level"];
        $this->foto = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'nama' => $post["nama"],
            'level' => $post["level"],
        );
       
        $this->db->where('id_user',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_user" => $id));
    }

    private function _deleteImage($id)
{
    $product = $this->getById($id);
    if ($product->foto != "default.jpg") {
	    $filename = explode(".", $product->foto)[0];
		return array_map('unlink', glob(FCPATH."assets/uploads/$filename.*"));
    }
}

    private function _uploadImage()
{
    $config['upload_path']          = './assets/uploads/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id_user;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        $upload_data = $this->upload->data("file_name");
        $config['image_library']='gd2';
        $config['source_image']='./assets/uploads/'.$upload_data;
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= TRUE;
        $config['quality']= '50%';
        $config['width']= 250;
        $config['new_image']= './assets/uploads/'.$upload_data;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return $upload_data;
    }
    
    return "default.jpg";
}
}