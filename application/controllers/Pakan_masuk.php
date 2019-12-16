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
        $update_stok = $this->Pakan_model;
        $pakan_masuk = $this->Pakan_masuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_masuk->rules());
        
        //$data["pakan_data"]=$pakan->getSupplier();

        if ($validation->run()) {
            $pakan_masuk->update();
            $update_stok->ubahStok();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->Pakan_masuk_model->get_supplier();
        $data["merks"]=$this->Pakan_model->getMerk();
        $data["pakan_masuk"] = $pakan_masuk->getById($id);
        if (!$data["pakan_masuk"]) show_404();
        
        $this->load->view("pakan_masuk/ubah",$data);
    }

    function hapus_transaksi(){
        $id_input=$this->input->post('id_input');
        $jumlah=$this->input->post('jumlah');
        $tgl_update=$this->input->post('tgl_update');
        $merk=$this->input->post('merk');
        $data=$this->Pakan_masuk_model->hapus_transaksi($id_input);
        // $data=$this->Pakan_masuk_model->updateStok_keluar($jumlah,$tgl_update,$merk);
        echo json_encode($data);
    }

    public function upstok($jumlah=null,$merk=null,$tgl_update=null)
    {
        $jml=$this->input->get('jumlah');
        $merks=$this->input->get('merk');
        $tgl_updates=$this->input->get('tgl_update');
        // if (!isset($id)) show_404();
        // $this->Pakan_masuk_model->updateStok_keluar($jumlah,$merk,$tgl_update);

        if ($this->Pakan_masuk_model->updateStok_keluar($jml,$merks,$tgl_updates)) {   
            redirect(site_url('pakan_masuk'));
        }
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Pakan_masuk_model->delete($id)) {   
            redirect(site_url('pakan_masuk'));
        }
    }
    

    // function get_pakan_masuk_json() { //data pakan_masuk by JSON object
    //     header('Content-Type: application/json');
    //     echo $this->Pakan_masuk_model->pakan_masuk_list2();
    //   }

    // function data_pakan_masuk(){
	// 	$data=$this->Pakan_masuk_model->pakan_masuk_list();
	// 	echo json_encode($data);
	// }

	// function get_pakan_masuk(){
	// 	$kobar=$this->input->get('id');
	// 	$data=$this->Pakan_masuk_model->get_pakan_masuk_by_kode($kobar);
	// 	echo json_encode($data);
	// }
}