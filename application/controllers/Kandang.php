<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kandang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Kandang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Kandang";
   	    $data["actor"] = "Kandang";
        $data["kandangs"] = $this->Kandang_model->getAll();
        $this->load->view('kandang/list',$data);
    }

    public function tambah()
    {
        $kandang = $this->Kandang_model;
        $validation = $this->form_validation;
        $validation->set_rules($kandang->rules());

        if ($validation->run()) {
            $kandang->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("kandang/tambah");
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('kandang');
       
        $kandang = $this->Kandang_model;
        $validation = $this->form_validation;
        $validation->set_rules($kandang->rules());

        if ($validation->run()) {
            $kandang->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["kandang"] = $kandang->getById($id);
        if (!$data["kandang"]) show_404();
        
        $this->load->view("kandang/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Kandang_model->delete($id)) {
            redirect(site_url('kandang'));
        }
    }
}