<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_meja extends CI_Model{
  var $table = 'tbl_meja';
  var $column_order = array('id_meja','isTersedia');
	var $column_search = array('id_meja');
	var $order = array('id_meja' => 'asc');

  public function getData()
  {
    return $this->db->get($this->table)->result();
  }

  public function pickOrderedTable($data)
  {
    foreach ($data as $table) {
      $this->db->set('isTersedia','tidak tersedia');
      $this->db->where('id_meja',$table['id_meja']);
      $this->db->update($this->table);
    }
  }
}
