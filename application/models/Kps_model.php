<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kps_model extends CI_Model{

  public function get_nama($nim){
    return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
     ON judul.nim=mahasiswa.nim
     WHERE mahasiswa.nim = '$nim'")->result();
  }

  function tampil_data($sessiondepartemen){
    return $this->db->query("SELECT * FROM mahasiswa INNER JOIN judul
      ON mahasiswa.nim=judul.nim
      WHERE mahasiswa.departemen = '$sessiondepartemen'
      AND mahasiswa.alumni = '0'")->result();
  }

  function tampil_data_seminar_hasil($sessiondepartemen){
    return $this->db->query("SELECT * FROM (mahasiswa LEFT JOIN judul
      ON mahasiswa.nim = judul.nim) LEFT JOIN seminar
      on mahasiswa.nim=seminar.seminar_nim
      WHERE mahasiswa.departemen = '$sessiondepartemen'
      AND mahasiswa.request_hasil = '1' AND mahasiswa.hasil = '0'
      ORDER BY seminar.seminar_id DESC")->result();
  }

  function tampil_data_seminar_tutup($sessiondepartemen){
    return $this->db->query("SELECT * FROM (mahasiswa LEFT JOIN judul
      ON mahasiswa.nim = judul.nim) LEFT JOIN seminar
      on mahasiswa.nim=seminar.seminar_nim
      WHERE mahasiswa.departemen = '$sessiondepartemen'
      AND mahasiswa.request_tutup = '1' AND mahasiswa.alumni = '0'
      ORDER BY seminar.seminar_id DESC")->result();
  }

  function tampil_data_konfirmasi_hasil($sessiondepartemen){
    return $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul
      ON mahasiswa.nim = judul.nim) LEFT JOIN seminar
      on mahasiswa.nim=seminar.seminar_nim) LEFT JOIN waktu_ujian
      ON seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
      WHERE mahasiswa.departemen = '$sessiondepartemen'
      AND seminar.seminar_pembimbing1_status='diterima'
      AND seminar.seminar_pembimbing2_status='diterima'
      AND seminar.seminar_penguji1_status='diterima'
      AND seminar.seminar_penguji2_status='diterima'
      AND seminar.seminar_jenis='seminar hasil'
      AND seminar.seminar_status='aktif'")->result();
  }

  function tampil_data_konfirmasi_tutup($sessiondepartemen){
    return $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul
      ON mahasiswa.nim = judul.nim) LEFT JOIN seminar
      on mahasiswa.nim=seminar.seminar_nim) LEFT JOIN waktu_ujian
      ON seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
      WHERE mahasiswa.departemen = '$sessiondepartemen'
      AND seminar.seminar_pembimbing1_status='diterima'
      AND seminar.seminar_pembimbing2_status='diterima'
      AND seminar.seminar_penguji1_status='diterima'
      AND seminar.seminar_penguji2_status='diterima'
      AND seminar.seminar_jenis='seminar tutup'
      AND seminar.seminar_status='aktif'")->result();
  }
}
