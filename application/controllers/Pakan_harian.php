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
        $this->load->model("Pakan_harian_model");
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
        $update_stok = $this->Pakan_harian_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_harian->rules());
        $data["kandangs"]=$this->Pakan_harian_model->getKandang();
        $data["merks"]=$this->Pakan_harian_model->getMerk();
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
        $update_stok = $this->Pakan_harian_model;
        $pakan_harian = $this->Pakan_harian_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_harian->rules());

        if ($validation->run()) {
            $pakan_harian->update();
            $update_stok->ubahStok_keluar();
            $this->session->set_flashdata('success', 'Berhasil diubah!');
        }

        $data["kandangs"]=$this->Pakan_harian_model->getKandang();
        $data["merks"]=$this->Pakan_harian_model->getMerk();
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

    // Controller Laporan
    public function laporan()
    {
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->Pakan_harian_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Pakan_harian_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Pakan_harian_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Pakan_harian_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Pakan_harian_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Pakan_harian_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $url_cetak = 'cetak?filter=4&tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
                $transaksi = $this->Pakan_harian_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'cetak';
            $transaksi = $this->Pakan_harian_model->view_all(); // Panggil fungsi view_all yang ada di Pakan_harian_model
        }
        $data["title"] = "Laporan Pakan Harian";
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('pakan_harian/'.$url_cetak);
        $data['pakan_harian'] = $transaksi;
        $data['option_tahun'] = $this->Pakan_harian_model->option_tahun();
        $this->load->view('pakan_harian/laporan', $data);
    }

    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-Y', strtotime($tgl));
                $transaksi = $this->Pakan_harian_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Pakan_harian_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Pakan_harian_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Pakan_harian_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->Pakan_harian_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Pakan_harian_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $transaksi = $this->Pakan_harian_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->Pakan_harian_model->view_all(); // Panggil fungsi view_all yang ada di Pakan_harian_model
        }
        
        $data['ket'] = $ket;
        $data['pakan_harian'] = $transaksi;
        
    ob_start();
    $this->load->view('pakan_harian/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('L','A4','en');
    $pdf->pdf->SetDisplayMode('real');
    $pdf->WriteHTML($html);
    $pdf->Output('Laporan Pakan Harian.pdf', 'F');
    header("Content-type:application/pdf");
    echo file_get_contents('Laporan Pakan Harian.pdf');
  }
}