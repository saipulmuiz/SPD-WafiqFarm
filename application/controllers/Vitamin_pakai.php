<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vitamin_pakai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
        }
        $this->load->model("Vitamin_pakai_model");
        $this->load->model("Kandang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Transaksi Pemakaian Vitamin";
   	    $data["actor"] = "Vitamin";
        $data["vitamin_pakai"] = $this->Vitamin_pakai_model->getRelation();
        $this->load->view('vitamin_pakai/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Transaksi Pemakaian Vitamin";
        $vitamin_pakai = $this->Vitamin_pakai_model;
        $update_stok = $this->Vitamin_pakai_model;
        $validation = $this->form_validation;
        $validation->set_rules($vitamin_pakai->rules());
        $data["kandangs"]=$this->Kandang_model->getAll();
        $data["merks"]=$this->Vitamin_pakai_model->getMerk();
        if ($validation->run()) {
            $vitamin_pakai->simpan();
            $update_stok->updateStok_keluar();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("vitamin_pakai/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Transaksi Pemakaian Vitamin";
        if (!isset($id)) redirect('vitamin_pakai');
       
        $vitamin_pakai = $this->Vitamin_pakai_model;
        $validation = $this->form_validation;
        $validation->set_rules($vitamin_pakai->rules());

        if ($validation->run()) {
            $vitamin_pakai->update();
            $vitamin_pakai->ubahStok_keluar();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["kandangs"]=$this->Kandang_model->getAll();
        $data["merks"]=$this->Vitamin_pakai_model->getMerk();
        $data["vitamin_pakai"] = $vitamin_pakai->getById($id);
        if (!$data["vitamin_pakai"]) show_404();
        
        $this->load->view("vitamin_pakai/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Vitamin_pakai_model->delete($id)) {
            redirect(site_url('vitamin_pakai'));
        }
    }
}