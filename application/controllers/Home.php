<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_security');
		$this->load->model('manajer/M_dashboard');
	}

	public function index()
	{
		$this->M_security->cek_security();
		$level = $this->session->userdata('level');
		$key   = $this->session->userdata('id_pegawai');

		$data['judul']		= 'Home';
		$data['sub_judul']	= 'Dashboard';
		$data['base_link'] 	= '';


		
		if($level == 'manajer')
		{
			$data['data_meja']		= $this->M_dashboard->data_meja(); 
			$data['jml_pemesanan']  = $this->M_dashboard->pemesanan_count();
			$data['jml_pegawai']	= $this->M_dashboard->pegawai_count();
			
			$data['user'] 			= 'MANAJER';	
			$data['content'] 		= 'manajer/v_dashboard';

		}
		else if($level == 'kasir')
		{	

			$data['user'] 			= 'KASIR';
			$data['content'] 		= 'kasir/v_dashboard';
		}	

		$this->load->view('v_home',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */