<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIHomePage extends CI_Controller{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('manajer/M_makanan');
    $this->load->model('manajer/M_meja');
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
    $data = $this->input->post();

    echo json_encode($data);
  }
}
