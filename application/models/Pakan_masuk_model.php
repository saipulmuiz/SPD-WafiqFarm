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
        $this->harga = $post["harga"];
        $this->jumlah = $post["jumlah"];
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
            'harga' => $post["harga"],
            'jumlah' => $post["jumlah"],
            'total_harga' => $post["total_harga"]
        );

       
        $this->db->where('id_input',$post['id']);
        $this->db->update($this->_table, $data);
    }

    public function updateStok_keluar($jml,$merks,$tgl_updates)
    {
            $query = $this->db->query("UPDATE tbl_pakan SET stok = stok - '$jml', tgl_update = '$tgl_updates' WHERE merk = '$merks'");
            return $query;
    }

    function hapus_transaksi($id_input){
        return $this->db->delete($this->_table, array("id_input" => $id_input));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_input" => $id));
    }
}