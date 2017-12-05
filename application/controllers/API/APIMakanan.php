<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class APIMakanan extends CI_Controller{
  public function __construct()
	{
		parent::__construct();
		$this->load->model('manajer/M_makanan');
	}

  public function getMakanan()
  {
    $data = $this->M_makanan->get_data();
    echo json_encode($data);
  }
}
