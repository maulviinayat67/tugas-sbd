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
    $packedData = array();
    foreach ($data['pesanan'] as $food) {
      $temp['id_pemesanan'] = $data['id_pemesanan'];
      $temp['id_makanan'] = $food['id_makanan'];

      array_push($packedData,$temp);
    }
    $this->db->insert_batch($this->table,$packedData);
  }
}
