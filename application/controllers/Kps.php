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

			$this->load->model('Kps_model');
	}

	public function index() {
		redirect(base_url('kps/daftarJudul'));
	}
// ------------------------------------------------------------------------------------------------
	public function daftarJudul(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datapembimbing = $this->crud->gw('dosen', array('departemen_dosen' => $sessiondepartemen));

		$datatampil = $this->Kps_model->tampil_data($sessiondepartemen);

		$sessionjurusan = $this->session->userdata('jurusan');
		$datapenguji = $this->crud->gw('dosen', array('jurusan_dosen' => $sessionjurusan));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_judul',
										'pembimbing'				=> $datapembimbing,
										'penguji'						=> $datapenguji,
										'datatampil'				=> $datatampil
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function get_nama(){
		$nim = $this->input->post('nim');
		$data = $this->Kps_model->get_nama($nim);
		echo json_encode($data);
	}

	public function tambah_judul(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$data = array(
			'nim'					=> $this->input->post('penelitian_nim'),
			'judul'				=> $this->input->post('penelitian_judul'),
			'pembimbing1'	=> $this->input->post('penelitian_pembimbing1'),
			'pembimbing2'	=> $this->input->post('penelitian_pembimbing2'),
			'penguji1'		=> $this->input->post('penelitian_penguji1'),
			'penguji2'		=> $this->input->post('penelitian_penguji2'),
			'judul_departemen'	=> $sessiondepartemen
		);

		$this->crud->i('judul', $data);
		redirect('kps/daftarJudul');
	}
// ------------------------------------------------------------------------------------------------
	public function seminarHasil(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatampilseminar = $this->Kps_model->tampil_data_seminar_hasil($sessiondepartemen);

		$datawaktuhasil = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));
		$datatempathasil = $this->crud->gw('tempat_ujian', array('tempat_ujian_departemen' => $sessiondepartemen));
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/seminar_hasil',
										'datatampilseminar'=> $datatampilseminar,
										'datawaktuhasil'		=> $datawaktuhasil,
										'datatempathasil'		=> $datatempathasil
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
	public function tambah_seminar_hasil(){
		$nim = $this->input->post('ujian_hasil_nim');

		$data = array(
			'seminar_nim'			=> $nim,
			'seminar_tanggal'	=> $this->input->post('ujian_hasil_tanggal'),
			'seminar_waktu'		=> $this->input->post('ujian_hasil_waktu'),
			'seminar_tempat'	=> $this->input->post('ujian_hasil_tempat'),
			'seminar_jenis'		=> 'seminar hasil'
		);

		$datastatusujian = array(
			'request_hasil'		=> '1'
		);

		$this->crud->i('seminar', $data);
		$this->crud->u('mahasiswa', $datastatusujian, array('nim' => $nim));
		redirect('kps/seminarHasil');
	}
// ------------------------------------------------------------------------------------------------
	public function ujianSkripsi(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatampiltutup = $this->Kps_model->tampil_data_seminar_tutup($sessiondepartemen);
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/ujian_skripsi',
										'datatampiltutup'	=> $datatampiltutup
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
	public function tambah_seminar_tutup(){
		$nim = $this->input->post('ujian_tutup_nim');
		$data = array(
			'seminar_nim'			=> $nim,
			'seminar_tanggal'	=> $this->input->post('ujian_tutup_tanggal'),
			'seminar_waktu'		=> $this->input->post('ujian_tutup_waktu'),
			'seminar_tempat'	=> $this->input->post('ujian_tutup_tempat'),
			'seminar_jenis'		=> 'seminar tutup'
		);

		$datastatusujiantutup = array(
			'request_tutup'	=> '1'
		);
		$this->crud->i('seminar', $data);
		$this->crud->u('mahasiswa', $datastatusujiantutup, array('nim' => $nim));
		redirect('kps/ujianSkripsi');
	}
// ------------------------------------------------------------------------------------------------
	public function persetujuanJadwalHasil(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_hasil',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
// ------------------------------------------------------------------------------------------------
	public function persetujuanJadwalTutup(){
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_tutup',
		            	// 'dataScript'        => 'admin/dataScript/beranda-script'
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
// ------------------------------------------------------------------------------------------------
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
// ------------------------------------------------------------------------------------------------
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
// ------------------------------------------------------------------------------------------------
	public function masterDataWaktu(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datawaktumaster = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/master_data_waktu',
										'datawaktumaster'		=> $datawaktumaster
		            );
		$this->load->view('admin/_layout/wrapper', $data);
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
// ------------------------------------------------------------------------------------------------
	public function masterDataTempat(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatempatmaster = $this->crud->gw('tempat_ujian', array('tempat_ujian_departemen' => $sessiondepartemen));

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/master_data_tempat',
										'datatempatmaster'	=> $datatempatmaster
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_tempat(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$data = array(
			'tempat_ujian_nama'				=> $this->input->post('tempat'),
			'tempat_ujian_departemen'	=> $sessiondepartemen
		);

		$this->crud->i('tempat_ujian', $data);
		redirect('kps/masterDataTempat');
	}
}
