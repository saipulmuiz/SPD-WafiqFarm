<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("User_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data User";
   	    $data["actor"] = "User";
        $data["data_user"] = $this->User_model->getAll();
        
        if($this->session->userdata('level')=='2'){
            echo "Anda tidak boleh mengakses halaman ini!";
            echo "<br>";
            echo "<button onclick='javascript:history.go(-1)'>Kembali</button>";
        }else{
        $this->load->view('user/list',$data);
        }
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data User";
        $user = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        if($this->session->userdata('level')=='2'){
            echo "Anda tidak boleh mengakses halaman ini!";
            echo "<br>";
            echo "<button onclick='javascript:history.go(-1)'>Kembali</button>";
        }else{
        $this->load->view("user/tambah",$data);
        }
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Data";
        if (!isset($id)) redirect('user');
       
        $user = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());

        if ($validation->run()) {
            $user->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["user"] = $user->getById($id);
        if (!$data["user"]) show_404();
        
        if($this->session->userdata('level')=='2'){
            echo "Anda tidak boleh mengakses halaman ini!";
            echo "<br>";
            echo "<button onclick='javascript:history.go(-1)'>Kembali</button>";
        }else{
        $this->load->view("user/ubah", $data);
        }
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->User_model->delete($id)) {
            redirect(site_url('user'));
        }
    }
}