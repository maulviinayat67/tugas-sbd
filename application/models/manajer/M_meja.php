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
}
