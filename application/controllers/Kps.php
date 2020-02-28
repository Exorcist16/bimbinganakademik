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
			$this->load->helper('download');
	}

	public function index() {
		redirect(base_url('kps/daftarJudul'));
	}
// ------------------------------------------------------------------------------------------------
	public function daftarJudul(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datadosen = $this->crud->ga('dosen');

		$datatampil = $this->Kps_model->tampil_data($sessiondepartemen);

		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/daftar_judul',
										'datatampil'				=> $datatampil,
										'dosen'							=> $datadosen
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function get_nama(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$nim = $this->input->post('nim');
		$data = $this->Kps_model->get_nama($nim, $sessiondepartemen);
		echo json_encode($data);
	}

	public function tambah_judul(){
		$sessiondepartemen = $this->session->userdata('departemen');

		$nim = $this->input->post('penelitian_nim');
		$mahasiswa = $this->crud->gw('mahasiswa', array('nim' => $nim));

		$data = array(
			'nim'								=> $this->input->post('penelitian_nim'),
			'judul'							=> $this->input->post('penelitian_judul'),
			'pembimbing1'				=> $this->input->post('penelitian_pembimbing1'),
			'pembimbing2'				=> $this->input->post('penelitian_pembimbing2'),
			'penguji1'					=> $this->input->post('penelitian_penguji1'),
			'penguji2'					=> $this->input->post('penelitian_penguji2'),
			'judul_departemen'	=> $sessiondepartemen
		);

		foreach ($mahasiswa as $key) {
			$datauser = array(
				'username'	=> $key->nim,
				'password'	=> md5($key->nim),
				'nama_user'	=> $key->nama,
				'role'			=> 'mahasiswa',
				'departemen'=> $key->departemen
			);
		}

		$this->crud->i('judul', $data);
		$this->crud->i('user', $datauser);
		redirect('kps/daftarJudul');
	}

	public function edit_judul(){
		$id = $this->uri->segment(3);

		$data = array(
			'judul'				=> $this->input->post('penelitian_judul_edit'),
			'pembimbing1'	=> $this->input->post('penelitian_pembimbing1_edit'),
			'pembimbing2'	=> $this->input->post('penelitian_pembimbing2_edit'),
			'penguji1'		=> $this->input->post('penelitian_penguji1_edit'),
			'penguji2'		=> $this->input->post('penelitian_penguji2_edit')
		);

		$datajudul = array(
			'seminar_status'	=> 'rejected'
		);

		$this->crud->u('seminar', $datajudul, array('seminar_nim' => $id));
		$this->crud->u('judul', $data, array('nim' => $id));
		redirect('kps/daftarJudul');
	}

	public function hapus_judul(){
		$id = $this->uri->segment(3);
		$this->crud->d('judul', array('nim' => $id));
		redirect('kps/daftarJudul');
	}

	public function get_jumlah_bimbing(){
		$nama = $this->input->post('nama');
		$data = $this->db->query("SELECT COUNT(*)
						AS pembimbing FROM `judul` WHERE pembimbing1 = '$nama'
						OR pembimbing2 = '$nama'")->result();
		echo json_encode($data);
	}

	public function get_jumlah_uji(){
		$nama = $this->input->post('nama');
		$data = $this->db->query("SELECT COUNT(*)
						AS penguji FROM `judul` WHERE penguji1 = '$nama'
						OR penguji2 = '$nama'")->result();
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function seminarHasil(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatampilseminar = $this->Kps_model->tampil_data_seminar_hasil($sessiondepartemen);

		$datawaktuhasil = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));
		$datatempathasil = $this->crud->ga('tempat_ujian');
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/seminar_hasil',
										'datatampilseminar' => $datatampilseminar,
										'datawaktuhasil'		=> $datawaktuhasil,
										'datatempathasil'		=> $datatempathasil
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}
	public function tambah_seminar_hasil(){
		$nim = $this->input->post('ujian_hasil_nim');

		$data = array(
			'seminar_nim'								=> $nim,
			'seminar_tanggal'						=> $this->input->post('ujian_hasil_tanggal'),
			'seminar_waktu'							=> $this->input->post('ujian_hasil_waktu'),
			'seminar_tempat'						=> $this->input->post('ujian_hasil_tempat'),
			'seminar_pembimbing1_nama'	=> $this->input->post('ujian_hasil_pembimbing1'),
			'seminar_pembimbing1_status'=> 'menunggu',
			'seminar_pembimbing2_nama'	=> $this->input->post('ujian_hasil_pembimbing2'),
			'seminar_pembimbing2_status'=> 'menunggu',
			'seminar_penguji1_nama'			=> $this->input->post('ujian_hasil_penguji1'),
			'seminar_penguji1_status'		=> 'menunggu',
			'seminar_penguji2_nama'			=> $this->input->post('ujian_hasil_penguji2'),
			'seminar_penguji2_status'		=> 'menunggu',
			'seminar_jenis'							=> 'seminar hasil',
			'seminar_status'						=> 'aktif'
		);

		$datastatusujian = array(
			'request_hasil'		=> '1'
		);

		$this->crud->i('seminar', $data);
		$this->crud->u('mahasiswa', $datastatusujian, array('nim' => $nim));
		redirect('kps/seminarHasil');
	}

	public function hapus_seminar(){
		$id = $this->uri->segment(3);

		$nim = $this->db->query("SELECT seminar_nim FROM seminar WHERE seminar_id = '$id'")->result();
		foreach ($nim as $nim) {
			$nima = $nim->seminar_nim;
		}

		$data = array(
			'request_hasil' => '0'
		);

		$this->crud->u('mahasiswa', $data, array('nim' => $nima));
		$this->crud->d('seminar', array('seminar_id' => $id));
		redirect('kps/seminarHasil');
	}

	public function data_seminar(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM (seminar LEFT JOIN mahasiswa
			ON seminar.seminar_nim=mahasiswa.nim)
			LEFT JOIN judul ON mahasiswa.nim=judul.nim
			WHERE seminar.seminar_id = '$id'")->result();
		echo json_encode($data);
	}

	public function proteksi(){
		$tanggal = $this->input->post('tanggal');
		$data = $this->db->query("SELECT * FROM seminar WHERE seminar_tanggal='$tanggal'")->result();
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function ujianSkripsi(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datatampiltutup = $this->Kps_model->tampil_data_seminar_tutup($sessiondepartemen);

		$datawaktututup = $this->crud->gw('waktu_ujian', array('waktu_departemen' => $sessiondepartemen));
		$datatempattutup = $this->crud->gw('tempat_ujian', array('tempat_ujian_departemen' => $sessiondepartemen));
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/ujian_skripsi',
										'datatampiltutup'		=> $datatampiltutup,
										'datawaktututup'		=> $datawaktututup,
										'datatempattutup'		=> $datatempattutup
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tambah_seminar_tutup(){
		$nim = $this->input->post('ujian_tutup_nim');
		$data = array(
			'seminar_nim'								=> $nim,
			'seminar_tanggal'						=> $this->input->post('ujian_tutup_tanggal'),
			'seminar_waktu'							=> $this->input->post('ujian_tutup_waktu'),
			'seminar_tempat'						=> $this->input->post('ujian_tutup_tempat'),
			'seminar_pembimbing1_nama'	=> $this->input->post('ujian_tutup_pembimbing1'),
			'seminar_pembimbing1_status'=> 'menunggu',
			'seminar_pembimbing2_nama'	=> $this->input->post('ujian_tutup_pembimbing2'),
			'seminar_pembimbing2_status'=> 'menunggu',
			'seminar_penguji1_nama'			=> $this->input->post('ujian_tutup_penguji1'),
			'seminar_penguji1_status'		=> 'menunggu',
			'seminar_penguji2_nama'			=> $this->input->post('ujian_tutup_penguji2'),
			'seminar_penguji2_status'		=> 'menunggu',
			'seminar_jenis'							=> 'seminar tutup',
			'seminar_status'						=> 'aktif'
		);

		$datastatusujiantutup = array(
			'request_tutup'	=> '1'
		);
		$this->crud->i('seminar', $data);
		$this->crud->u('mahasiswa', $datastatusujiantutup, array('nim' => $nim));
		redirect('kps/ujianSkripsi');
	}

	public function hapus_tutup(){
		$id = $this->uri->segment(3);

		$nim = $this->db->query("SELECT seminar_nim FROM seminar WHERE seminar_id = '$id'")->result();
		foreach ($nim as $nim) {
			$nima = $nim->seminar_nim;
		}

		$data = array(
			'request_tutup' => '0'
		);

		$this->crud->u('mahasiswa', $data, array('nim' => $nima));
		$this->crud->d('seminar', array('seminar_id' => $id));
		redirect('kps/ujianSkripsi');
	}

	public function data_tutup(){
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM (seminar LEFT JOIN mahasiswa
			ON seminar.seminar_nim=mahasiswa.nim)
			LEFT JOIN judul ON mahasiswa.nim=judul.nim
			WHERE seminar.seminar_id = '$id'")->result();
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function persetujuanJadwalHasil(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datakonfirmasihasil = $this->Kps_model->tampil_data_konfirmasi_hasil($sessiondepartemen);
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_hasil',
										'konfirmasihasil'		=> $datakonfirmasihasil
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function hasil_selesai(){
		$id = $this->uri->segment(3);
		$nim = $this->uri->segment(4);
		$datamahasiswa = array(
			'hasil'		=> '1'
		);
		$dataseminar = array(
			'seminar_status'	=> 'selesai'
		);

		$this->crud->u('mahasiswa', $datamahasiswa, array('nim' => $nim));
		$this->crud->u('seminar', $dataseminar, array('seminar_id' => $id));
		redirect('kps/persetujuanJadwalHasil');
	}

	public function hasil_batal(){
		$id = $this->uri->segment(3);
		$nim = $this->uri->segment(4);
		$datamahasiswa = array(
			'request_hasil'		=> '0'
		);
		$dataseminar = array(
			'seminar_status'	=> 'rejected'
		);

		$this->crud->u('mahasiswa', $datamahasiswa, array('nim' => $nim));
		$this->crud->u('seminar', $dataseminar, array('seminar_id' => $id));
		redirect('kps/persetujuanJadwalHasil');
	}

	public function data_hasil(){
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM mahasiswa JOIN seminar
		ON mahasiswa.nim=seminar.seminar_nim WHERE seminar.seminar_id = '$id'")->result();
		echo json_encode($data);
	}
// ------------------------------------------------------------------------------------------------
	public function persetujuanJadwalTutup(){
		$sessiondepartemen = $this->session->userdata('departemen');
		$datakonfirmasitutup = $this->Kps_model->tampil_data_konfirmasi_tutup($sessiondepartemen);
		$data = array(  'title'             => 'KPS Dashboard',
		                'isi'               => 'admin/dashboard/kps/persetujuan_jadwal_tutup',
										'konfirmasitutup'		=> $datakonfirmasitutup
		            );
		$this->load->view('admin/_layout/wrapper', $data);
	}

	public function tutup_selesai(){
		$id = $this->uri->segment(3);
		$nim = $this->uri->segment(4);
		$datamahasiswa = array(
			'alumni'		=> '1'
		);
		$dataseminar = array(
			'seminar_status'	=> 'selesai'
		);

		$this->crud->u('mahasiswa', $datamahasiswa, array('nim' => $nim));
		$this->crud->u('seminar', $dataseminar, array('seminar_id' => $id));
		redirect('kps/persetujuanJadwalTutup');
	}

	public function tutup_batal(){
		$id = $this->uri->segment(3);
		$nim = $this->uri->segment(4);
		$datamahasiswa = array(
			'request_tutup'		=> '0'
		);
		$dataseminar = array(
			'seminar_status'	=> 'rejected'
		);

		$this->crud->u('mahasiswa', $datamahasiswa, array('nim' => $nim));
		$this->crud->u('seminar', $dataseminar, array('seminar_id' => $id));
		redirect('kps/persetujuanJadwalTutup');
	}

	public function data_konfirmasi_tutup(){
		$id = $this->input->post('id');
		$data = $this->db->query("SELECT * FROM mahasiswa JOIN seminar
		ON mahasiswa.nim=seminar.seminar_nim WHERE seminar.seminar_id = '$id'")->result();
		echo json_encode($data);
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
			'nim'						=> $this->input->post('mahasiswa_nim'),
			'nama'					=> $this->input->post('mahasiswa_nama'),
			'departemen'		=> $this->input->post('mahasiswa_departemen'),
			'angkatan'			=> $this->input->post('mahasiswa_angkatan'),
			'strata'				=> $this->input->post('mahasiswa_strata')
		);

		$this->crud->i('mahasiswa', $datamahasiswa);
		redirect('kps/daftarMahasiswa');
	}

	public function upload_mahasiswa(){
		$sessiondepartemen = $this->session->userdata('departemen');
		//load plugin PHPExcel
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$config['upload_path'] = 'assets/excel/';
		$config['allowed_types'] = 'xlsx|xls|csv';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload()){
			$this->session->set_flashdata('notif', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> '.$this->upload->display_errors().'</div>');
			redirect('kps/daftarMahasiswa');
		} else {
			$data_upload = $this->upload->data();
			$excel_reader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excel_reader->load('assets/excel/'.$data_upload['file_name']);
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
			$data = array();
			$numrow = 1;

			foreach ($sheet as $row) {
				if ($numrow > 1) {
					array_push($data, array(
						'nim'					=> $row['A'],
						'nama'				=> $row['B'],
						'strata'			=> $row['C'],
						'angkatan'		=> $row['D'],
						'departemen'	=> $sessiondepartemen
					));
				}
				$numrow++;
			}

			$this->db->insert_batch('mahasiswa', $data);

			unlink('assets/excel/'.$data_upload['file_name']);

			$this->session->set_flashdata('notif', '<div class="alert alert-success"><b>IMPORT BERHASIL!</b></div>');
			redirect('kps/daftarMahasiswa');
		}
	}

	public function download_format_mahasiswa(){
		force_download('assets/excel/format_mahasiswa.xlsx', NULL);
	}

	public function edit_mahasiswa(){
		$id = $this->uri->segment(3);
		$data = array(
			'nim'								=> $this->input->post('mahasiswa_nim_edit'),
			'nama'							=> $this->input->post('mahasiswa_nama_edit'),
			'angkatan'					=> $this->input->post('mahasiswa_angkatan_edit'),
			'strata'						=> $this->input->post('mahasiswa_strata_edit')
		);

		$datam = array(
			'username'	=> $this->input->post('mahasiswa_nim_edit'),
			'password'	=> md5($this->input->post('mahasiswa_nim_edit')),
			'nama_user'	=> $this->input->post('mahasiswa_nama_edit')
		);

		$this->crud->u('mahasiswa', $data, array('nim' => $id));
		$this->crud->u('user', $datam, array('username' => $id));
		redirect('kps/daftarMahasiswa');
	}

	public function hapus_mahasiswa(){
		$id = $this->uri->segment(3);
		$this->crud->d('mahasiswa', array('nim' => $id));
		$this->crud->d('user', array('username' => $id));
		redirect('kps/daftarMahasiswa');
	}

	public function data_mahasiswa(){
		$nim = $this->input->post('id');
		$data = $this->crud->gw('mahasiswa', array('nim' => $nim));
		echo json_encode($data);
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

	public function edit_waktu(){
		$id = $this->uri->segment(3);
		$data = array(
			'waktu_mulai'		=> $this->input->post('waktu_mulai_edit'),
			'waktu_selesai'	=> $this->input->post('waktu_selesai_edit')
		);

		$this->crud->u('waktu_ujian', $data, array('waktu_ujian_id' => $id));
		redirect('kps/masterDataWaktu');
	}

	public function hapus_waktu(){
		$id = $this->uri->segment(3);
		$this->crud->d('waktu_ujian', array('waktu_ujian_id' => $id));
		redirect('kps/masterDataWaktu');
	}

	public function data_waktu(){
		$id = $this->input->post('id');
		$data = $this->crud->gw('waktu_ujian', array('waktu_ujian_id' => $id));
		echo json_encode($data);
	}
}
