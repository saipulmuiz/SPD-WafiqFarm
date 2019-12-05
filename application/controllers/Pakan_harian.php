<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_harian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
        }
        $this->load->model("Pakan_model");
        $this->load->model("Pakan_harian_model");
        $this->load->model("Kandang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Transaksi Pakan Harian";
   	    $data["actor"] = "Pakan";
        $data["pakan_harian"] = $this->Pakan_harian_model->getRelation();
        $this->load->view('pakan_harian/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Transaksi Pakan Harian";
        $pakan_harian = $this->Pakan_harian_model;
        $update_stok = $this->Pakan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_harian->rules());
        $data["kandangs"]=$this->Kandang_model->getAll();
        $data["merks"]=$this->Pakan_model->getMerk();
        if ($validation->run()) {
            $pakan_harian->simpan();
            $update_stok->updateStok_keluar();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("pakan_harian/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Transaksi Pakan Harian";
        if (!isset($id)) redirect('pakan_harian');
       
        $pakan_harian = $this->Pakan_harian_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_harian->rules());

        if ($validation->run()) {
            $pakan_harian->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["kandangs"]=$this->Kandang_model->getAll();
        $data["pakan_harian"] = $pakan_harian->getById($id);
        if (!$data["pakan_harian"]) show_404();
        
        $this->load->view("pakan_harian/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pakan_harian_model->delete($id)) {
            redirect(site_url('pakan_harian'));
        }
    }
}