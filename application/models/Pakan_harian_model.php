<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_harian_model extends CI_Model
{
    private $_table = "tbl_pakan_harian";

    public $id_input;
    public $merk;
    public $tgl_input;
    public $waktu_input;
    public $id_user;
    public $id_kandang;
    public $jumlah;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric']
        ];
    }

    public function getRelation()
    {
            $query = $this->db->query("SELECT * FROM tbl_pakan_harian INNER JOIN tbl_user ON tbl_pakan_harian.id_user=tbl_user.id_user INNER JOIN tbl_kandang ON tbl_pakan_harian.id_kandang=tbl_kandang.id_kandang");
            return $query->result();
    }

    public function getKandang()
    {
            $query = $this->db->query("SELECT * FROM tbl_kandang");
            return $query->result();
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_input" => $id])->row();
    }

    public function getMerk()
    {
            $query = $this->db->query("SELECT * FROM tbl_pakan ");
            return $query->result();
    }

    public function updateStok()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_pakan SET stok = stok + $post[jumlah], tgl_update = '$post[tgl_update]' WHERE merk = '$post[merk]'");
            return $query;
    }

    public function updateStok_keluar()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_pakan SET stok = stok - $post[jumlah], tgl_update = '$post[tgl_update]' WHERE merk = '$post[merk]'");
            return $query;
    }

    public function ubahStok()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_pakan SET stok = stok - $post[fix_jml], tgl_update = '$post[tgl_update]' WHERE merk = '$post[merk]'");
            return $query;
    }

    public function ubahStok_keluar()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_pakan SET stok = stok + $post[fix_jml], tgl_update = '$post[tgl_update]' WHERE merk = '$post[merk]'");
            return $query;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->merk = $post["merk"];
        $this->tgl_input = $post["tgl_input"];
        $this->waktu_input = $post["waktu_input"];
        $this->id_user = $post["id_user"];
        $this->id_kandang = $post["id_kandang"];
        $this->jumlah = htmlspecialchars($post["jumlah"], ENT_QUOTES);
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'merk' => $post["merk"],
            'tgl_input' => $post["tgl_input"],
            'waktu_input' => $post["waktu_input"],
            'id_user' => $post["id_user"],
            'id_kandang' => $post["id_kandang"],
            'jumlah' => htmlspecialchars($post["jumlah"], ENT_QUOTES),
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
        $this->db->from('tbl_pakan_harian'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_pakan_harian.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_pakan_harian.id_kandang');
        $this->db->where('DATE(tgl_input)', date('Y-m-d', strtotime($date))); // Tambahkan where tanggal nya
            
        return $this->db->get()->result();// Tampilkan data tbl_pakan_harian sesuai tanggal yang diinput oleh user pada filter
      }
        
      public function view_by_month($month, $year){
        $this->db->select('*');
        $this->db->from('tbl_pakan_harian'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_pakan_harian.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_pakan_harian.id_kandang');
        $this->db->where('MONTH(tgl_input)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_input)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_pakan_harian sesuai bulan dan tahun yang diinput oleh user pada filter
      }
        
      public function view_by_year($year){
        $this->db->select('*');
        $this->db->from('tbl_pakan_harian'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_pakan_harian.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_pakan_harian.id_kandang');
        $this->db->where('YEAR(tgl_input)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_pakan_harian sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_by_interval($tgl_awal, $tgl_akhir){
        $this->db->select('*');
        $this->db->from('tbl_pakan_harian'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_pakan_harian.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_pakan_harian.id_kandang');
        $CI = get_instance();
        $CI->db->where("DATE(tgl_input) BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        // $this->db->where('YEAR(tgl_input) BETWEEN', $tgl_awal AND $tgl_akhir);
            
        return $this->db->get()->result(); // Tampilkan data tbl_pakan_harian sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_all(){
        $this->db->select('*');
        $this->db->from('tbl_pakan_harian'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_pakan_harian.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_pakan_harian.id_kandang');
        return $this->db->get()->result(); // Tampilkan semua data tbl_pakan_harian
      }
        
        public function option_tahun(){
            $this->db->select('YEAR(tgl_input) AS tahun'); // Ambil Tahun dari field tgl_input
            $this->db->from('tbl_pakan_harian'); // select ke tabel tbl_pakan_harian
            $this->db->order_by('YEAR(tgl_input)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
            $this->db->group_by('YEAR(tgl_input)'); // Group berdasarkan tahun pada field tgl_input
            
            return $this->db->get()->result(); // Ambil data pada tabel tbl_pakan_harian sesuai kondisi diatas
        }
}