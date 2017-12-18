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
    $data['id_pemesan'] = $this->generateID();
    echo json_encode($data);
  }

  protected function generateID()
  {
    $idNumber = 'PE';
    $countResult = $this->M_pemesanan->countData();
    if($countResult < 10){
      $idNumber .= '0'.$countResult;
    }
    else{
      $idNumber .= $countResult;
    }
    return $idNumber;
  }
}
