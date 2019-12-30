<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ayam_masuk_model extends CI_Model
{
    private $_table = "tbl_ayam_masuk";

    public $id_input;
    public $jenis;
    public $id_supplier;
    public $id_kandang;
    public $tgl_masuk;
    public $umur;
    public $jumlah;
    public $harga;
    public $total_harga;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],
            
            ['field' => 'umur',
            'label' => 'Umur',
            'rules' => 'numeric'],
            
            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],
            
            ['field' => 'total_harga',
            'label' => 'Total Harga',
            'rules' => 'numeric'],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getAyam()
    {
            $query = $this->db->query("SELECT * FROM tbl_ayam");
            return $query->result();
    }
    
    public function getKandang()
    {
            $query = $this->db->query("SELECT * FROM tbl_kandang");
            return $query->result();
    }
    
    public function get_supplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_supplier");
            return $query->result();
    }

    public function getSupplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_ayam_masuk INNER JOIN tbl_supplier ON tbl_ayam_masuk.id_supplier=tbl_supplier.id_supplier ");
            return $query->result();
    }

    public function getRelation()
    {
            $query = $this->db->query("SELECT * FROM tbl_ayam_masuk INNER JOIN tbl_supplier ON tbl_ayam_masuk.id_supplier=tbl_supplier.id_supplier INNER JOIN tbl_kandang ON tbl_ayam_masuk.id_kandang=tbl_kandang.id_kandang ");
            return $query->result();
    }

    public function updateKandang()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_kandang SET jml_ayam = jml_ayam + $post[jumlah], tgl_update = '$post[tgl_update]' WHERE id_kandang = '$post[id_kandang]'");
            return $query;
    }

    public function updateAyam()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_ayam SET jumlah = jumlah + $post[jumlah] WHERE jenis = '$post[jenis]'");
            return $query;
    }

    public function ubahStok_Ayam()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_ayam SET jumlah = jumlah - $post[fix_jml] WHERE jenis = '$post[jenis]'");
            return $query;
    }

    public function ubahStok()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_kandang SET jml_ayam = jml_ayam - $post[fix_jml], tgl_update = '$post[tgl_update]' WHERE id_kandang = '$post[id_kandang]'");
            return $query;
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_input" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->jenis = $post["jenis"];
        $this->id_supplier = $post["id_supplier"];
        $this->id_kandang = $post["id_kandang"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->umur = $post["umur"];
        $this->jumlah = $post["jumlah"];
        $this->harga = $post["harga"];
        $this->total_harga = $post["total_harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'jenis' => $post["jenis"],
            'id_supplier' => $post["id_supplier"],
            'id_kandang' => $post["id_kandang"],
            'tgl_masuk' => $post["tgl_masuk"],
            'umur' => $post["umur"],
            'jumlah' => $post["jumlah"],
            'harga' => $post["harga"],
            'total_harga' => $post["total_harga"]
        );

       
        $this->db->where('id_input',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_input" => $id));
    }

    // Laporan Model
    
    public function view_by_date($date){
        $this->db->select('*');
        $this->db->from('tbl_ayam_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_masuk.id_supplier');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_masuk.id_kandang');
        $this->db->where('DATE(tgl_masuk)', date('Y-m-d', strtotime($date))); // Tambahkan where tanggal nya
            
        return $this->db->get()->result();// Tampilkan data tbl_ayam_masuk sesuai tanggal yang diinput oleh user pada filter
      }
        
      public function view_by_month($month, $year){
        $this->db->select('*');
        $this->db->from('tbl_ayam_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_masuk.id_supplier');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_masuk.id_kandang');
        $this->db->where('MONTH(tgl_masuk)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_ayam_masuk sesuai bulan dan tahun yang diinput oleh user pada filter
      }
        
      public function view_by_year($year){
        $this->db->select('*');
        $this->db->from('tbl_ayam_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_masuk.id_supplier');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_masuk.id_kandang');
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_ayam_masuk sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_by_interval($tgl_awal, $tgl_akhir){
        $this->db->select('*');
        $this->db->from('tbl_ayam_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_masuk.id_supplier');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_masuk.id_kandang');
        $CI = get_instance();
        $CI->db->where("DATE(tgl_masuk) BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        // $this->db->where('YEAR(tgl_masuk) BETWEEN', $tgl_awal AND $tgl_akhir);
            
        return $this->db->get()->result(); // Tampilkan data tbl_ayam_masuk sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_all(){
        $this->db->select('*');
        $this->db->from('tbl_ayam_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_ayam_masuk.id_supplier');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_ayam_masuk.id_kandang');
        return $this->db->get()->result(); // Tampilkan semua data tbl_ayam_masuk
      }
        
        public function option_tahun(){
            $this->db->select('YEAR(tgl_masuk) AS tahun'); // Ambil Tahun dari field tgl_masuk
            $this->db->from('tbl_ayam_masuk'); // select ke tabel tbl_ayam_masuk
            $this->db->order_by('YEAR(tgl_masuk)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
            $this->db->group_by('YEAR(tgl_masuk)'); // Group berdasarkan tahun pada field tgl_masuk
            
            return $this->db->get()->result(); // Ambil data pada tabel tbl_ayam_masuk sesuai kondisi diatas
        }
}