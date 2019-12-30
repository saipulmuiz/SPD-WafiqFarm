<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview_model extends CI_Model
{
    private $_table = "tbl_pakan";

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getStokPakan()
    {
        $query = $this->db->query('SELECT tgl_update, SUM(stok) AS jml_stok FROM tbl_pakan');
        return $query->result();
    }

    public function getStokVitamin()
    {
        $query = $this->db->query('SELECT tgl_update, SUM(stok) AS jml_stok FROM tbl_vitamin');
        return $query->result();
    }

    public function getTotalAyam()
    {
        $query = $this->db->query('SELECT tgl_update, SUM(jml_ayam) AS jumlah FROM tbl_kandang');
        return $query->result();
    }

    public function getTelur()
    {
        $query = $this->db->query('SELECT * FROM tbl_telur');
        return $query->result();
    }

    public function getAyam()
    {
        $query = $this->db->query('SELECT * FROM tbl_ayam ORDER BY jumlah DESC LIMIT 3');
        return $query->result();
    }

    public function getTelurHarian()
    {
        $this->db->select('tgl_input,jumlah,kalkulasi_butir');
        $result = $this->db->get('tbl_telur_harian2');
        return $result;
    }

    public function getKalkulasi_TelurHarian()
    {
        $this->db->select('tgl_input,telur_sehat,telur_cacat');
        $result = $this->db->get('tbl_telur_harian2');
        return $result;
    }

    public function getAyamMati()
    {
        $this->db->select('tgl_mati,jumlah');
        $result = $this->db->get('tbl_ayam_mati');
        return $result;
    }

    public function getAyamMasuk()
    {
        $this->db->select('tgl_masuk,jumlah');
        $result = $this->db->get('tbl_ayam_masuk');
        return $result;
    }

    public function getPakanMasuk()
    {
        $this->db->select('tgl_masuk,jumlah');
        $result = $this->db->get('tbl_pakan_masuk');
        return $result;
    }

    public function getPakanHarian()
    {
        $query = $this->db->query("SELECT tgl_input,SUM(jumlah) AS jml_harian FROM tbl_pakan_harian GROUP BY tgl_input");
        return $query;
    }

    public function getTotalKandang()
    {
        $query = $this->db->query('SELECT count(id_kandang) AS jumlah, SUM(kapasitas) AS kapasitas FROM tbl_kandang');
        return $query->result();
    }

    public function getJmlSupplier()
    {
        $query = $this->db->count_all('tbl_supplier');
        return $query;
    }
    
    public function getJmlPegawai()
    {
        $query = $this->db->count_all('tbl_pegawai');
        return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kandang" => $id])->row();
    }
}