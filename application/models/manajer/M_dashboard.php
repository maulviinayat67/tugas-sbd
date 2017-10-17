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

	function data_meja()
	{
		$query = $this->db->query(
			'SELECT
			tbl_meja.`id_meja`, 
			tbl_meja.`isTersedia` 
			FROM
			tbl_meja'
		);
		return $query->result();
	}


}

/* End of file pemesanan.php */
/* Location: ./application/models/manajer/pemesanan.php */