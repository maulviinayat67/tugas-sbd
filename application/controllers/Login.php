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
		$this->form_validation->set_message('required', '<strong>%s</strong> tidak boleh kosong !!!');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

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

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

	public function username_cek()
	{
		$username 	= $this->input->post('username',TRUE);
		$query 		= $this->db->get('tbl_pegawai')->row();
		if($username == $query->username)
		{

			return TRUE;
		}
		else 
		{
			$this->form_validation->set_message('username_cek', '<strong>Username</strong> anda salah !!!');
			return FALSE;
		}
	}

	public function password_cek()
	{
		$password 	= $this->input->post('password',TRUE);
		$query 		= $this->db->get_where('tbl_pegawai',array('password'=>$password))->row();
		if($password == $query->password)
		{
			return TRUE;
		}
		else 
		{
			$this->form_validation->set_message('password_cek', '<strong>Password</strong> anda salah !!!');
			return FALSE;
			
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */