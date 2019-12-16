<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vitamin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Vitamin_model");
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Vitamin";
   	    $data["actor"] = "Vitamin";
        $data["vitamins"] = $this->Vitamin_model->getSupplier();
        $this->load->view('vitamin/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data Vitamin";
        $vitamin = $this->Vitamin_model;
        $validation = $this->form_validation;
        $validation->set_rules($vitamin->rules());
        $data["suppliers"]=$this->Vitamin_model->get_supplier();

        if ($validation->run()) {
            $vitamin->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("vitamin/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Vitamin";
        if (!isset($id)) redirect('vitamin');
       
        $vitamin = $this->Vitamin_model;
        $validation = $this->form_validation;
        $validation->set_rules($vitamin->rules());
        
        //$data["vitamin_data"]=$vitamin->getSupplier();

        if ($validation->run()) {
            $vitamin->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->Vitamin_model->get_supplier();
        $data["vitamin"] = $vitamin->getById($id);
        if (!$data["vitamin"]) show_404();
        
        $this->load->view("vitamin/ubah",$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Vitamin_model->delete($id)) {
            redirect(site_url('vitamin'));
        }
    }
}