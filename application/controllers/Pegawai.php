<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Pegawai_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Pegawai";
   	    $data["actor"] = "Pegawai";
        $data["data_pegawai"] = $this->Pegawai_model->getAll();
        if($this->session->userdata('level')=='2'){
            echo "Anda tidak boleh mengakses halaman ini!";
            echo "<br>";
            echo "<button onclick='javascript:history.go(-1)'>Kembali</button>";
        }else{
        $this->load->view('pegawai/list',$data);
        }
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data Pegawai";
        $pegawai = $this->Pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }
        if($this->session->userdata('level')=='2'){
            echo "Anda tidak boleh mengakses halaman ini!";
            echo "<br>";
            echo "<button onclick='javascript:history.go(-1)'>Kembali</button>";
        }else{
        $this->load->view("pegawai/tambah");
        }
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Pegawai";
        if (!isset($id)) redirect('pegawai');
       
        $pegawai = $this->Pegawai_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["pegawai"] = $pegawai->getById($id);
        if (!$data["pegawai"]) show_404();
        
        if($this->session->userdata('level')=='2'){
            echo "Anda tidak boleh mengakses halaman ini!";
            echo "<br>";
            echo "<button onclick='javascript:history.go(-1)'>Kembali</button>";
        }else{
        $this->load->view("pegawai/ubah", $data);
        }
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pegawai_model->delete($id)) {
            redirect(site_url('pegawai'));
        }
    }
}