<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Telur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Telur_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Telur";
   	    $data["actor"] = "Telur";
        $data["telurs"] = $this->Telur_model->getAll();
        $this->load->view('telur/list',$data);
    }

    public function tambah()
    {
        $telur = $this->Telur_model;
        $validation = $this->form_validation;
        $validation->set_rules($telur->rules());

        if ($validation->run()) {
            $telur->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("telur/tambah");
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('telur');
       
        $telur = $this->Telur_model;
        $validation = $this->form_validation;
        $validation->set_rules($telur->rules());

        if ($validation->run()) {
            $telur->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["telur"] = $telur->getById($id);
        if (!$data["telur"]) show_404();
        
        $this->load->view("telur/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Telur_model->delete($id)) {
            redirect(site_url('telur'));
        }
    }
}