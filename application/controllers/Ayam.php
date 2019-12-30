<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Ayam_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Ayam";
   	    $data["actor"] = "Ayam";
        $data["ayams"] = $this->Ayam_model->getAll();
        $this->load->view('ayam/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Ayam";
        $ayam = $this->Ayam_model;
        $validation = $this->form_validation;
        $validation->set_rules($ayam->rules());

        if ($validation->run()) {
            $ayam->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("ayam/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Ayam";
        if (!isset($id)) redirect('ayam');
       
        $ayam = $this->Ayam_model;
        $validation = $this->form_validation;
        $validation->set_rules($ayam->rules());

        if ($validation->run()) {
            $ayam->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["ayam"] = $ayam->getById($id);
        if (!$data["ayam"]) show_404();
        
        $this->load->view("ayam/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Ayam_model->delete($id)) {
            redirect(site_url('ayam'));
        }
    }
}