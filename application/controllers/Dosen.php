<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }
			$this->load->model('crud');
			$this->load->library('session');
			$this->load->model('Dosen_model');
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
		$sessionnama = $this->session->userdata('nama_user');
		$bimbinganaktif = $this->Dosen_model->bimbinganaktif($sessionnama);
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_pembimbing_in',
										'bimbinganaktif'		=> $bimbinganaktif
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function pembimbingOut(){
		$sessionnama = $this->session->userdata('nama_user');
		$bimbinganalumni = $this->Dosen_model->bimbinganalumni($sessionnama);
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_pembimbing_out',
										'bimbinganalumni'		=> $bimbinganalumni
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
		$sessionnama = $this->session->userdata('nama_user');
		$dataupcoming = $this->Dosen_model->upcoming($sessionnama);

		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_in',
										'dataupcoming'			=> $dataupcoming
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function PenugasanConf(){
		$sessionnama = $this->session->userdata('nama_user');
		$dataconfirmed = $this->Dosen_model->confirmed($sessionnama);

		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_conf',
										'dataconfirmed'			=> $dataconfirmed
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}


	public function penugasanOut(){
		$sessionnama = $this->session->userdata('nama_user');
		$datadone = $this->Dosen_model->done($sessionnama);

		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_out',
										'datadone'					=> $datadone
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
