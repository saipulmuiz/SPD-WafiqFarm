<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DOC extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        $this->load->model("DOC_model");
        $this->load->model("Supplier_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Data DOC";
   	    $data["actor"] = "DOC";
        $data["docs"] = $this->DOC_model->getSupplier();
        $this->load->view('doc/list',$data);
    }

    public function tambah()
    {
        $doc = $this->DOC_model;
        $validation = $this->form_validation;
        $validation->set_rules($doc->rules());
        $data["suppliers"]=$this->DOC_model->get_supplier();

        if ($validation->run()) {
            $doc->simpan();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("doc/tambah",$data);
    }

    public function ubah($id = null)
    {
        if (!isset($id)) redirect('doc');
       
        $doc = $this->DOC_model;
        $validation = $this->form_validation;
        $validation->set_rules($doc->rules());
        
        //$data["doc_data"]=$doc->getSupplier();

        if ($validation->run()) {
            $doc->update();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->DOC_model->get_supplier();
        $data["doc"] = $doc->getById($id);
        if (!$data["doc"]) show_404();
        
        $this->load->view("doc/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->DOC_model->delete($id)) {
            redirect(site_url('doc'));
        }
    }
}