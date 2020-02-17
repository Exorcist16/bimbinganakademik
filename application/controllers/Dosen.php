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

// --------------------------------------------------------------------------------
	public function dashboard() {
		$sessionnama = $this->session->userdata('nama_user');
		$jmlbimbing = $this->db->query("SELECT COUNT(*) AS bimbingan FROM `judul`
									WHERE pembimbing1='$sessionnama' OR pembimbing2='$sessionnama'
									")->result();
		$jmluji = $this->db->query("SELECT COUNT(*) AS uji FROM `judul`
							WHERE penguji1='$sessionnama' OR penguji2='$sessionnama'")->result();
		$data = array(	'title'				=> 'Mahasiswa Dashboard',
										'isi'					=> 'admin/dashboard/dosen/dosen_dashboard',
										'bimbingan'		=> $jmlbimbing,
										'uji'					=> $jmluji
					);
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function pembimbingIn(){
		$sessionnama = $this->session->userdata('nama_user');
		$bimbinganaktif = $this->Dosen_model->bimbinganaktif($sessionnama);
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_pembimbing_in',
										'bimbinganaktif'		=> $bimbinganaktif
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function pembimbingOut(){
		$sessionnama = $this->session->userdata('nama_user');
		$bimbinganalumni = $this->Dosen_model->bimbinganalumni($sessionnama);
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_pembimbing_out',
										'bimbinganalumni'		=> $bimbinganalumni
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function pengujiIn(){
		$sessionnama = $this->session->userdata('nama_user');
		$pengujiaktif = $this->Dosen_model->pengujiaktif($sessionnama);
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_penguji_in',
										'pengujiaktif'			=> $pengujiaktif
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function pengujiOut(){
		$sessionnama = $this->session->userdata('nama_user');
		$pengujialumni = $this->Dosen_model->pengujialumni($sessionnama);
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/dosen_penguji_out',
										'pengujialumni'			=> $pengujialumni
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function PenugasanIn(){
		$sessionnama = $this->session->userdata('nama_user');
		$dataupcoming = $this->Dosen_model->upcoming($sessionnama);

		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_in',
										'dataupcoming'			=> $dataupcoming
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function terima_seminar(){
		$nim = $this->uri->segment(3);
		$sessionnama = $this->session->userdata('nama_user');
		$datadata = $this->crud->gw('seminar', array('seminar_nim' => $nim));
		foreach ($datadata as $datadata) {
			$pembimbing1 = $datadata->seminar_pembimbing1_nama;
			$pembimbing2 = $datadata->seminar_pembimbing2_nama;
			$penguji1 = $datadata->seminar_penguji1_nama;
			$penguji2 = $datadata->seminar_penguji2_nama;

			if ($pembimbing1==$sessionnama) {
				$data = array(
					'seminar_pembimbing1_status' => 'diterima'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			} elseif ($pembimbing2==$sessionnama) {
				$data = array(
					'seminar_pembimbing2_status' => 'diterima'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			} elseif ($penguji1 == $sessionnama) {
				$data = array(
					'seminar_penguji1_status' => 'diterima'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			} elseif ($penguji2 == $sessionnama) {
				$data = array(
					'seminar_penguji2_status' => 'diterima'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			}
		}
		redirect('dosen/penugasanConf');
	}

	public function tolak_seminar(){
		$nim = $this->uri->segment(3);
		$sessionnama = $this->session->userdata('nama_user');
		$datadata = $this->crud->gw('seminar', array('seminar_nim' => $nim));
		foreach ($datadata as $datadata) {
			$pembimbing1 = $datadata->seminar_pembimbing1_nama;
			$pembimbing2 = $datadata->seminar_pembimbing2_nama;
			$penguji1 = $datadata->seminar_penguji1_nama;
			$penguji2 = $datadata->seminar_penguji2_nama;

			if ($pembimbing1==$sessionnama) {
				$data = array(
					'seminar_pembimbing1_status'=> 'ditolak',
					'seminar_status'						=> 'rejected'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			} elseif ($pembimbing2==$sessionnama) {
				$data = array(
					'seminar_pembimbing2_status' => 'ditolak',
					'seminar_status'						 => 'rejected'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			} elseif ($penguji1 == $sessionnama) {
				$data = array(
					'seminar_penguji1_status' => 'ditolak',
					'seminar_status'					=> 'rejected'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			} elseif ($penguji2 == $sessionnama) {
				$data = array(
					'seminar_penguji2_status' => 'ditolak',
					'seminar_status'					=> 'rejected'
				);
				$this->crud->u('seminar', $data, array('seminar_nim' => $nim));
			}
		}
		redirect('dosen/penugasanIn');
	}

// --------------------------------------------------------------------------------
	public function PenugasanConf(){
		$sessionnama = $this->session->userdata('nama_user');
		$dataconfirmed = $this->Dosen_model->confirmed($sessionnama);

		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_conf',
										'dataconfirmed'			=> $dataconfirmed
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function penugasanOut(){
		$sessionnama = $this->session->userdata('nama_user');
		$datadone = $this->Dosen_model->done($sessionnama);

		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/penugasan_out',
										'datadone'					=> $datadone
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function bimbinganMasuk(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/bimbingan_masuk',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function bimbingan(){
		$data = array(  'title'             => 'Mahasiswa Dashboard',
		                'isi'               => 'admin/dashboard/dosen/bimbingan',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

// --------------------------------------------------------------------------------
	public function get_data(){
		$nim = $this->input->post('nim');
		$data = $this->Dosen_model->get_data($nim);
		echo json_encode($data);
	}
}
