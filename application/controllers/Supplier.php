<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Supplier";
   	    $data["actor"] = "Supplier";
        $data["suppliers"] = $this->Supplier_model->getAll();
        $this->load->view('supplier/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data Supplier";
        $supplier = $this->Supplier_model;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("supplier/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Supplier";
        if (!isset($id)) redirect('supplier');
       
        $supplier = $this->Supplier_model;
        $validation = $this->form_validation;
        $validation->set_rules($supplier->rules());

        if ($validation->run()) {
            $supplier->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["supplier"] = $supplier->getById($id);
        if (!$data["supplier"]) show_404();
        
        $this->load->view("supplier/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Supplier_model->delete($id)) {
            redirect(site_url('supplier'));
        }
    }
}