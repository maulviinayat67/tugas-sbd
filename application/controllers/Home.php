<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Home extends CI_Controller
{
    private $data;
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

        $this->data['judul']		= 'Home';
        $this->data['sub_judul']	= 'Dashboard';
        $this->data['base_link'] 	= '';

        if ($level == 'manajer') {
            $this->data['jml_meja']		= $this->M_dashboard->meja_count();
            $this->data['jml_pemesanan']  = $this->M_dashboard->pemesanan_count();
            $this->data['jml_pegawai']	= $this->M_dashboard->pegawai_count();
            $this->data['jml_makanan']	= $this->M_dashboard->makanan_count();
            $this->data['jml_database']	= $this->M_dashboard->db_count();
            $this->data['data_transaksi'] = $this->M_dashboard->laporan_transaksi();
            $this->data['tabel'] 			= $this->M_dashboard->tampiltabel();

            $this->data['user'] 			= 'MANAJER';
            $this->data['content'] 		= 'manajer/v_dashboard';
        } elseif ($level == 'kasir') {
            $this->data['jml_pemesanan']  = $this->M_dashboard->pemesanan_count();

            $this->data['user'] 			= 'KASIR';
            $this->data['content'] 		= 'kasir/v_dashboard';
        }

        $this->load->view('v_home', $this->data);
    }

    public function tanggal()
  {
    $this->M_security->cek_security();
    $data['judul']    = 'Home';
    $data['sub_judul']  = 'Dashboard';
    $data['base_link']   = '';

    $data['jml_meja']    = $this->M_dashboard->meja_count();
    $data['jml_pemesanan']  = $this->M_dashboard->pemesanan_count();
    $data['jml_pegawai']  = $this->M_dashboard->pegawai_count();
    $data['jml_makanan']  = $this->M_dashboard->makanan_count();
    $data['jml_database']  = $this->M_dashboard->db_count();
    $data['data_transaksi'] = $this->M_dashboard->laporan_transaksi();
    $data['tabel']       = $this->M_dashboard->tampiltabel();

    $data['user']       = 'MANAJER';
    $data['content']     = 'manajer/v_dashboard';


    $tgl_awal  = $this->input->post('tanggal_awal');
    $tgl_akhir = $this->input->post('tanggal_akhir');

    $data['tgl_awal']  = $tgl_awal;
    $data['tgl_akhir'] = $tgl_akhir;

    $data['tanggal_transaksi'] = $this->M_dashboard->tanggal_transaksi($tgl_awal,$tgl_akhir);

    $this->load->view('v_home',$data);


  }

    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('MDI')
               ->setLastModifiedBy('MDI')
               ->setTitle("Laporan Transaksi")
               ->setSubject("Transaksi")
               ->setDescription("Laporan Semua Data Transaksi")
               ->setKeywords("Laporan Transaksi");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN TRANSAKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID TRANSAKSI"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PEMESAN"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "TANGGAL TRANSAKSI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "NAMA PEGAWAI"); // Set kolom E3 dengan tulisan "ALAMAT"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $transaksi = $this->M_dashboard->laporan_transaksi();
        $tanggal   = $this->M_dashboard->tanggal_transaksi(); 
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($transaksi as $data) { // Lakukan looping pada variabel siswa
          $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->id_transaksi);
            $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nama_pemesan);
            $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->tanggal);
            $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->nama_pegawai);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
          $numrow++; // Tambah 1 setiap kali looping
        }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Transaksi");
        $excel->setActiveSheetIndex(0);
        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Transaksi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function backupalldb()
    {
        $save_path= 'backup/';
        $this->load->database();

        $this->load->helper('file');
        $this->load->helper('download');

        $nama_database = 'db-backup-'.date('Y-m-d-H-i-s');
        $simpan = $save_path.$nama_database.'.sql';
        include APPPATH.'third_party/Ifsnop/Mysqldump/Mysqldump.php';
        $dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=localhost;dbname={$this->db->database}", $this->db->username, $this->db->password);
        $dump->start($simpan);

        $target_file = array($simpan);
        $this->create_zip($target_file,$save_path.$nama_database.'.zip');

        $this->load->helper('download');
        force_download($nama_database.'.zip', file_get_contents($save_path.$nama_database.'.zip'));
    }

    protected function create_zip($files = array(), $destination = '', $overwrite = false)
    {
        //if the zip file already exists and overwrite is false, return false
        if (file_exists($destination) && !$overwrite) {
            return false;
        }
        //vars
        $valid_files = array();
        //if files were passed in...
        if (is_array($files)) {
            //cycle through each file
            foreach ($files as $file) {
                //make sure the file exists
                if (file_exists($file)) {
                    $valid_files[] = $file;
                }
            }
        }
        //if we have good files...
        if (count($valid_files)) {
            //create the archive
            $zip = new ZipArchive();
            if ($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }
            //add the files
            foreach ($valid_files as $file) {
                $zip->addFile($file, $file);
            }
            //debug
            //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
            //close the zip -- done!
            $zip->close();

            //check to make sure the file exists
            return file_exists($destination);
        } else {
            return false;
        }
    }

    protected function drop_foreign_key($table, $constraint)
    {
        return "ALTER TABLE {$table} DROP FOREIGN KEY {$constraint}";
    }

    protected function clear_table()
    {
        $this->load->dbforge();
        $tables = $this->db->list_tables();
        foreach (array_reverse($tables) as $table) {
          if ($table == 'tbl_struk') {
              $this->db->query($this->drop_foreign_key($table, 'tbl_struk_ibfk_1'));
              $this->db->query($this->drop_foreign_key($table, 'tbl_struk_ibfk_2'));
          } elseif ($table == 'tbl_pesanmeja') {
              $this->db->query($this->drop_foreign_key($table, 'tbl_pesanmeja_ibfk_1'));
              $this->db->query($this->drop_foreign_key($table, 'tbl_pesanmeja_ibfk_2'));
          } elseif ($table == 'tbl_pemesanan') {
              $this->db->query($this->drop_foreign_key($table, 'tbl_pemesanan_ibfk_1'));
          } elseif ($table == 'tbl_pegawai') {
              $this->db->query($this->drop_foreign_key($table, 'tbl_pegawai_ibfk_1'));
          }
          $this->db->truncate($table);
          $this->dbforge->drop_table($table, true);
        }
    }

    public function restoredb()
    {
        $filePath = './assets/databases';
        $config['upload_path'] = $filePath;
        $config['allowed_types'] = 'x-sql|sql';

        $this->load->library('upload', $config);
        $response = array();

        if (!$this->upload->do_upload('datafile')) {
            $error = array('error' => $this->upload->display_errors());
            $response['status'] = 'Error';
            $response['code'] = 500;
            $response['result'] = $error;
        } else {
            $file = $this->upload->data();
            $fotoupload = $file['file_name'];
            $fotoPath = $file['file_path'];
            $isi_file = file_get_contents($fotoPath . $fotoupload);

            $sqls = explode(';', $isi_file);
            array_pop($sqls);

            $this->clear_table();

            foreach ($sqls as $statement) {
                $statment = $statement . ";";
                $this->db->query($statement);
            }

            $response['status'] = 'Success';
            $response['code'] = 200;
        }

        echo json_encode($response);
    }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
