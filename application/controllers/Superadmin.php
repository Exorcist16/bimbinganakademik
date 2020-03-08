<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {
	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }

			$this->load->model('crud');	//19-12-2019
			$this->load->model('Superadmin_model');	//21-12-2019
			$this->load->helper('download');
	}

	public function index() {
		redirect(base_url('superadmin/dashboard'));
	}
// --------------------------------------------------------------------------------
	public function dashboard(){
		$jmldepartemen = $this->db->query("SELECT COUNT(*) AS jumlah_departemen FROM
			departemen")->result();
		$jmlkps = $this->db->query("SELECT COUNT(*) jumlah_kps FROM kps")->result();
		$jmlruangan = $this->db->query("SELECT COUNT(*) jumlah_ruangan FROM tempat_ujian")
			->result();
		$jmldosen = $this->db->query("SELECT COUNT(*) jumlah_dosen FROM dosen")->result();
		$jmls1 = $this->db->query("SELECT COUNT(*) jumlah_s1 FROM mahasiswa WHERE
		 strata = 'S1'")->result();
		$jmls23 = $this->db->query("SELECT COUNT(*) jumlah_s23 FROM mahasiswa WHERE
			strata = 'S1' AND strata = 'S3'")->result();

		$data = array(  'title'             => 'Superadmin Dashboard',
		                'isi'               => 'admin/dashboard/superadmin/dashboard',
										'jmldepartemen'			=> $jmldepartemen,
										'jmlkps'						=> $jmlkps,
										'jmlruangan'				=> $jmlruangan,
										'jmldosen'					=> $jmldosen,
										'jmls1'							=> $jmls1,
										'jmls23'						=> $jmls23
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function manajemenKps(){
		$kps = $this->crud->ga('kps');
		$departemen = $this->crud->ga('departemen');

		$data = array(  'title'             => 'Manajemen User',
										'isi'               => 'admin/dashboard/superadmin/manajemen_kps',
		                'kps'								=> $kps,
										'departemen'				=> $departemen
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_kps(){
		$datakps = array(
			'departemen'	=> $this->input->post('departemen'),
			'username'		=> $this->input->post('user_username')
		);

		$datauser = array(
			'username'	=> $this->input->post('user_username'),
			'password'	=> md5($this->input->post('user_password')),
			'role'			=> "kps",
			'departemen'=> $this->input->post('departemen')
		);

		$this->crud->i('kps', $datakps);
		$this->crud->i('user', $datauser);
		redirect('superadmin/manajemenKps');
	}

	public function edit_kps(){
		$id = $this->uri->segment(3);
		$data = array(
			'departemen'	=> $this->input->post('user_departemen_edit'),
			'username'		=> $this->input->post('user_username_edit')
		);

		$datau = array(
			'username'	=> $this->input->post('user_username_edit'),
			'password'	=> md5($this->input->post('user_password_edit')),
			'departemen'=> $this->input->post('user_departemen_edit')
		);
		$this->crud->u('kps', $data, array('username' => $id));
		$this->crud->u('user', $datau, array('username' => $id));
		redirect('superadmin/manajemenKps');
	}

	public function hapus_kps(){
		$id = $this->uri->segment(3);
		$this->crud->d('kps', array('username' => $id));
		$this->crud->d('user', array('username' => $id));
		redirect('superadmin/manajemenKps');
	}

		public function data_kps(){
			$id = $this->input->post('id');
			$data = $this->crud->gw('kps', array('username' => $id));
			echo json_encode($data);
		}

// --------------------------------------------------------------------------------
	public function masterDataDepartemen(){
		$departemen = $this->crud->ga('departemen');
		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/master_data_departemen',
										'departemen'				=> $departemen
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_departemen(){
		$data = array(
			'departemen'						=> $this->input->post('departemen_nama')
		);

		$this->crud->i('departemen', $data);
		redirect('superadmin/masterDataDepartemen');
	}

	public function edit_departemen(){
		$id = $this->uri->segment(3);
		$data = array(
			'departemen'						=> $this->input->post('departemen_nama_edit')
		);
		$this->crud->u('departemen', $data, array('id_departemen' => $id));
		redirect('superadmin/masterDataDepartemen');
	}

	public function hapus_departemen(){
		$id = $this->uri->segment(3);
		$this->crud->d('departemen', array('id_departemen' => $id));
		redirect('superadmin/masterDataDepartemen');
	}

	public function data_departemen(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('departemen', array('id_departemen' => $id));
		echo json_encode($data);
	}

	// --------------------------------------------------------------------------------

	public function masterDataTempatSeminar(){
		$datatempatmaster = $this->crud->ga('tempat_ujian');
		$departemen = $this->crud->ga('departemen');

		$data = array(	'title'							=> 'Master Data Tempat Seminar',
										'isi'								=> 'admin/dashboard/superadmin/master_data_tempat_seminar',
										'datatempatmaster'	=> $datatempatmaster,
										'departemen'				=> $departemen,
										'dep'								=> $departemen
									);
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_tempat(){
		$data = array(
			'tempat_ujian_nama'				=> $this->input->post('tempat'),
			'tempat_ujian_departemen'	=> $this->input->post('departemen')
		);

		$this->crud->i('tempat_ujian', $data);
		redirect('superadmin/masterDataTempatSeminar');
	}

	public function edit_tempat(){
		$id = $this->uri->segment(3);
		$data = array(
			'tempat_ujian_nama' => $this->input->post('tempat_nama_edit'),
			'tempat_ujian_departemen'	=> $this->input->post('departemen_edit')
		);

		$this->crud->u('tempat_ujian', $data, array('tempat_ujian_id' => $id));
		redirect('superadmin/masterDataTempatSeminar');
	}

	public function hapus_tempat(){
		$id = $this->uri->segment(3);
		$this->crud->d('tempat_ujian', array('tempat_ujian_id' => $id));
		redirect('superadmin/masterDataTempatSeminar');
	}

	public function data_tempat(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('tempat_ujian', array('tempat_ujian_id' => $id));
		echo json_encode($data);
	}

	// --------------------------------------------------------------------------------
	public function manajemenDosen(){
		$dosendata = $this->db->query('SELECT * FROM dosen ORDER BY nama_dosen ASC')->result();

		$data = array(	'title'			=> 'Manajemen Dosen',
										'isi'				=> 'admin/dashboard/superadmin/manajemen_dosen',
										'dosendata'	=> $dosendata
									);
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_dosen(){
		$datadosen = array(
			'nip'					=> $this->input->post('dosen_nip'),
			'nama_dosen'	=> $this->input->post('dosen_nama')
		);

		$datauser = array(
			'username'		=> $this->input->post('dosen_nip'),
			'password'		=> md5($this->input->post('dosen_nip')),
			'nama_user'		=> $this->input->post('dosen_nama'),
			'role'				=> 'dosen'
		);

		$this->crud->i('dosen', $datadosen);
		$this->crud->i('user', $datauser);
		redirect('superadmin/manajemenDosen');
	}

	public function edit_dosen(){
		$id = $this->uri->segment(3);
		$datadosen = array(
			'nip'				=> $this->input->post('dosen_nip_edit'),
			'nama_dosen'=> $this->input->post('dosen_nama_edit')
		);

		$datauser = array(
			'username'	=> $this->input->post('dosen_nip_edit'),
			'password'	=> md5($this->input->post('dosen_nip_edit')),
			'nama_user'	=> $this->input->post('dosen_nama_edit')
		);

		$this->crud->u('dosen', $datadosen, array('nip' => $id));
		$this->crud->u('user', $datauser, array('username' => $id));
		redirect('superadmin/manajemenDosen');
	}

	public function hapus_dosen(){
		$id = $this->uri->segment(3);
		$this->crud->d('dosen', array('nip' => $id));
		$this->crud->d('user', array('username' => $id));
		redirect('superadmin/manajemenDosen');
	}

	public function data_dosen(){
		$nip = $this->input->post('id');
		$data = $this->crud->gw('dosen', array('nip' => $nip));
		echo json_encode($data);
	}

	public function upload_dosen(){
		//load plugin phpexcel
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] = 'assets/excel/';
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			//upload gagal
			$this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
			//redirect
			redirect('superadmin/manajemenDosen');
		} else {
			$data_upload = $this->upload->data();
			$excel_reader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excel_reader->load('assets/excel/'.$data_upload['file_name']);
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
			$data = array();
			$datauser = array();
			$numrow = 1;
			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'nip'					=> $row['A'],
						'nama_dosen'	=> $row['B']
					));
					array_push($datauser, array(
						'username'	=> $row['A'],
						'password'	=> md5($row['A']),
						'nama_user'	=> $row['B'],
						'role'			=> 'dosen'
					));
				}
				$numrow++;
			}

			$this->db->insert_batch('dosen', $data);
			$this->db->insert_batch('user', $datauser);

			unlink('assets/excel/'.$data_upload['file_name']);

			//upload sukses
			$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>IMPORT BERHASIL!</b></div>');
			redirect('superadmin/manajemenDosen');
		}
	}

	public function download_file(){
		force_download('assets/excel/format.xlsx', NULL);
	}
}
