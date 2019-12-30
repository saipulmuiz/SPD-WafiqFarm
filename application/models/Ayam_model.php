<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam_model extends CI_Model
{
    private $_table = "tbl_ayam";

    public $id_ayam;
    public $jenis;
    public $jumlah;
    public $foto;

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
        return $this->db->get_where($this->_table, ["id_ayam" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_ayam = uniqid();
        $this->jenis = $post["jenis"];
        $this->jumlah = $post["jumlah"];
        $this->foto = $this->_uploadImage();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {   
        $post = $this->input->post();
        $id_ayam = $post['id'];
        if($_FILES['foto']['name']!="")
        {
            $config['upload_path'] = './assets/uploads/ayam/';
            $config['allowed_types'] =     'gif|jpg|png|jpeg|bmp';
            $config['file_name']            = $id_ayam;
            $config['max_size']             = 1024; // 1MB
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('foto'))
            {
                $error = array('error' => $this->upload->display_errors());
            }
            else
            {
                $upload_data=$this->upload->data();
                $config['image_library']='gd2';
                $config['source_image']='./assets/uploads/ayam/'.$upload_data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '50%';
                $config['width']= 500;
                $config['new_image']= './assets/uploads/ayam/'.$upload_data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $target = "./assets/uploads/ayam/" . $this->input->post('old_foto');
                if (file_exists($target) && $this->input->post('old_foto') !== "default.jpg") {
                    unlink($target);
                }
                $image_name=$upload_data['file_name'];
            }
        }
        else{
                    $image_name=$this->input->post('old_foto');
                }
        $data= array(
            'jenis' => $post["jenis"],
            'jumlah' => $post["jumlah"],
            'foto' => $image_name
        );

       
        $this->db->where('id_ayam',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id_ayam" => $id));
    }

    private function _deleteImage($id)
{
    $ayam_foto = $this->getById($id);
    if ($ayam_foto->foto != "default.jpg") {
	    $filename = explode(".", $ayam_foto->foto)[0];
		return array_map('unlink', glob(FCPATH."assets/uploads/ayam/$filename.*"));
    }
}

    private function _uploadImage()
{
    $config['upload_path']          = './assets/uploads/ayam/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
    $config['file_name']            = $this->id_ayam;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('foto')) {
        $upload_data = $this->upload->data("file_name");
        $config['image_library']='gd2';
        $config['source_image']='./assets/uploads/ayam/'.$upload_data;
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= TRUE;
        $config['quality']= '50%';
        $config['width']= 500;
        $config['new_image']= './assets/uploads/ayam/'.$upload_data;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        return $upload_data;
    }
    
    return "default.jpg";
}
}