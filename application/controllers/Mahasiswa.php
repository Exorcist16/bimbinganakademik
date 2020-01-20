<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }
	}

	public function index() {
		redirect(base_url('mahasiswa/beranda'));
	}

	public function beranda(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/mahasiswa/beranda',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function kartuKontrol(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/mahasiswa/kartu_kontrol',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambahAktivitas(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/mahasiswa/tambah_aktivitas',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function bimbingan(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/mahasiswa/bimbingan',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

}
