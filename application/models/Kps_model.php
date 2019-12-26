<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps_model extends CI_Model{

  public function get_nama($nim){
    $this->db->from('mahasiswa');
    $this->db->where('nim', $nim);
    $query = $this->db->get();

    return $query->result();

    // return $this->db->query("SELECT * FROM mahasiswa WHERE nim = '$nim'")->result();
  }

  function tampil_data($sessiondepartemen){
    return $this->db->query("SELECT * FROM mahasiswa INNER JOIN judul ON mahasiswa.nim=judul.nim WHERE mahasiswa.departemen = '$sessiondepartemen'")->result();
  }

}
