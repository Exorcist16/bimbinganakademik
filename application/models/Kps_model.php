<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps_model extends CI_Model{

  public function get_nama($nim){
    $this->db->from('mahasiswa');
    $this->db->join('judul', 'judul.nim=mahasiswa.nim');
    $this->db->where('mahasiswa.nim', $nim);
    $query = $this->db->get();

    return $query->result();
  }

  function tampil_data($sessiondepartemen){
    return $this->db->query("SELECT * FROM mahasiswa INNER JOIN judul ON mahasiswa.nim=judul.nim WHERE mahasiswa.departemen = '$sessiondepartemen'")->result();
  }

  function tampil_data_seminar_hasil($sessiondepartemen){
    return $this->db->query("SELECT * FROM (mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim) LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim WHERE mahasiswa.departemen = '$sessiondepartemen' AND mahasiswa.judul = '1'")->result();
  }

  function tampil_data_seminar_tutup($sessiondepartemen){
    return $this->db->query("SELECT * FROM (mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim) LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim WHERE mahasiswa.departemen = '$sessiondepartemen' AND mahasiswa.hasil = '1'")->result();
  }

}
