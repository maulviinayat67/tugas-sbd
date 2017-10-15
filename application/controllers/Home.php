<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$level = $this->session->userdata('level');
		$key   = $this->session->userdata('id_pegawai');

		$data['content'] 	= 'v_dashboard';
		$data['base_link'] 	= 'c_home';

		
		if($level == 'manajer')
		{
			$data['user'] = 'Manajer';	
		}
		else if($level == 'kasir')
		{	
			$data['user'] = 'Kasir';
		}	

		$this->load->view('V_home',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */