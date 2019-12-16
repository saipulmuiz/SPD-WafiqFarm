<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "MASUK"){
			redirect(base_url("otentikasi"));
		}
        // $this->load->model("Kandang_model");
        $this->load->model("Ayam_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["title"] = "Transaksi Ayam Masuk";
   	    $data["actor"] = "Ayam";
        $data["ayams"] = $this->Ayam_model->getRelation();
        $this->load->view('ayam/list',$data);
    }

    public function tambah()
    {
        $data["title"] = "Tambah Ayam Masuk";
        $ayam = $this->Ayam_model;
        $validation = $this->form_validation;
        $validation->set_rules($ayam->rules());
        $data["suppliers"]=$this->Ayam_model->get_supplier();
        $data["kandangs"]=$this->Ayam_model->getKandang();

        if ($validation->run()) {
            $ayam->simpan();
            $ayam->updateKandang();
            $this->session->set_flashdata('success', 'Berhasil ditambahkan!');
        }

        $this->load->view("ayam/tambah",$data);
    }

    public function ubah($id = null)
    {
        $data["title"] = "Ubah Ayam Masuk";
        if (!isset($id)) redirect('ayam');
       
        $ayam = $this->Ayam_model;
        $validation = $this->form_validation;
        $validation->set_rules($ayam->rules());
        
        //$data["ayam_data"]=$ayam->getSupplier();

        if ($validation->run()) {
            $ayam->update();
            $ayam->ubahStok();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }
        $data["suppliers"]=$this->Ayam_model->get_supplier();
        $data["kandangs"]=$this->Ayam_model->getKandang();
        $data["ayam"] = $ayam->getById($id);
        if (!$data["ayam"]) show_404();
        
        $this->load->view("ayam/ubah", $data);
    }

    public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->Ayam_model->delete($id)) {
            redirect(site_url('ayam'));
        }
    }

    // Controller Laporan
    public function laporan()
    {
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->Ayam_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Ayam_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Ayam_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Ayam_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Ayam_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Ayam_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $url_cetak = 'cetak?filter=4&tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
                $transaksi = $this->Ayam_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'cetak';
            $transaksi = $this->Ayam_model->view_all(); // Panggil fungsi view_all yang ada di Ayam_model
        }
        $data["title"] = "Laporan Ayam Masuk";
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('ayam/'.$url_cetak);
        $data['ayam'] = $transaksi;
        $data['option_tahun'] = $this->Ayam_model->option_tahun();
        $this->load->view('ayam/laporan', $data);
    }

    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-Y', strtotime($tgl));
                $transaksi = $this->Ayam_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Ayam_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Ayam_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Ayam_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->Ayam_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Ayam_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $transaksi = $this->Ayam_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->Ayam_model->view_all(); // Panggil fungsi view_all yang ada di Ayam_model
        }
        
        $data['ket'] = $ket;
        $data['ayam'] = $transaksi;
        
    ob_start();
    $this->load->view('ayam/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('L','A4','en');
    $pdf->pdf->SetDisplayMode('real');
    $pdf->WriteHTML($html);
    $pdf->Output('Laporan Ayam Masuk.pdf', 'F');
    header("Content-type:application/pdf");
    echo file_get_contents('Laporan Ayam Masuk.pdf');
  }
}