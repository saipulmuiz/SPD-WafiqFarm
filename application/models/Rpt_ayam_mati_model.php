<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rpt_ayam_mati_model extends CI_Model {
  public function view_by_date($date){
    $this->db->select('*');
    $this->db->from('tbl_ayam_mati'); 
    $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_mati.id_supplier');
    $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_mati.id_kandang');
    $this->db->where('DATE(tgl_mati)', date('Y-m-d', strtotime($date))); // Tambahkan where tanggal nya
        
    return $this->db->get()->result();// Tampilkan data tbl_ayam_mati sesuai tanggal yang diinput oleh user pada filter
  }
    
  public function view_by_month($month, $year){
    $this->db->select('*');
    $this->db->from('tbl_ayam_mati'); 
    $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_mati.id_supplier');
    $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_mati.id_kandang');
    $this->db->where('MONTH(tgl_mati)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tgl_mati)', $year); // Tambahkan where tahun
        
    return $this->db->get()->result(); // Tampilkan data tbl_ayam_mati sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
    $this->db->select('*');
    $this->db->from('tbl_ayam_mati'); 
    $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_mati.id_supplier');
    $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_mati.id_kandang');
    $this->db->where('YEAR(tgl_mati)', $year); // Tambahkan where tahun
        
    return $this->db->get()->result(); // Tampilkan data tbl_ayam_mati sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_by_interval($tgl_awal, $tgl_akhir){
    $this->db->select('*');
    $this->db->from('tbl_ayam_mati'); 
    $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_mati.id_supplier');
    $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_mati.id_kandang');
    $CI = get_instance();
    $CI->db->where("DATE(tgl_mati) BETWEEN '$tgl_awal' AND '$tgl_akhir'");
    // $this->db->where('YEAR(tgl_mati) BETWEEN', $tgl_awal AND $tgl_akhir);
        
    return $this->db->get()->result(); // Tampilkan data tbl_ayam_mati sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    $this->db->select('*');
    $this->db->from('tbl_ayam_mati'); 
    $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_mati.id_supplier');
    $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_mati.id_kandang');
    return $this->db->get()->result(); // Tampilkan semua data tbl_ayam_mati
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_mati) AS tahun'); // Ambil Tahun dari field tgl_mati
        $this->db->from('tbl_ayam_mati'); // select ke tabel tbl_ayam_mati
        $this->db->order_by('YEAR(tgl_mati)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_mati)'); // Group berdasarkan tahun pada field tgl_mati
        
        return $this->db->get()->result(); // Ambil data pada tabel tbl_ayam_mati sesuai kondisi diatas
    }
}