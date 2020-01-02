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
	}

	public function index() {
		redirect(base_url('superadmin/dashboard'));
	}
// --------------------------------------------------------------------------------
	public function dashboard(){
		$data = array(  'title'             => 'Superadmin Dashboard',
		                'isi'               => 'admin/dashboard/superadmin/dashboard',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function manajemenKps(){
		$kps = $this->crud->ga('kps');

		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/manajemen_kps',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
									'data'								=> $this->Superadmin_model->get_jurusan(),	//21/12/19
									'kps'									=> $kps,
									'tampilkps'						=> $this->Superadmin_model->show_data_kps()
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

		public function get_departemen(){
			$id = $this->input->post('id');
			$data = $this->Superadmin_model->get_departemen($id);
			echo json_encode($data);
		}

	public function tambah_kps(){
		$datakps = array(
			'jurusan'			=> $this->input->post('jurusan'),
			'departemen'	=> $this->input->post('departemen'),
			'username'		=> $this->input->post('user_username')
		);

		$datauser = array(
			'username'	=> $this->input->post('user_username'),
			'password'	=> md5($this->input->post('user_password')),
			'role'			=> "kps",
			'departemen'=> $this->input->post('departemen'),
			'jurusan'		=> $this->input->post('jurusan')
		);

		$this->crud->i('kps', $datakps);
		$this->crud->i('user', $datauser);
		redirect('superadmin/manajemenKps');
	}

// --------------------------------------------------------------------------------
	public function masterDataJurusan(){
		$jurusan = $this->crud->ga('jurusan');
		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/master_data_jurusan',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
										'jurusan'						=> $jurusan
		            );

		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_jurusan(){
		$data = array(
			'jurusan' => $this->input->post('jurusan_nama')
		);

		$this->crud->i('jurusan', $data);
		redirect('superadmin/masterDataJurusan');
	}

	public function edit_jurusan(){
		$id = $this->uri->segment(3);
		$data = array(
			'jurusan'		=> $this->input->post('jurusan_nama_edit')
		);
		$this->crud->u('jurusan', $data, array('id_jurusan' => $id));
		redirect('superadmin/masterDataJurusan');
	}

	public function hapus_jurusan(){
		$id = $this->uri->segment(3);
		$this->crud->d('jurusan', array('id_jurusan' => $id));
		redirect('superadmin/masterDataJurusan');
	}

	public function data_jurusan(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('jurusan', array('id_jurusan' => $id));
		echo json_encode($data);
	}
// --------------------------------------------------------------------------------
	public function masterDataDepartemen(){
		$jurusan = $this->crud->ga('jurusan');
		$departemen = $this->crud->ga('departemen');
		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/master_data_departemen',
			            	'jurusan'						=> $jurusan,
										'departemen'				=> $departemen,
										'hasil'							=> $this->Superadmin_model->show_data()
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_departemen(){
		$data = array(
			'departemen'						=> $this->input->post('departemen_nama'),
			'id_jurusan_departemen'	=> $this->input->post('departemen_jurusan')
		);

		$this->crud->i('departemen', $data);
		redirect('superadmin/masterDataDepartemen');
	}

	public function edit_departemen(){
		$id = $this->uri->segment(3);
		$data = array(
			'departemen'						=> $this->input->post('departemen_nama_edit'),
			'id_jurusan_departemen'	=> $this->input->post('departemen_jurusan_edit')
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

}
