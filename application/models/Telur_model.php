<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Telur_model extends CI_Model
{
    private $_table = "tbl_telur_harian2";

    public $id_input;
    public $tgl_input;
    public $id_user;
    public $id_kandang;
    public $jumlah;
    public $telur_sehat;
    public $telur_cacat;
    public $kalkulasi_butir;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Jumlah',
            'rules' => 'numeric'],

            ['field' => 'telur_sehat',
            'label' => 'Telur Sehat',
            'rules' => 'numeric'],

            ['field' => 'telur_cacat',
            'label' => 'Telur Cacat',
            'rules' => 'numeric']
        ];
    }

    public function getRelation()
    {
            $query = $this->db->query("SELECT * FROM tbl_telur_harian2 INNER JOIN tbl_user ON tbl_telur_harian2.id_user=tbl_user.id_user INNER JOIN tbl_kandang ON tbl_telur_harian2.id_kandang=tbl_kandang.id_kandang");
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

    public function getKandang()
    {
            $query = $this->db->query("SELECT * FROM tbl_kandang");
            return $query->result();
    }

    public function updateTelur()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_telur SET berat = berat + $post[jumlah], jumlah = '$post[telur_sehat]'");
            return $query;
    }

    public function ubahStok()
    {
            $post = $this->input->post();
            $query = $this->db->query("UPDATE tbl_telur SET berat = berat - $post[fix_jml], jumlah = '$post[fix_sehat]'");
            return $query;
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->tgl_input = $post["tgl_input"];
        $this->id_user = $post["id_user"];
        $this->id_kandang = $post["id_kandang"];
        $this->jumlah = $post["jumlah"];
        $this->telur_sehat = $post["telur_sehat"];
        $this->telur_cacat = $post["telur_cacat"];
        $this->kalkulasi_butir = $post["kalkulasi_butir"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'tgl_input' => $post["tgl_input"],
            'id_user' => $post["id_user"],
            'id_kandang' => $post["id_kandang"],
            'jumlah' => $post["jumlah"],
            'telur_sehat' => $post["telur_sehat"],
            'telur_cacat' => $post["telur_cacat"],
            'kalkulasi_butir' => $post["kalkulasi_butir"],
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
        $this->db->from('tbl_telur_harian2'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_telur_harian2.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_telur_harian2.id_kandang');
        $this->db->where('DATE(tgl_input)', date('Y-m-d', strtotime($date))); // Tambahkan where tanggal nya
            
        return $this->db->get()->result();// Tampilkan data tbl_telur_harian2 sesuai tanggal yang diinput oleh user pada filter
      }
        
      public function view_by_month($month, $year){
        $this->db->select('*');
        $this->db->from('tbl_telur_harian2'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_telur_harian2.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_telur_harian2.id_kandang');
        $this->db->where('MONTH(tgl_input)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_input)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_telur_harian2 sesuai bulan dan tahun yang diinput oleh user pada filter
      }
        
      public function view_by_year($year){
        $this->db->select('*');
        $this->db->from('tbl_telur_harian2'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_telur_harian2.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_telur_harian2.id_kandang');
        $this->db->where('YEAR(tgl_input)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_telur_harian2 sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_by_interval($tgl_awal, $tgl_akhir){
        $this->db->select('*');
        $this->db->from('tbl_telur_harian2'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_telur_harian2.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_telur_harian2.id_kandang');
        $CI = get_instance();
        $CI->db->where("DATE(tgl_input) BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        // $this->db->where('YEAR(tgl_input) BETWEEN', $tgl_awal AND $tgl_akhir);
            
        return $this->db->get()->result(); // Tampilkan data tbl_telur_harian2 sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_all(){
        $this->db->select('*');
        $this->db->from('tbl_telur_harian2'); 
        $this->db->join('tbl_user', 'tbl_user.id_user=tbl_telur_harian2.id_user');
        $this->db->join('tbl_kandang', 'tbl_kandang.id_kandang=tbl_telur_harian2.id_kandang');
        return $this->db->get()->result(); // Tampilkan semua data tbl_telur_harian2
      }
        
        public function option_tahun(){
            $this->db->select('YEAR(tgl_input) AS tahun'); // Ambil Tahun dari field tgl_input
            $this->db->from('tbl_telur_harian2'); // select ke tabel tbl_telur_harian2
            $this->db->order_by('YEAR(tgl_input)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
            $this->db->group_by('YEAR(tgl_input)'); // Group berdasarkan tahun pada field tgl_input
            
            return $this->db->get()->result(); // Ambil data pada tabel tbl_telur_harian2 sesuai kondisi diatas
        }
}