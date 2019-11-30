<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("Pakan_model");
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data Pakan";
   	    $data["actor"] = "Pakan";
        $data["pakans"] = $this->Pakan_model->getSupplier();
        $this->load->view('pakan/list',$data);
    }

    public function tambah()
    {
        $pakan = $this->Pakan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan->rules());
        $data["suppliers"]=$this->Pakan_model->get_supplier();

        if ($validation->run()) {
            $pakan->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("pakan/tambah",$data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('pakan');
       
        $pakan = $this->Pakan_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan->rules());
        
        //$data["pakan_data"]=$pakan->getSupplier();

        if ($validation->run()) {
            $pakan->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->Pakan_model->get_supplier();
        $data["pakan"] = $pakan->getById($id);
        if (!$data["pakan"]) show_404();
        
        $this->load->view("pakan/ubah",$data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pakan_model->delete($id)) {
            redirect(site_url('pakan'));
        }
    }
}