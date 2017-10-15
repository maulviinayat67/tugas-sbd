<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
		
	}

	public function index()
	{
		$this->load->view('V_login');
	}

	public function cek_login()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_message('required', '<strong> %s </strong> tidak boleh kosong');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->load->view('V_login');
		} 
		else 
		{

			$username 	= $this->input->post('username',TRUE);
			$password	= $this->input->post('password',TRUE);
			$this->M_login->cek_login($username,$password);




		}

	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */