<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require APPPATH . '/libraries/REST_Controller.php';

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_security');
		$this->load->model('manajer/M_transaksi');
		$this->load->library('datatables');
	}

	public function index()
	{
		$this->M_security->cek_security();
		$level = $this->session->userdata('level');
		$key   = $this->session->userdata('id_pegawai');

		$data['judul']		= 'Home';
		$data['sub_judul']	= 'Transaksi';
		$data['user'] 		= 'MANAJER';
		$data['base_link'] 	= '';
		$data['content'] 	= 'manajer/v_transaksi';

		$this->load->view('v_home',$data);			
	}

	function json()
	 {
        header('Content-Type: application/json');
        echo $this->M_transaksi->json();
	}
	
	function detail_harga($id)
	{
		
		$this->M_security->cek_security();
		$data['judul']		= 'Transaksi';
		$data['sub_judul']	= 'Detail Transaksi';
		$data['user'] 		= 'MANAJER';
		$data['base_link'] 	= '';
		$data['content'] 	= 'manajer/v_detail_transaksi';

		$data['detail_transaksi'] 	= $this->M_transaksi->data_detail($id);
		$data['kode_transaksi'] 	= $id;
		$data['tgl_transaksi']		= $this->M_transaksi->tanggal_transaksi($id);
		$data['total_harga']		= $this->M_transaksi->total_harga($id);

		$this->load->view('v_home',$data);	
	}

	// public function get_data()
	// {
	// 	$list = $this->M_transaksi->get_datatables();
	// 	$data = array();
	// 	// $no = $_POST['start'];
	// 	foreach ($list as $transaksi) 
	// 	{

	// 		$row[] = '<input type="checkbox" class="data-check" value="'.$transaksi->id_makanan .'">'	;
	// 		// $row[] = $no;
	// 		$row[] = $transaksi->id_makanan;
	// 		$row[] = $transaksi->nama;
	// 		$row[] = $transaksi->harga;
	// 		$row[] = $transaksi->id_pegawai;

	// 		$row[] = '<a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="edit_makanan('."'".$transaksi->id_makanan."'".') "><span class="fa fa-pencil"></span> Edit</a>&nbsp; 
	// 		<a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="hapus_makanan('."'".$transaksi->id_makanan."'".') "><span class="fa fa-trash"></span> Hapus</a>';

	// 		$data[] = $row;

	// 	}

	// 	$output = array(
	// 					"draw" =>$_POST['draw'],
	// 					"recordsTotal" => $this->M_transaksi->count_all(),
	// 					"recordsFiltered" => $this->M_transaksi->count_filtered(),
	// 					"data" => $data,
	// 			);

	// 	echo json_encode($output);
	// }

	// public function showalldata()
	// {
	// 	$list = $this->M_transaksi->get_data();
	// 	echo json_encode($list);
	// }

	// public function ajax_add()
	// {
	// 	$this->validasi_data();
				

    //     {

	// 		$data = array(
	// 			'id_pemesanan'	=> $this->input->post('id_pemesanan'),
	// 			'id_makanan'	=> $this->input->post('id_makanan'),
	// 		);


	// 		$this->M_transaksi->add_data($data);
	// 		echo json_encode(array('status'=>TRUE));
	// 	}

	// }


	public function validasi_data()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_pemesanan') == '')
		{
			$data['inputerror'][] = 'id_pemesanan';
			$data['error_string'][] = 'ID pemesanan tidak boleh kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('id_makanan') == '')
		{
			$data['inputerror'][] = 'id_makanan';
			$data['error_string'][] = 'ID Makanan tidak boleh kosong';
			$data['status'] = FALSE;
		}



		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/manajer/Transaksi.php */