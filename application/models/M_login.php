<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function cek_login($username,$password)
	{
		// $user_password = $password;
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('tbl_pegawai');
		if($query->num_rows() > 0)
		{
			$query = $this->db->query(
				'SELECT
				tbl_pegawai.`nama`,
				tbl_jabatan.`jabatan`,
				tbl_pegawai.`password`,
				tbl_pegawai.`username`,
				tbl_pegawai.`id_pegawai`,
				tbl_jabatan.`level`,
				tbl_pegawai.`id_jabatan`
				FROM
				tbl_jabatan
				INNER JOIN tbl_pegawai ON tbl_pegawai.`id_jabatan` = tbl_jabatan.`id_jabatan`
				WHERE
				tbl_pegawai.`username` = "'.$username.'"'

			);
			foreach ($query->result() as $row) 
			{
				$sess = array(
					'id_pegawai'	=>$row->id_pegawai,
					'username'		=>$row->username,
					'password'		=>$row->password,
					'nama_pegawai'	=>$row->nama,
					'id_jabatan'	=>$row->id_jabatan,
					'jabatan'		=>$row->jabatan,
					'level'			=>$row->level

				);
				$this->session->set_userdata($sess);	
				redirect('Home');	
			}	
		}
		else
		{
			$this->session->set_flashdata('info','Maaf username dan password salah !!!');
			redirect('Login');
		}
	}

	// public function cek_password($password)
	// {
	// 	$this->db->where('password',$password);
	// 	$query = $this->db->get('tbl_pegawai');
	// 	// if($query->num_rows() > 0)
	// 	// {
	// 	// 	$query = $this->db->query(
	// 	// 		'SELECT
	// 	// 		tbl_pegawai.`nama`,
	// 	// 		tbl_jabatan.`jabatan`,
	// 	// 		tbl_pegawai.`password`,
	// 	// 		tbl_pegawai.`username`,
	// 	// 		tbl_pegawai.`id_pegawai`,
	// 	// 		tbl_jabatan.`level`,
	// 	// 		tbl_pegawai.`id_jabatan`
	// 	// 		FROM
	// 	// 		tbl_jabatan
	// 	// 		INNER JOIN tbl_pegawai ON tbl_pegawai.`id_jabatan` = tbl_jabatan.`id_jabatan`
	// 	// 		WHERE
	// 	// 		tbl_pegawai.`password` = "'.$password.'"'

	// 	// 	);
	// 	return $query->result();
		
	// }

}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */