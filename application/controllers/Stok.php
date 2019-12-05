<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Stok_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Stok";
   	    $data["actor"] = "Stok";
        $data["stoks"] = $this->Stok_model->getAll();
        $this->load->view('stok/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data Stok";
        $stok = $this->Stok_model;
        $validation = $this->form_validation;
        $validation->set_rules($stok->rules());

        if ($validation->run()) {
            $stok->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("stok/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Stok";
        if (!isset($id)) redirect('stok');
       
        $stok = $this->Stok_model;
        $validation = $this->form_validation;
        $validation->set_rules($stok->rules());

        if ($validation->run()) {
            $stok->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["stok"] = $stok->getById($id);
        if (!$data["stok"]) show_404();
        
        $this->load->view("stok/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Stok_model->delete($id)) {
            redirect(site_url('stok'));
        }
    }
}