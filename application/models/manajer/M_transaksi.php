<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {



	function json() {
        $this->datatables->select('tbl_struk.id_pemesanan,tbl_pemesanan.tanggal,tbl_pegawai.nama');
		$this->datatables->from('tbl_struk');
		$this->datatables->join('tbl_pemesanan','tbl_struk.id_pemesanan = tbl_pemesanan.id_pemesanan');
		$this->datatables->join('tbl_pegawai','tbl_pemesanan.id_pegawai = tbl_pegawai.id_pegawai');
		$this->datatables->group_by('tbl_struk.id_pemesanan');
		// $this->datatables->join('')
        // $this->datatables->join(array(' tbl_makanan','tbl_pemesanan'),array('tbl_struk.id_pemesanan = tbl_pemesanan.id_pemesanan','tbl_struk.id_pemesanan = tbl_makanan.id_makanan');
		$this->datatables->add_column('view', '<a href="transaksi/detail_harga/$1 " class="btn btn-primary btn-xs" "><span class="fa fa-book"> </span> Detail </a> ', 'id_pemesanan');
		// $this->datatables->query("
		// 		SELECT tbl_makanan.id_makanan,tbl_makanan.nama,tbl_makanan.harga,tbl_pemesanan.id_pegawai
		//  		FROM tbl_struk JOIN tbl_makanan USING(id_makanan) JOIN tbl_pemesanan USING(id_pemesanan) 
		//  		");
        return $this->datatables->generate();
	}
	

	function data_detail($id)
	{
		$query = $this->db->query('
		SELECT tbl_struk.id_pemesanan,tbl_makanan.nama AS nama_makanan,tbl_makanan.harga,tbl_pemesanan.tanggal,tbl_pegawai.nama AS nama_pegawai
		FROM tbl_struk JOIN tbl_makanan ON tbl_struk.id_makanan = tbl_makanan.id_makanan
		JOIN tbl_pemesanan ON tbl_struk.id_pemesanan = tbl_pemesanan.id_pemesanan
		JOIN tbl_pegawai ON tbl_pemesanan.id_pegawai = tbl_pegawai.id_pegawai
		WHERE tbl_struk.id_pemesanan = "'.$id.'"
		');

		return $query;
	}

	function tanggal_transaksi($id)
	{
		$query = $this->db->query('
		SELECT tanggal
		FROM tbl_pemesanan
		WHERE id_pemesanan = "'.$id.'"
		');
		return $query->result();
	}

	function nama_pegawai($id)
	{
		$query = $this->db->query('
		SELECT tbl_pegawai.nama
		FROM tbl_pemesanan,tbl_pegawai
		WHERE tbl_pemesanan.id_pegawai = tbl_pegawai.id_pegawai AND tbl_pemesanan.id_pemesanan = "'.$id.'"
		');
		return $query->result();
	}

	function total_harga($id)
	{
		$query = $this->db->query('
		SELECT SUM(tbl_makanan.harga) AS total_harga
		FROM tbl_makanan JOIN tbl_struk USING(id_makanan)
		WHERE tbl_struk.id_pemesanan = "'.$id.'"
		');
		return $query;
	}



	

}


/* End of file M_transaksi.php */
/* Location: ./application/models/manajer/M_transaksi.php */