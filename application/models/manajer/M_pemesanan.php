<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model{
  var $table = 'tbl_pemesanan';
  var $column_order = array('id_pemesanan','id_pegawai','tanggal','nama_pemesan');
	var $column_search = array('id_pemesanan');
	var $order = array('id_pemesanan' => 'asc');

  public function getData()
  {
    return $this->db->get($this->table)->result();
  }

  public function countData()
  {
      $this->db->from($this->table);
      return $this->db->count_all_results();
  }

  public function addData($data)
  {
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
  }

  public function konfirmSetPegawai($data)
  {
    return $this->db->update($this->table,['id_pegawai'=>$data['id_pegawai']],['id_pemesanan'=>$data['id_pemesan']]);
  }
}
