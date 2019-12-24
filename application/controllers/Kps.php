<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    date_default_timezone_set('Asia/Makassar');
	    if($this->session->userdata('status') != "login"){
	        redirect('auth');
	    }
			$this->load->model('crud');	//22-12-2019
			$this->load->library('session');
	}

	public function index() {
		redirect(base_url('kps/daftarJudul'));
	}

	public function daftarJudul(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_judul',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function seminarHasil(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/seminar_hasil',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function ujianSkripsi(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/ujian_skripsi',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function persetujuanJadwalHasil(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_hasil',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function persetujuanJadwalTutup(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_tutup',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function daftarMahasiswa(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$sessionusername = $this->session->userdata('username');

		$mahasiswadata = $this->crud->gw('mahasiswa', array('departemen' => $sessiondepartemen));
		$departemendata = $this->crud->gw('kps', array('username' => $sessionusername));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_mahasiswa',
										'mahasiswadata'			=> $mahasiswadata,
										'departemendata'		=> $departemendata
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function daftarDosen(){
		$sessionusername = $this->session->userdata('username');
		$sessionjurusan = $this->session->userdata('jurusan');

		$departemensession = $this->crud->gw('kps', array('username' => $sessionusername));
		$dosendata = $this->crud->gw('dosen', array('jurusan_dosen' => $sessionjurusan));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_dosen',
										'dosendata'					=> $dosendata, //22-12-2019
										'departemensession'	=> $departemensession
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function masterDataWaktu(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datawaktumaster = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/master_data_waktu',
										'datawaktumaster'		=> $datawaktumaster
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function masterDataTempat(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/master_data_tempat',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	//22-12-2019
	public function tambah_dosen(){
		$sessionjurusan = $this->session->userdata('jurusan');
		
		$datadosen = array(
			'nip'								=> $this->input->post('dosen_nip'),
			'nama_dosen'				=> $this->input->post('dosen_nama'),
			'departemen_dosen'	=> $this->input->post('dosen_departemen'),
			'jurusan_dosen'			=> $sessionjurusan
		);

		$datauserdosen = array(
			'username'					=> $this->input->post('dosen_nip'),
			'password'					=> md5($this->input->post('dosen_password')),
			'nama_user'					=> $this->input->post('dosen_nama'),
			'departemen'				=> $this->input->post('dosen_departemen'),
			'role'							=> 'dosen',
			'jurusan'						=> $sessionjurusan
		);

		$this->crud->i('dosen', $datadosen);
		$this->crud->i('user', $datauserdosen);
		redirect('kps/daftarDosen');
	}

	public function tambah_mahasiswa(){
		$datamahasiswa = array(
			'nama'					=> $this->input->post('mahasiswa_nama'),
			'nim'						=> $this->input->post('mahasiswa_nim'),
			'departemen'		=> $this->input->post('mahasiswa_departemen'),
			'angkatan'			=> $this->input->post('mahasiswa_angkatan'),
			'strata'				=> $this->input->post('mahasiswa_strata')
		);

		$datausermahasiswa = array(
			'username'					=> $this->input->post('mahasiswa_nim'),
			'password'					=> md5($this->input->post('mahasiswa_password')),
			'nama_user'					=> $this->input->post('mahasiswa_nama'),
			'departemen'				=> $this->input->post('mahasiswa_departemen'),
			'role'							=> 'mahasiswa'
		);

		$this->crud->i('mahasiswa', $datamahasiswa);
		$this->crud->i('user', $datausermahasiswa);
		redirect('kps/daftarMahasiswa');
	}

	public function tambah_waktu(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$data = array(
			'waktu_mulai'				=> $this->input->post('waktu_mulai'),
			'waktu_selesai'			=> $this->input->post('waktu_selesai'),
			'waktu_departemen'	=> $sessiondepartemen
		);

		$this->crud->i('waktu_ujian', $data);
		redirect('kps/masterDataWaktu');
	}

}
