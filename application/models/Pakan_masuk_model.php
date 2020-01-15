<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pakan_masuk_model extends CI_Model
{
    private $_table = "tbl_pakan_masuk";

    public $id_input;
    public $merk;
    public $id_supplier;
    public $tgl_masuk;
    public $harga;
    public $jumlah;
    public $total_harga;

    public function rules()
    {
        return [
            ['field' => 'jumlah',
            'label' => 'Stok',
            'rules' => 'numeric'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric']
        ];
    }

    function pakan_masuk_list(){
		$hasil=$this->db->query("SELECT * FROM tbl_pakan_masuk INNER JOIN tbl_supplier ON tbl_pakan_masuk.id_supplier=tbl_supplier.id_supplier");
		return $hasil->result();
    }
    
    // function pakan_masuk_list2(){
	// 	$this->datatables->select('*');
    //     $this->datatables->from('tbl_pakan_masuk');
    //     $this->datatables->join('tbl_supplier', 'id_supplier');
    //     $this->datatables->add_column('view', '<a href="javascript:void(0);" class="btn btn-info btn-xs item_edit" data-kode="$1" data-nama="$2" data-harga="$3" data-kategori="$4">Edit</a>  <a href="javascript:void(0);" class="hapus_record btn btn-danger btn-xs" data-kode="$1">Hapus</a>','barang_kode,barang_nama,barang_harga,kategori_id,kategori_nama');
    //     return $this->datatables->generate();
	// }

	// function simpan_pakan_masuk($id_input,$merk,$id_supplier,$tgl_masuk,$harga,$jumlah,$total_harga){
	// 	$hasil=$this->db->query("INSERT INTO tbl_pakan_masuk (id_input,merk,id_supplier,tgl_masuk,harga,jumlah,total_harga)VALUES('$id_input','$merk','$id_supplier','$tgl_masuk','$harga','$jumlah','$total_harga')");
	// 	return $hasil;
    // }
    
    // function get_pakan_masuk_by_kode($id_input){
	// 	$hsl=$this->db->query("SELECT * FROM tbl_pakan_masuk WHERE id_input='$id_input'");
	// 	if($hsl->num_rows()>0){
	// 		foreach ($hsl->result() as $data) {
	// 			$hasil=array(
	// 				'id_input' => $data->id_input,
	// 				'merk' => $data->merk,
	// 				'id_supplier' => $data->id_supplier,
	// 				'tgl_masuk' => $data->tgl_masuk,
	// 				'harga' => $data->harga,
	// 				'jumlah' => $data->jumlah,
	// 				'total_harga' => $data->total_harga,
	// 				);
	// 		}
	// 	}
	// 	return $hasil;
	// }

	// function update_pakan_masuk($id_input,$merk,$id_supplier,$tgl_masuk,$harga,$jumlah,$total_harga){
	// 	$hasil=$this->db->query("UPDATE tbl_pakan_masuk SET merk='$merk',id_supplier='$id_supplier',tgl_masuk='$tgl_masuk',harga='$harga',jumlah='$jumlah',total_harga='$total_harga' WHERE id_input='$id_input'");
	// 	return $hasil;
	// }

	// function hapus_pakan_masuk($id_input){
	// 	$hasil=$this->db->query("DELETE FROM tbl_pakan_masuk WHERE id_input='$id_input'");
	// 	return $hasil;
	// }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function get_supplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_supplier");
            return $query->result();
    }

    public function getSupplier()
    {
            $query = $this->db->query("SELECT * FROM tbl_pakan_masuk INNER JOIN tbl_supplier ON tbl_pakan_masuk.id_supplier=tbl_supplier.id_supplier");
            return $query->result();
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
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_input" => $id])->row();
    }

    public function simpan()
    {
        $post = $this->input->post();
        $this->id_input = uniqid();
        $this->merk = $post["merk"];
        $this->id_supplier = $post["id_supplier"];
        $this->tgl_masuk = $post["tgl_masuk"];
        $this->harga = htmlspecialchars($post["harga"], ENT_QUOTES);
        $this->jumlah = htmlspecialchars($post["jumlah"], ENT_QUOTES);
        $this->total_harga = $post["total_harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $data= array(
            'merk' => $post["merk"],
            'id_supplier' => $post["id_supplier"],
            'tgl_masuk' => $post["tgl_masuk"],
            'harga' => htmlspecialchars($post["harga"], ENT_QUOTES),
            'jumlah' => htmlspecialchars($post["jumlah"], ENT_QUOTES),
            'total_harga' => $post["total_harga"]
        );

       
        $this->db->where('id_input',$post['id']);
        $this->db->update($this->_table, $data);
    }

    // public function updateStok_keluar($jml,$merks,$tgl_updates)
    // {
    //         $query = $this->db->query("UPDATE tbl_pakan SET stok = stok - '$jml', tgl_update = '$tgl_updates' WHERE merk = '$merks'");
    //         return $query;
    // }

    function hapus_transaksi($id_input){
        return $this->db->delete($this->_table, array("id_input" => $id_input));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_input" => $id));
    }

    // Laporan Model
    
    public function view_by_date($date){
        $this->db->select('*');
        $this->db->from('tbl_pakan_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_pakan_masuk.id_supplier');
        
        $this->db->where('DATE(tgl_masuk)', date('Y-m-d', strtotime($date))); // Tambahkan where tanggal nya
            
        return $this->db->get()->result();// Tampilkan data tbl_pakan_masuk sesuai tanggal yang diinput oleh user pada filter
      }
        
      public function view_by_month($month, $year){
        $this->db->select('*');
        $this->db->from('tbl_pakan_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_pakan_masuk.id_supplier');
        
        $this->db->where('MONTH(tgl_masuk)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_pakan_masuk sesuai bulan dan tahun yang diinput oleh user pada filter
      }
        
      public function view_by_year($year){
        $this->db->select('*');
        $this->db->from('tbl_pakan_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_pakan_masuk.id_supplier');
        
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
            
        return $this->db->get()->result(); // Tampilkan data tbl_pakan_masuk sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_by_interval($tgl_awal, $tgl_akhir){
        $this->db->select('*');
        $this->db->from('tbl_pakan_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_pakan_masuk.id_supplier');
        
        $CI = get_instance();
        $CI->db->where("DATE(tgl_masuk) BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        // $this->db->where('YEAR(tgl_masuk) BETWEEN', $tgl_awal AND $tgl_akhir);
            
        return $this->db->get()->result(); // Tampilkan data tbl_pakan_masuk sesuai tahun yang diinput oleh user pada filter
      }
        
      public function view_all(){
        $this->db->select('*');
        $this->db->from('tbl_pakan_masuk'); 
        $this->db->join('tbl_supplier', 'tbl_supplier.id_supplier=tbl_pakan_masuk.id_supplier');
        
        return $this->db->get()->result(); // Tampilkan semua data tbl_pakan_masuk
      }
        
        public function option_tahun(){
            $this->db->select('YEAR(tgl_masuk) AS tahun'); // Ambil Tahun dari field tgl_masuk
            $this->db->from('tbl_pakan_masuk'); // select ke tabel tbl_pakan_masuk
            $this->db->order_by('YEAR(tgl_masuk)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
            $this->db->group_by('YEAR(tgl_masuk)'); // Group berdasarkan tahun pada field tgl_masuk
            
            return $this->db->get()->result(); // Ambil data pada tabel tbl_pakan_masuk sesuai kondisi diatas
        }
}