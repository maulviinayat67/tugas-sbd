<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_struk extends CI_Model{
  var $table = 'tbl_struk';
  var $column_order = array('id_pemesan','id_makanan');
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
