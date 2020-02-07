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

	public function data_kps(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('kps', array('username' => $id));
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

	public function edit_kps(){
		$id = $this->uri->segment(3);
		$data = array(
			'jurusan'			=> $this->input->post('user_jurusan_edit'),
			'departemen'	=> $this->input->post('user_departemen_edit'),
			'username'		=> $this->input->post('user_username_edit')
		);

		$datau = array(
			'username'	=> $this->input->post('user_username_edit'),
			'password'	=> md5($this->input->post('user_password_edit')),
			'departemen'=> $this->input->post('user_departemen_edit'),
			'jurusan'		=> $this->input->post('user_jurusan_edit')
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

}
