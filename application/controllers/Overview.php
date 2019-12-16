<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller

{

   public function __construct()

   {

       parent::__construct();
       if($this->session->userdata('status') != "MASUK"){
        redirect(base_url("otentikasi"));
    }
    $this->load->model("Overview_model");
   }



   public function index()

   {
    $data["title"] = "Dashboard";
    $data["stok_pakan"] = $this->Overview_model->getStokPakan();
    $data["stok_vitamin"] = $this->Overview_model->getStokVitamin();
    $data["jml_supplier"] = $this->Overview_model->getJmlSupplier();
    $data["jml_pegawai"] = $this->Overview_model->getJmlPegawai();
    $data["total_ayam"] = $this->Overview_model->getTotalAyam();
    $data["total_kandang"] = $this->Overview_model->getTotalKandang();
    $data["jml_telur_harian"] = $this->Overview_model->getTelurHarian();
    // Grafik Jumlah (Kg) Telur Harian
    $chartJml = $this->Overview_model->getTelurHarian()->result();
    $data['jml_telur_harian'] = json_encode($chartJml);
    // Grafik Kalkulasi Telur Harian
    $chartKalkulasi = $this->Overview_model->getKalkulasi_TelurHarian()->result();
    $data['kalkulasi_telur_harian'] = json_encode($chartKalkulasi);
    // Grafik Ayam Mati
    $chartAyamMati = $this->Overview_model->getAyamMati()->result();
    $data['jml_ayam_mati'] = json_encode($chartAyamMati);
    // Grafik Ayam Masuk
    $chartAyamMasuk = $this->Overview_model->getAyamMasuk()->result();
    $data['jml_ayam_masuk'] = json_encode($chartAyamMasuk);
    // Grafik Pakan Masuk
    $chartPakanMasuk = $this->Overview_model->getPakanMasuk()->result();
    $data['jml_pakan_masuk'] = json_encode($chartPakanMasuk);
    // Grafik Pakan Harian
    $chartPakanHarian = $this->Overview_model->getPakanHarian()->result();
    $data['jml_pakan_harian'] = json_encode($chartPakanHarian);
    $this->load->view('overview',$data);    
    }

}