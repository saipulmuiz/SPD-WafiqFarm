<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpt_ayam_mati extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('status') != "MASUK"){
        redirect(base_url("otentikasi"));
    }
    $this->load->model('Rpt_ayam_mati_model');
  }
  
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Rpt_ayam_mati_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Rpt_ayam_mati_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Rpt_ayam_mati_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $url_cetak = 'cetak?filter=4&tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'cetak';
            $transaksi = $this->Rpt_ayam_mati_model->view_all(); // Panggil fungsi view_all yang ada di Rpt_ayam_mati_model
        }
    $data["title"] = "Laporan Ayam Mati";
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('rpt_ayam_mati/'.$url_cetak);
    $data['ayam_mati'] = $transaksi;
    $data['option_tahun'] = $this->Rpt_ayam_mati_model->option_tahun();
    $this->load->view('rpt_ayam_mati', $data);
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->Rpt_ayam_mati_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Rpt_ayam_mati_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Rpt_ayam_mati_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Rpt_ayam_mati_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $transaksi = $this->Rpt_ayam_mati_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->Rpt_ayam_mati_model->view_all(); // Panggil fungsi view_all yang ada di Rpt_ayam_mati_model
        }
        
        $data['ket'] = $ket;
        $data['ayam_mati'] = $transaksi;
        
    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->pdf->SetDisplayMode('real');
    $pdf->WriteHTML($html);
    $pdf->Output('Laporan Ayam Mati.pdf', 'F');
    header("Content-type:application/pdf");
    echo file_get_contents('Laporan Ayam Mati.pdf');
  }
}