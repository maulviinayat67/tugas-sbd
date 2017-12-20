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
      $queryData = array();
      foreach ($data['ordered_table'] as $table) {
        $temp['id_pemesanan'] = $data['id_pemesanan'];
        $temp['id_meja'] = $table['id_meja'];

        array_push($queryData, $temp);
      }
      $this->db->insert_batch($this->table,$queryData);
  }
}
