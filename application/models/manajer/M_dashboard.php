<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	function pemesanan_count()
	{
		$query = $this->db->get('tbl_pemesanan');
		return $query->num_rows();

	}	

	function pegawai_count()
	{
		$query = $this->db->get('tbl_pegawai');
		return $query->num_rows();
	}

	function meja_count()
	{
		$query = $this->db->get('tbl_meja');
		return $query->num_rows();
	}

	function makanan_count()
	{
		$query = $this->db->get('tbl_makanan');
		return $query->num_rows();
	}

	function laporan_transaksi()
	{
		$query = $this->db->query('
		SELECT tbl_struk.`id_pemesanan` AS id_transaksi,tbl_pemesanan.`nama_pemesan` AS nama_pemesan,tbl_pemesanan.`tanggal` AS tanggal,tbl_pegawai.`nama` AS nama_pegawai
		FROM tbl_struk JOIN tbl_pemesanan ON tbl_struk.`id_pemesanan` = tbl_pemesanan.`id_pemesanan` JOIN tbl_pegawai ON tbl_pemesanan.`id_pegawai` = tbl_pegawai.`id_pegawai`
		GROUP BY tbl_struk.`id_pemesanan`');

		return $query->result();
	}

	
	function tanggal_transaksi($tgl_awal,$tgl_akhir)
	{
		$query = $this->db->query('
		SELECT tbl_struk.`id_pemesanan` AS id_transaksi,tbl_pemesanan.`nama_pemesan` AS nama_pemesan,tbl_pemesanan.`tanggal` AS tanggal,tbl_pegawai.`nama` AS nama_pegawai
		FROM tbl_struk JOIN tbl_pemesanan ON tbl_struk.`id_pemesanan` = tbl_pemesanan.`id_pemesanan` JOIN tbl_pegawai ON tbl_pemesanan.`id_pegawai` = tbl_pegawai.`id_pegawai`
		GROUP BY tbl_struk.`id_pemesanan` HAVING tanggal >= "'.$tgl_awal.'" AND tanggal <= "'.$tgl_akhir.'" ');

		return $query->result();
	}

	function db_count()
	{
		$query= $this->db->query('
		SELECT COUNT(*) 
		FROM information_schema.tables 
		WHERE table_schema = "db_tugas_sbd"');

		return $query->result();

	}

	public function tampiltabel()
    {
       return $this->db->query("show tables")->result();
    }

	

}

/* End of file pemesanan.php */
/* Location: ./application/models/manajer/pemesanan.php */