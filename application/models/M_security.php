<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_security extends CI_Model {

	public function cek_security()
	{
		if($this->session->userdata('username'))
		{
			return TRUE;
		}
		else
		{
			$this->session->sess_destroy();
			redirect('Login');
		}
	}

}

/* End of file M_security.php */
/* Location: ./application/models/M_security.php */