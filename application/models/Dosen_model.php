<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model{

  public function get_data($nim){
    return $this->db->query("SELECT * FROM (mahasiswa LEFT JOIN judul ON mahasiswa.nim=judul.nim)
    LEFT JOIN seminar ON mahasiswa.nim=seminar.seminar_nim
    WHERE judul.nim='$nim'")->result();
  }

  function bimbinganaktif($sessionnama){
    return $data = $this->db->query("SELECT * FROM mahasiswa
      LEFT JOIN judul ON mahasiswa.nim=judul.nim
      WHERE (judul.pembimbing1='$sessionnama'AND mahasiswa.alumni='0')
      OR (judul.pembimbing2='$sessionnama'AND mahasiswa.alumni='0')")->result();
  }

  function bimbinganalumni($sessionnama){
    return $data = $this->db->query("SELECT * FROM mahasiswa
      LEFT JOIN judul ON mahasiswa.nim=judul.nim
      WHERE (judul.pembimbing1='$sessionnama' AND mahasiswa.alumni='1')
      OR (judul.pembimbing2='$sessionnama' AND mahasiswa.alumni='1')")->result();
  }

  function pengujiaktif($sessionnama){
    return $data = $this->db->query("SELECT * FROM mahasiswa
      LEFT JOIN judul ON mahasiswa.nim=judul.nim
      WHERE (judul.penguji1='$sessionnama' AND mahasiswa.alumni='0')
      OR (judul.penguji2='$sessionnama' AND mahasiswa.alumni='0')")->result();
  }

  function pengujialumni($sessionnama){
    return $data = $this->db->query("SELECT * FROM mahasiswa
      LEFT JOIN judul ON mahasiswa.nim=judul.nim
      WHERE (judul.penguji1='$sessionnama' AND mahasiswa.alumni='1')
      OR (judul.penguji2='$sessionnama' AND mahasiswa.alumni='1')")->result();
  }

  function upcoming($sessionnama){

      return $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
       LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
        LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
        WHERE (judul.pembimbing1='$sessionnama' AND seminar.seminar_pembimbing1_status='menunggu')
        OR (judul.pembimbing2='$sessionnama' AND seminar.seminar_pembimbing2_status='menunggu')
        OR (judul.penguji1='$sessionnama' AND seminar.seminar_penguji1_status='menunggu')
        OR (judul.penguji2='$sessionnama' AND seminar.seminar_penguji2_status='menunggu')")->result();
  }

  function confirmed($sessionnama){
    return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
     LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
      LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
      WHERE (judul.pembimbing1='$sessionnama' AND seminar.seminar_pembimbing1_status='diterima')
      OR (judul.pembimbing2='$sessionnama' AND seminar.seminar_pembimbing2_status='diterima')
      OR (judul.penguji1='$sessionnama' AND seminar.seminar_penguji1_status='diterima')
      OR (judul.penguji2='$sessionnama' AND seminar.seminar_penguji2_status='diterima')")->result();
  }

  function done($sessionnama){
    return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
     LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
      LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
      WHERE (judul.pembimbing1='$sessionnama' AND seminar.seminar_status='selesai')
      OR (judul.pembimbing2='$sessionnama' AND seminar.seminar_status='selesai')
      OR (judul.penguji1='$sessionnama' AND seminar.seminar_status='selesai')
      OR (judul.penguji2='$sessionnama' AND seminar.seminar_status='selesai')")->result();
  }
}
