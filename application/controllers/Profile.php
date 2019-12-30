<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller

{
    public function __construct()

   {

       parent::__construct();
       if($this->session->userdata('status') != "MASUK"){
        redirect(base_url("otentikasi"));
    }
    $this->load->model("Profile_model");
   }

   public function index()
   {
    $data["title"] = "Profile";
    $data["profile"] = $this->Profile_model->getAll();
    
    $this->load->view('profile',$data);    
    }

    function check_account()
    {
		$old_password=md5($this->input->post('opassword'));
		$username=$this->input->post('username');
		$cek=$this->Profile_model->Getuser(array('password' => $old_password,'username'=>$username));
		if($cek->num_rows()>=1){
			echo json_encode(false);
			// jika cek user bernilai lebih dari sama dengan 1 (ada data) maka kirimkan nilai false
		} else{
			echo json_encode(true);
		}
    }
    
    function ubahPass(){
        $username=$this->input->post('username');
        $newpass=md5($this->input->post('newpass'));
        $data=$this->Profile_model->updatePass($username,$newpass);
        echo json_encode($data);
        $this->session->set_flashdata('success', 'Password Berhasil diubah!');
    }

    public function ubahProfile()
    {
        $user = $this->Profile_model;

        $user->updateProfile();
        $this->session->set_userdata('nama', $this->input->post('nama'));
        $this->session->set_flashdata('success', 'Data Berhasil diubah!');
        redirect(site_url('profile'));
    }

    public function updateFoto()
    {
        $id_user=$this->input->post("id_user");

        if($_FILES['foto']['name']!="")
        {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] =     'gif|jpg|png|jpeg|bmp';
            $config['file_name']            = $id_user;
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
                $config['source_image']='./assets/uploads/'.$upload_data['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= TRUE;
                $config['quality']= '50%';
                $config['width']= 250;
                $config['new_image']= './assets/uploads/'.$upload_data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                unlink("./assets/uploads/" . $this->input->post('old_foto'));
                $image_name=$upload_data['file_name'];
            }
        }
        else{
                    $image_name=$this->input->post('old_foto');
                }
        $data=array('foto'=>$image_name);
        $this->Profile_model->db_update($data,$id_user);
        $this->session->set_userdata('foto', $image_name);
        $this->session->set_flashdata('success', 'Foto Berhasil diubah!');
        redirect(site_url('profile'));
    }
}
 ?>