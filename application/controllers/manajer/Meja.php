<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meja extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_security');
		$this->load->model('manajer/M_meja');
	}

	public function index()
	{
		$this->M_security->cek_security();
		$level = $this->session->userdata('level');
		$key   = $this->session->userdata('id_pegawai');


		$data['judul']		= 'Home';
		$data['sub_judul']	= 'Daftar Meja';
		$data['user'] 		= 'MANAJER';
		$data['base_link'] 	= '';
		$data['content'] 	= 'manajer/v_meja';

		// $data['data_makanan'] = $this->M_makanan->get_data();	

		$this->load->view('v_home',$data);			
    }

 

    public function get_data()
	{
		$list = $this->M_meja->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		foreach ($list as $meja) 
		{
			// $no++;
			$row   = array();
			$row[] = '<input type="checkbox" class="data-check" value="'.$meja->id_meja .'">';
			$row[] = $meja->nama;
			$row[] = $meja->isTersedia;
			$row[] = '<a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="edit_meja('."'".$meja->id_meja."'".') "><span class="fa fa-pencil"></span> Edit</a>&nbsp; 
			<a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="hapus_meja('."'".$meja->isTersedia."'".') "><span class="fa fa-trash"></span> Hapus</a>';

			$data[] = $row;

		}

		$output = array(
						"draw" =>$_POST['draw'],
						"recordsTotal" => $this->M_meja->count_all(),
						"recordsFiltered" => $this->M_meja->count_filtered(),
						"data" => $data
				);

		echo json_encode($output);
	}
  
}