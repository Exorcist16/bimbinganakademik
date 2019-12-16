<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }
	}

	public function index() {
		redirect(base_url('dosen/dashboard'));
	}

	public function dashboard() {
		$data = array(	'title'				=> 'Mahasiswa Dashboard',
						'isi'				=> 'admin/dashboard/dosen/dosen_dashboard',
						// 'dataScript'		=> 'admin/dataScript/beranda-script'
					);
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function pembimbingIn(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_pembimbing_in',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function pembimbingOut(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_pembimbing_out',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function pengujiIn(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_penguji_in',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function pengujiOut(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_penguji_out',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function PenugasanIn(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_in',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function PenugasanConf(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_conf',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function penugasanOut(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_out',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function bimbinganMasuk(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/bimbingan_masuk',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function bimbingan(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/bimbingan',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
	
}
