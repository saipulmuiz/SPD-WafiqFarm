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
        $update_stok = $this->Pakan_masuk_model;
        $validation = $this->form_validation;
        $validation->set_rules($pakan_masuk->rules());
        $data["suppliers"]=$this->Pakan_masuk_model->get_supplier();
        $data["merks"]=$this->Pakan_masuk_model->getMerk();

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
        $update_stok = $this->Pakan_masuk_model;
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
        $data["merks"]=$this->Pakan_masuk_model->getMerk();
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

    // Controller Laporan
    public function laporan()
    {
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->Pakan_masuk_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Pakan_masuk_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->Pakan_masuk_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Pakan_masuk_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->Pakan_masuk_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Pakan_masuk_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $url_cetak = 'cetak?filter=4&tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
                $transaksi = $this->Pakan_masuk_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'cetak';
            $transaksi = $this->Pakan_masuk_model->view_all(); // Panggil fungsi view_all yang ada di Pakan_masuk_model
        }
        $data["title"] = "Laporan Pakan Masuk";
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('pakan_masuk/'.$url_cetak);
        $data['pakan_masuk'] = $transaksi;
        $data['option_tahun'] = $this->Pakan_masuk_model->option_tahun();
        $this->load->view('pakan_masuk/laporan', $data);
    }

    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-Y', strtotime($tgl));
                $transaksi = $this->Pakan_masuk_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Pakan_masuk_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->Pakan_masuk_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Pakan_masuk_model
            }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->Pakan_masuk_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Pakan_masuk_model
            }else{
                $tgl_awal = $_GET['tgl_awal'];
                $tgl_akhir = $_GET['tgl_akhir'];
                $awal = date('d-m-Y', strtotime($tgl_awal));
                $akhir = date('d-m-Y', strtotime($tgl_akhir));
                
                $ket = 'Data Transaksi Per '.$awal.' Sampai '.$akhir;
                $transaksi = $this->Pakan_masuk_model->view_by_interval($tgl_awal, $tgl_akhir);
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->Pakan_masuk_model->view_all(); // Panggil fungsi view_all yang ada di Pakan_masuk_model
        }
        
        $data['ket'] = $ket;
        $data['pakan_masuk'] = $transaksi;
        
    ob_start();
    $this->load->view('pakan_masuk/print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
    require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('L','A4','en');
    $pdf->pdf->SetDisplayMode('real');
    $pdf->WriteHTML($html);
    $pdf->Output('Laporan Pakan Masuk.pdf', 'F');
    header("Content-type:application/pdf");
    echo file_get_contents('Laporan Pakan Masuk.pdf');
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