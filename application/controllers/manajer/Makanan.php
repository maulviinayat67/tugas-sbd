<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_security');
	}

	public function index()
	{
		$this->M_security->cek_security();
		$level = $this->session->userdata('level');
		$key   = $this->session->userdata('id_pegawai');

		$data['judul']		= 'Home';
		$data['sub_judul']	= 'Makanan';
		$data['user'] 		= 'MANAJER';
		$data['base_link'] 	= '';
		$data['content'] 	= 'manajer/v_makanan';

		$this->load->view('v_home',$data);			
	}

}

/* End of file Manajer.php */
/* Location: ./application/controllers/manajer/Manajer.php */