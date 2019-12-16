<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }
	}

	public function index() {
		redirect(base_url('superadmin/dashboard'));
	}

	public function dashboard(){
		$data = array(  'title'             => 'Superadmin Dashboard',
		                'isi'               => 'admin/dashboard/superadmin/dashboard',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function manajemenKps(){
		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/manajemen_kps',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function masterDataJurusan(){
		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/master_data_jurusan',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function masterDataDepartemen(){
		$data = array(  'title'             => 'Manajemen User',
		                'isi'               => 'admin/dashboard/superadmin/master_data_departemen',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
}
