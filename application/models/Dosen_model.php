<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model{

  public function get_data($nim){
    return $this->db->query("SELECT * FROM (mahasiswa LEFT JOIN judul ON mahasiswa.nim=judul.nim)
    LEFT JOIN seminar ON mahasiswa.nim=seminar.seminar_nim
    WHERE judul.nim='$nim'")->result();
  }

  function bimbinganaktif($sessionnama){
    $data = $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul ON mahasiswa.nim=judul.nim")->result();
    foreach ($data as $data) {
      $pembimbing1 = $data->pembimbing1;
      $pembimbing2 = $data->pembimbing2;
      $penguji1 = $data->penguji1;
      $penguji2 = $data->penguji2;

      if ($pembimbing1==$sessionnama){
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.pembimbing1='$sessionnama'
          AND mahasiswa.alumni='0'")->result();
      } elseif ($pembimbing2==$sessionnama) {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.pembimbing2='$sessionnama'
          AND mahasiswa.alumni='0'")->result();
      } else {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.pembimbing2='$sessionnama'
          AND mahasiswa.alumni='0'")->result();
      }
    }
  }

  function bimbinganalumni($sessionnama){
    $data = $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul ON mahasiswa.nim=judul.nim")->result();
    foreach ($data as $data) {
      $pembimbing1 = $data->pembimbing1;
      $pembimbing2 = $data->pembimbing2;

      if ($pembimbing1==$sessionnama){
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.pembimbing1='$sessionnama'
          AND mahasiswa.alumni='1'")->result();
      } elseif ($pembimbing2==$sessionnama) {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.pembimbing2='$sessionnama'
          AND mahasiswa.alumni='1'")->result();
      } else {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.pembimbing2='$sessionnama'
          AND mahasiswa.alumni='1'")->result();
      }
    }
  }

  function pengujiaktif($sessionnama){
    $data = $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul ON mahasiswa.nim=judul.nim")->result();
    foreach ($data as $data) {
      $penguji1 = $data->penguji1;
      $penguji2 = $data->penguji2;

      if ($penguji1==$sessionnama){
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.penguji1='$sessionnama'
          AND mahasiswa.alumni='0'")->result();
      } elseif ($penguji2==$sessionnama) {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.penguji2='$sessionnama'
          AND mahasiswa.alumni='0'")->result();
      } else {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.penguji2='$sessionnama'
          AND mahasiswa.alumni='0'")->result();
      }
    }
  }

  function pengujialumni($sessionnama){
    $data = $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul ON mahasiswa.nim=judul.nim")->result();
    foreach ($data as $data) {
      $penguji1 = $data->penguji1;
      $penguji2 = $data->penguji2;

      if ($penguji1==$sessionnama){
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.penguji1='$sessionnama'
          AND mahasiswa.alumni='1'")->result();
      } elseif ($penguji2==$sessionnama) {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.penguji2='$sessionnama'
          AND mahasiswa.alumni='1'")->result();
      } else {
        return $this->db->query("SELECT * FROM mahasiswa LEFT JOIN judul
          ON mahasiswa.nim=judul.nim WHERE judul.penguji2='$sessionnama'
          AND mahasiswa.alumni='1'")->result();
      }
    }
  }

  function upcoming($sessionnama){

      $data = $this->db->query("SELECT * FROM judul LEFT JOIN seminar ON judul.nim=seminar.seminar_nim")->result();
      foreach ($data as $data) {
        $pembimbing1 = $data->pembimbing1;
        $pembimbing2 = $data->pembimbing2;
        $penguji1 = $data->penguji1;
        $penguji2 = $data->penguji2;
        $pembimbing1_status = $data->pembimbing1_status;
        $pembimbing2_status = $data->pembimbing2_status;
        $penguji1_status = $data->penguji1_status;
        $penguji2_status = $data->penguji2_status;

        if ($pembimbing1==$sessionnama AND $pembimbing1_status==0){
          return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
           LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
            LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
            WHERE judul.pembimbing1='$sessionnama' AND seminar.pembimbing1_status='0'")->result();
        } elseif ($pembimbing2==$sessionnama AND $pembimbing2_status==0) {
          return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
           LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
            LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
            WHERE judul.pembimbing2='$sessionnama' AND seminar.pembimbing2_status='0'")->result();
        } elseif ($penguji1==$sessionnama AND $penguji1_status==0) {
          return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
           LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
            LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
            WHERE judul.penguji1='$sessionnama' AND seminar.penguji1_status='0'")->result();
        } elseif ($penguji2==$sessionnama AND $penguji2_status==0) {
          return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
          LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
           LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
           WHERE judul.penguji2='$sessionnama' AND seminar.penguji2_status='0'")->result();
        } else {
          return $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
           LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
            LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
            WHERE (seminar.pembimbing1_status='0' AND seminar.pembimbing2_status='0'
            AND seminar.penguji1_status='0' AND seminar.penguji2_status='0')
            AND (judul.pembimbing1='$sessionnama' OR judul.pembimbing2='$sessionnama'
            OR judul.penguji1='$sessionnama' OR judul.penguji2='$sessionnama')")->result();
        }
      }
  }

  function confirmed($sessionnama){
    $data = $this->db->query("SELECT * FROM judul LEFT JOIN seminar ON judul.nim=seminar.seminar_nim")->result();
    foreach ($data as $data) {
      $pembimbing1 = $data->pembimbing1;
      $pembimbing2 = $data->pembimbing2;
      $penguji1 = $data->penguji1;
      $penguji2 = $data->penguji2;
      $pembimbing1_status = $data->pembimbing1_status;
      $pembimbing2_status = $data->pembimbing2_status;
      $penguji1_status = $data->penguji1_status;
      $penguji2_status = $data->penguji2_status;

      if ($pembimbing1==$sessionnama AND $pembimbing1_status==1){
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE judul.pembimbing1='$sessionnama' AND seminar.pembimbing1_status='1'")->result();
      } elseif ($pembimbing2==$sessionnama AND $pembimbing2_status==1) {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE judul.pembimbing2='$sessionnama' AND seminar.pembimbing2_status='1'")->result();
      } elseif ($penguji1==$sessionnama AND $penguji1_status==1) {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE judul.penguji1='$sessionnama' AND seminar.penguji1_status='1'")->result();
      } elseif ($penguji2==$sessionnama AND $penguji2_status==1) {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
        LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
         LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
         WHERE judul.penguji2='$sessionnama' AND seminar.penguji2_status='1'")->result();
      } else {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
        LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
         LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
         WHERE judul.penguji2='$sessionnama' AND seminar.penguji2_status='1'")->result();
      }
    }
  }

  function done($sessionnama){
    $data = $this->db->query("SELECT * FROM judul LEFT JOIN seminar ON judul.nim=seminar.seminar_nim")->result();
    foreach ($data as $data) {
      $pembimbing1 = $data->pembimbing1;
      $pembimbing2 = $data->pembimbing2;
      $penguji1 = $data->penguji1;
      $penguji2 = $data->penguji2;
      $seminar_done = $data->seminar_done;

      if ($pembimbing1==$sessionnama AND $seminar_done==1){
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE judul.pembimbing1='$sessionnama' AND seminar.seminar_done='1'")->result();
      } elseif ($pembimbing2==$sessionnama AND $seminar_done==1) {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE judul.pembimbing2='$sessionnama' AND seminar.seminar_done='1'")->result();
      } elseif ($penguji1==$sessionnama AND $seminar_done==1) {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE judul.penguji1='$sessionnama' AND seminar.seminar_done='1'")->result();
      } elseif ($penguji2==$sessionnama AND $seminar_done==1) {
        return  $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
        LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
         LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
         WHERE judul.penguji2='$sessionnama' AND seminar.seminar_done='1'")->result();
      } else {
        return $this->db->query("SELECT * FROM ((mahasiswa LEFT JOIN judul ON mahasiswa.nim = judul.nim)
         LEFT JOIN seminar on mahasiswa.nim=seminar.seminar_nim)
          LEFT JOIN waktu_ujian on seminar.seminar_waktu=waktu_ujian.waktu_ujian_id
          WHERE (seminar.seminar_done='1')
          AND (judul.pembimbing1='$sessionnama' OR judul.pembimbing2='$sessionnama'
          OR judul.penguji1='$sessionnama' OR judul.penguji2='$sessionnama')")->result();
      }
    }
  }
}
