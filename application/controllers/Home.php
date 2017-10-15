<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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

		$data['content'] 	= 'v_dashboard';
		$data['base_link'] 	= '';

		
		if($level == 'manajer')
		{
			$data['user'] = 'MANAJER';	
		}
		else if($level == 'kasir')
		{	
			$data['user'] = 'KASIR';
		}	

		$this->load->view('v_home',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */