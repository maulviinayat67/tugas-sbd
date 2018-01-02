<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIHomePage extends CI_Controller{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('manajer/M_makanan');
    $this->load->model('manajer/M_meja');
    $this->load->model('manajer/M_pemesanan');
    $this->load->model('manajer/M_pesan_meja');
    $this->load->model('manajer/M_struk');
	}

  public function getMakanan()
  {
    $data = $this->M_makanan->get_data();
    echo json_encode($data);
  }

  public function getMeja()
  {
    $data = $this->M_meja->getData();
    echo json_encode($data);
  }

  public function setOrder()
  {
    $data['data'] = $this->input->post();
    $data['date'] = date('Y-m-d');
    $data['order_id'] = $this->generateOrderID();

    $this->M_pemesanan->addData($this->parseTblPemesanan($data));
    $this->M_struk->addData($this->parseTblStruk($data));
    $this->M_pesan_meja->addData($this->parseTblPesanMeja($data));
    $this->M_meja->pickOrderedTable($this->parseTblMeja($data));
    echo json_encode($data);
  }

  public function setOrderAgain(){
    $order = $this->input->post();
    $data['data'] = $order['order'];
    $data['order_id'] = $order['order_id'];
    $this->M_struk->addData($this->parseTblStruk($data));

    echo json_encode($data);
  }

  protected function parseTblMeja($data)
  {
    return $data['data']['tableNumber'];
  }

  protected function parseTblPesanMeja($data)
  {
    $temp['id_pemesanan'] = $data['order_id'];
    $temp['ordered_table'] = $data['data']['tableNumber'];
    return $temp;
  }

  protected function parseTblStruk($data){
    $temp['id_pemesanan'] = $data['order_id'];
    $temp['pesanan'] = $data['data']['foods'];
    return $temp;
  }

  protected function parseTblPemesanan($data){
    $temp['id_pemesanan'] = $data['order_id'];
    $temp['id_pegawai'] = "P000"; // means not yet confirmed
    // $temp['total_harga'] = $data['data']['bill'];
    $temp['tanggal'] = $data['date'];

    return $temp;
  }

  protected function generateOrderID()
  {
    $idNumber = 'PE';
    $countResult = $this->M_pemesanan->countData();
    $idNumber .= $countResult+1;
    return $idNumber;
  }
}
