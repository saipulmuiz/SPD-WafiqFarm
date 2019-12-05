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
        $this->load->model("Kandang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Transaksi Telur Harian";
   	    $data["actor"] = "Telur";
        $data["telurs"] = $this->Telur_model->getRelation();
        $this->load->view('telur/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Transaksi Telur Harian";
        $telur = $this->Telur_model;
        $validation = $this->form_validation;
        $validation->set_rules($telur->rules());
        $data["kandangs"]=$this->Kandang_model->getAll();
        if ($validation->run()) {
            $telur->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("telur/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Transaksi Telur Harian";
        if (!isset($id)) redirect('telur');
       
        $telur = $this->Telur_model;
        $validation = $this->form_validation;
        $validation->set_rules($telur->rules());

        if ($validation->run()) {
            $telur->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["kandangs"]=$this->Kandang_model->getAll();
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