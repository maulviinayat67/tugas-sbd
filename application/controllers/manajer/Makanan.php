<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_security');
		$this->load->model('manajer/M_makanan');
	}

	public function index()
	{
		$this->M_security->cek_security();
		$level = $this->session->userdata('level');
		$key   = $this->session->userdata('id_pegawai');


		$data['judul']		= 'Home';
		$data['sub_judul']	= 'Makanan & Minuman';
		$data['user'] 		= 'MANAJER';
		$data['base_link'] 	= '';
		$data['content'] 	= 'manajer/v_makanan';

		$data['data_makanan'] = $this->M_makanan->get_data();

		$this->load->view('v_home',$data);
	}

	public function ajax_add()
	{
		$this->validasi_data();

				$config['upload_path']          = './assets/gambar/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $config['remove_space'] = TRUE;

               $this->load->library('upload',$config);

    if($this->upload->do_upload('gambar_makanan'))
        {
        	$upload_data = $this->upload->data();
        	$path_gambar = $upload_data['file_name'];

			$data = array(
				'id_makanan'	=> $this->input->post('id_makanan'),
				'nama'			=> $this->input->post('nama_makanan'),
				'tipe'			=> $this->input->post('jenis_makanan'),
				'harga'			=> $this->input->post('harga_makanan'),
				'gambar'		=> $path_gambar
			);


			$this->M_makanan->add_data($data);
			echo json_encode(array('status'=>TRUE));
		}



	}

	public function ajax_edit($id)
	{
		$data = $this->M_makanan->get_by_id($id);

		echo json_encode($data);
	}

	public function ajax_update()
	{
		$data = '';
		$config['upload_path']          = './assets/gambar/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 2048;
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
   	$config['remove_space'] = TRUE;

    $this->load->library('upload',$config);

		$data = array(
			'id_makanan'	=> $this->input->post('id_makanan'),
			'nama'			=> $this->input->post('nama_makanan'),
			'tipe'			=> $this->input->post('jenis_makanan'),
			'harga'			=> $this->input->post('harga_makanan')
		);

    if($this->upload->do_upload('gambar_makanan'))
    {
    	$upload_data = $this->upload->data();
      $path_gambar = $upload_data['file_name'];

			$data['gambar']= $path_gambar;

		}

		
		$result = $this->M_makanan->update_data(array('id_makanan'=>$this->input->post('id_makanan')),$data);
		echo json_encode(array('status'=>200,'result'=>$result));
	}

	public function ajax_delete($id)
	{
		$this->M_makanan->delete_by_id($id);

		echo json_encode(array('status'=>TRUE));
	}

	public function ajax_bulk_delete()
	{
		$list_id = $this->input->post('id_makanan');
		foreach ($list_id as $id)
		{
			$this->M_makanan->delete_by_id($id);
		}
		echo json_encode(array('status'=>TRUE));

	}

	public function get_data()
	{
		$list = $this->M_makanan->get_datatables();
		$data = array();
		// $no = $_POST['start'];
		foreach ($list as $makanan)
		{
			// $no++;
			$row = array();
			if(empty($makanan->gambar))
			{
				$filefoto = '';
			}
			else
			{
				$filefoto =''.base_url().'assets/gambar/'.$makanan->gambar.'';
			}
			$row[] = '<input type="checkbox" class="data-check" value="'.$makanan->id_makanan .'">'	;
			// $row[] = $no;
			// $row[] = $makanan->id_makanan;
			$row[] = $makanan->nama;
			$row[] = $makanan->tipe;
			$row[] = $makanan->harga;
			$row[] = '<img src="'.$filefoto.'" width="100">';

			$row[] = '<a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="edit_makanan('."'".$makanan->id_makanan."'".') "><span class="fa fa-pencil"></span> Edit</a>&nbsp;
			<a href="javascript:void(0) " class="btn btn-primary btn-xs" onclick="hapus_makanan('."'".$makanan->id_makanan."'".') "><span class="fa fa-trash"></span> Hapus</a>';

			$data[] = $row;

		}

		$output = array(
						"draw" =>$_POST['draw'],
						"recordsTotal" => $this->M_makanan->count_all(),
						"recordsFiltered" => $this->M_makanan->count_filtered(),
						"data" => $data
				);

		echo json_encode($output);
	}

	public function showalldata()
	{
		$list = $this->M_makanan->get_data();
		echo json_encode($list);
	}

	public function validasi_data()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('id_makanan') == '')
		{
			$data['inputerror'][] = 'id_makanan';
			$data['error_string'][] = 'ID Makanan tidak boleh kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('nama_makanan') == '')
		{
			$data['inputerror'][] = 'nama_makanan';
			$data['error_string'][] = 'Nama Makanan tidak boleh kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('jenis_makanan') == '')
		{
			$data['inputerror'][] = 'jenis_makanan';
			$data['error_string'][] = 'Jenis Makanan tidak boleh kosong';
			$data['status'] = FALSE;
		}

		if($this->input->post('harga_makanan') == '')
		{
			$data['inputerror'][] = 'id_group';
			$data['error_string'][] = 'Harga tidak boleh kosong';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}


}

/* End of file Manajer.php */
/* Location: ./application/controllers/manajer/Manajer.php */
