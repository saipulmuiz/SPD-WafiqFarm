<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vitamin_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        
        $this->load->model("Vitamin_masuk_model");
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Vitamin Masuk";
   	    $data["actor"] = "Vitamin Masuk";
        $data["vitamin_masuk"] = $this->Vitamin_masuk_model->getSupplier();
        $this->load->view('vitamin_masuk/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data Vitamin Masuk";
        $vitamin_masuk = $this->Vitamin_masuk_model;
        $update_stok = $this->Vitamin_masuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($vitamin_masuk->rules());
        $data["suppliers"]=$this->Vitamin_masuk_model->get_supplier();
        $data["merks"]=$this->Vitamin_masuk_model->getMerk();

        if ($validation->run()) {
            $vitamin_masuk->simpan();
            $update_stok->updateStok();
            // $update_stok->update_stok();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("vitamin_masuk/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Vitamin Masuk";
        if (!isset($id)) redirect('vitamin_masuk');
       
        $vitamin_masuk = $this->Vitamin_masuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($vitamin_masuk->rules());
        
        //$data["vitamin_data"]=$vitamin->getSupplier();

        if ($validation->run()) {
            $vitamin_masuk->update();
            $vitamin_masuk->ubahStok();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->Vitamin_masuk_model->get_supplier();
        $data["vitamin_masuk"] = $vitamin_masuk->getById($id);
        if (!$data["vitamin_masuk"]) show_404();
        
        $this->load->view("vitamin_masuk/ubah",$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Vitamin_masuk_model->delete($id)) {
            redirect(site_url('vitamin_masuk'));
        }
    }
}