<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan_meja extends CI_Model{
  var $table = 'tbl_pesanmeja';
  var $column_order = array('id_pemesan','id_meja');
	var $column_search = array('id_pemesan');
	var $order = array('id_pemesan' => 'asc');

  public function getData()
  {
    return $this->db->get($this->table)->result();
  }

  public function addData($data)
  {
      $this->db->insert($this->table, $data);
      return $this->db->insert_id();
  }
}
