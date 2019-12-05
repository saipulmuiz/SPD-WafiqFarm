<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Pakan_model");
        $this->load->model("Pakan_masuk_model");
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Pakan Masuk";
   	    $data["actor"] = "Pakan Masuk";
        $data["pakan_masuk"] = $this->Pakan_masuk_model->getSupplier();
        $this->load->view('pakan_masuk/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Data Pakan Masuk";
        $pakan_masuk = $this->Pakan_masuk_model;
        $update_stok = $this->Pakan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_masuk->rules());
        $data["suppliers"]=$this->Pakan_masuk_model->get_supplier();
        $data["merks"]=$this->Pakan_model->getMerk();

        if ($validation->run()) {
            $pakan_masuk->simpan();
            $update_stok->updateStok();
            // $update_stok->update_stok();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("pakan_masuk/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Data Pakan Masuk";
        if (!isset($id)) redirect('pakan_masuk');
       
        $pakan_masuk = $this->Pakan_masuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_masuk->rules());
        
        //$data["pakan_data"]=$pakan->getSupplier();

        if ($validation->run()) {
            $pakan_masuk->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->Pakan_masuk_model->get_supplier();
        $data["pakan_masuk"] = $pakan_masuk->getById($id);
        if (!$data["pakan_masuk"]) show_404();
        
        $this->load->view("pakan_masuk/ubah",$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pakan_masuk_model->delete($id)) {
            redirect(site_url('pakan_masuk'));
        }
    }
}