<div class="content-wrapper">
  <style type="text/css">
      th{
          text-align: center;
      }
      td{
          text-align: center;
      }
  </style>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div>
              <!-- <br> -->
              <h3 class="box-title">Daftar Judul Seminar</h3>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-default1">
                  <i class="fa fa-plus-square"></i> Jadwal Seminar
                </a>&nbsp;
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">Jenjang Strata
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Jenjang S1</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                    <li><a href="#">Jenjang S3</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- Date and time range -->
              </div>
            </div>
            <br>
            <div class="media-scroll">
              <table id="example1" class="table table-bordered table-striped" style="width:100%;">
                <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Judul Penelitian</th>
                    <th>Dosen Menyetujui</th>
                    <th>Tgl Ujian</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datatampilseminar as $datatampilseminar) { ?>
                  <tr>
                    <td><?=$datatampilseminar->nim;?></td>
                    <td><?=$datatampilseminar->nama;?></td>
                    <td><?=$datatampilseminar->judul;?></td>
                    <td>
                      <?php
                        $count = 0;
                        $rejected = false;
                        $status = array($datatampilseminar->seminar_pembimbing1_status,  $datatampilseminar->seminar_pembimbing2_status,
                        $datatampilseminar->seminar_penguji1_status, $datatampilseminar->seminar_penguji2_status);
                        foreach ($status as $value) {
                          if ($value == 'diterima') {
                            $count = $count + 1;
                          } elseif ($value == 'ditolak') {
                            $count = $count + 1;
                            $rejected = true;
                          }
                        };

                        if ($count == 1) {
                          $progresswidth = '25%';
                        } else if ($count == 2) {
                          $progresswidth = '50%';
                        } else if ($count == 3) {
                          $progresswidth = '75%';
                        } else if ($count >= 4) {
                          $progresswidth = '100%';
                        } else {
                          $progresswidth = '2%';
                        };

                        if ($rejected) {
                          $progressbar = 'danger';
                        } else {
                          if ($count < 4) {
                            $progressbar = 'warning';
                          } else {
                            $progressbar = 'success';
                          }
                        }
                      ?>
                      <div class="progress" style="border: solid #000 1px;">
                        <div class="progress-bar progress-bar-<?=$progressbar;?> progress-bar-striped" role="progressbar" aria-valuenow="<?=$count;?>" aria-valuemin="0" aria-valuemax="4" style="width: <?=$progresswidth;?>; color: black;">
                          <span class="sr-only"></span>
                        </div>
                      </div>
                    </td>
                    <td><?=$datatampilseminar->seminar_tanggal;?></td>
                    <td><?=$datatampilseminar->seminar_status;?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" id="seminar_detail" data-id="<?=$datatampilseminar->seminar_id;?>"><i class="fa fa-fw  fa-ellipsis-h"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-seminar-hapus" id="seminar_hapus" data-id="<?=$datatampilseminar->seminar_id;?>"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-default1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Jadwal Ujian</h4>
                </div>
                <form id="tambah_seminar_hasil" role="form" action="<?php echo base_url().'kps/tambah_seminar_hasil';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIM</label>
                      <select class="form-control select2" name="ujian_hasil_nim" id="ujian_hasil_nim" style="width: 100%;" required>
                        <option selected value="" disabled>NIM</option>
                        <?php foreach ($mahasiswa as $mahasiswa) { ?>
                        <option><?=$mahasiswa->nim; ?></option>
                        <?php } ?>
                      </select>
                      <h6 id="ujian_hasil_nim_tidak_ada" class="help-block text-red"></h6>
                    </div>
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="ujian_hasil_nama" id="ujian_hasil_nama" placeholder="Nama Mahasiswa" readonly required>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing I</label>
                      <input type="text" class="form-control" name="ujian_hasil_pembimbing1" id="ujian_hasil_pembimbing1" placeholder="Pembimbing I" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_pembimbing1" id="ujian_hasil_notif_pembimbing1" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing II</label>
                      <input type="text" class="form-control" name="ujian_hasil_pembimbing2" id="ujian_hasil_pembimbing2" placeholder="Pembimbing II" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_pembimbing2" id="ujian_hasil_notif_pembimbing2" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Penguji I</label>
                      <input type="text" class="form-control" name="ujian_hasil_penguji1" id="ujian_hasil_penguji1" placeholder="Penguji I" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_penguji1" id="ujian_hasil_notif_penguji1" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Penguji II</label>
                      <input type="text" class="form-control" name="ujian_hasil_penguji2" id="ujian_hasil_penguji2" placeholder="Penguji II" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_hasil_notif_penguji2" id="ujian_hasil_notif_penguji2" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Ujian</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="ujian_hasil_tanggal" id="datepicker" placeholder="Tanggal Ujian">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tempat Ujian</label>
                      <select class="form-control select2" name="ujian_hasil_tempat" id="ujian_hasil_tempat" style="width: 100%;" required>
                        <option selected value="" disabled>Tempat Ujian</option>
                        <?php foreach ($datatempathasil as $datatempat) { ?>
                        <option value="<?=$datatempat->tempat_ujian_nama;?>"><?=$datatempat->tempat_ujian_nama;?> - <?=$datatempat->tempat_ujian_departemen?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Waktu Ujian</label>
                      <select class="form-control select2" name="ujian_hasil_waktu" id="ujian_hasil_waktu" style="width: 100%;" required>
                        <option selected value="" disabled>Waktu Ujian</option>
                      </select>
                    </div>
                    <div id="proteksi"><p id="proteksi_info"></p></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button id="proteksi_button" type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>

            <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript">
              $(document).ready(function(){
                $('#ujian_hasil_nim').select2();
                $("#ujian_hasil_nim").change(function(){
                  var nim = $(this).val();
                  $.ajax({
                    url: "<?=base_url();?>/Kps/get_nama",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                      nim: nim
                    },
                    success: function(data) {
                      if (data[0] != undefined) {
                        if (data[0].nim != null) {
                          if (data[0].request_hasil == 1) {
                            document.getElementById("ujian_hasil_nim_tidak_ada").innerText = "Mahasiswa tersebut telah memiliki jadwal. Hapus jadwal yang ada terlebih dulu untuk membuat jadwal baru.";
                            document.getElementById("ujian_hasil_nama").value = data[0].nama;
                            document.getElementById("ujian_hasil_pembimbing1").value = "";
                            document.getElementById("ujian_hasil_pembimbing2").value = "";
                            document.getElementById("ujian_hasil_penguji1").value = "";
                            document.getElementById("ujian_hasil_penguji2").value = "";
                            document.getElementById("proteksi_button").disabled = true;
                          } else if ($data[0].hasil == 1) {
                            document.getElementById("ujian_hasil_nim_tidak_ada").innerText = "Mahasiswa tersebut telah melaksanakan seminar hasil";
                            document.getElementById("ujian_hasil_nama").value = "";
                            document.getElementById("ujian_hasil_pembimbing1").value = "";
                            document.getElementById("ujian_hasil_pembimbing2").value = "";
                            document.getElementById("ujian_hasil_penguji1").value = "";
                            document.getElementById("ujian_hasil_penguji2").value = "";
                            document.getElementById("proteksi_button").disabled = true;
                          } else {
                            document.getElementById("ujian_hasil_nim_tidak_ada").innerText = "";
                            document.getElementById("ujian_hasil_nama").value = data[0].nama;
                            document.getElementById("ujian_hasil_pembimbing1").value = data[0].pembimbing1;
                            document.getElementById("ujian_hasil_pembimbing2").value = data[0].pembimbing2;
                            document.getElementById("ujian_hasil_penguji1").value = data[0].penguji1;
                            document.getElementById("ujian_hasil_penguji2").value = data[0].penguji2;
                            document.getElementById("proteksi_button").disabled = false;
                          }
                        } else {
                          document.getElementById("ujian_hasil_nim_tidak_ada").innerText = "Mahasiswa tersebut belum melaksanakan seminar proposal";
                          document.getElementById("ujian_hasil_nama").value = data[0].nama;
                          document.getElementById("ujian_hasil_pembimbing1").value = "";
                          document.getElementById("ujian_hasil_pembimbing2").value = "";
                          document.getElementById("ujian_hasil_penguji1").value = "";
                          document.getElementById("ujian_hasil_penguji2").value = "";
                          document.getElementById("proteksi_button").disabled = true;
                        }
                      } else {
                        document.getElementById("ujian_hasil_nim_tidak_ada").innerText = "Data mahasiswa tidak ditemukan!!!";
                        document.getElementById("ujian_hasil_nama").value = "";
                        document.getElementById("ujian_hasil_pembimbing1").value = "";
                        document.getElementById("ujian_hasil_pembimbing2").value = "";
                        document.getElementById("ujian_hasil_penguji1").value = "";
                        document.getElementById("ujian_hasil_penguji2").value = "";
                        document.getElementById("proteksi_button").disabled = true;
                      }
                    }
                  })
                });
                $('#ujian_hasil_waktu').select2();
                $('#ujian_hasil_tempat').select2();
              });
            </script>

            <script type="text/javascript">
              $(document).ready(function(){
                $("#datepicker").change(function(){
                  var tanggal = $(this).val();
                  var tempat = $("#ujian_hasil_tempat").val();
                  var waktu = $("#ujian_hasil_waktu").val();
                  var dosen1 = $("#ujian_hasil_pembimbing1").val();
                  var dosen2 = $("#ujian_hasil_pembimbing2").val();
                  var dosen3 = $("#ujian_hasil_penguji1").val();
                  var dosen4 = $("#ujian_hasil_penguji2").val();
                  // console.log(tanggal);
                  $.ajax({
                    url : "<?=base_url();?>/Kps/proteksi",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                      tanggal: tanggal
                    },
                    success: function(data) {
                      console.log('js tanggal');
                      for (i=0; i<=data.length; i++){
                        if (data[i] == null) {
                          document.getElementById("proteksi").style = "";
                          document.getElementById("proteksi_info").style = "";
                          document.getElementById("proteksi_info").innerText = "";
                          document.getElementById("proteksi_button").disabled = false;
                        } else {
                          if (data[i].seminar_tanggal == tanggal) {
                            if (data[i].seminar_waktu == waktu) {
                              if (data[i].seminar_pembimbing1_nama == dosen1 || data[i].seminar_pembimbing2_nama == dosen1
                                || data[i].seminar_penguji1_nama == dosen1 || data[i].seminar_penguji2_nama == dosen1
                                || data[i].seminar_pembimbing1_nama == dosen2 || data[i].seminar_pembimbing2_nama == dosen2
                                || data[i].seminar_penguji1_nama == dosen2 || data[i].seminar_penguji2_nama == dosen2
                                || data[i].seminar_pembimbing1_nama == dosen3 || data[i].seminar_pembimbing2_nama == dosen3
                                || data[i].seminar_penguji1_nama == dosen3 || data[i].seminar_penguji2_nama == dosen3
                                || data[i].seminar_pembimbing1_nama == dosen4 || data[i].seminar_pembimbing2_nama == dosen4
                                || data[i].seminar_penguji1_nama == dosen4 || data[i].seminar_penguji2_nama == dosen4) {
                                  console.log("dosen dijalankan");
                                document.getElementById("proteksi").style = "background-color:#dd4b39; width:100%; height: 40px;";
                                document.getElementById("proteksi_info").style = "color:white;";
                                document.getElementById("proteksi_info").innerText = "terdapat dosen yang telah memiliki jadwal seminar di waktu yang sama";
                                document.getElementById("proteksi_button").disabled = true;
                                break;
                              } else if (data[i].seminar_tempat == tempat) {
                                console.log("tempat dijalankan");
                                document.getElementById("proteksi").style = "background-color:#dd4b39; width:100%; height: 40px;";
                                document.getElementById("proteksi_info").style = "color:white;";
                                document.getElementById("proteksi_info").innerText = "Tempat tidak bisa digunakan";
                                document.getElementById("proteksi_button").disabled = true;
                                break;
                              } else {
                                console.log("tempat else dijalankan");
                                document.getElementById("proteksi").style = "";
                                document.getElementById("proteksi_info").style = "";
                                document.getElementById("proteksi_info").innerText = "";
                                document.getElementById("proteksi_button").disabled = false;
                              }
                            } else {
                              console.log("else waktu dijalankan");
                              document.getElementById("proteksi").style = "";
                              document.getElementById("proteksi_info").style = "";
                              document.getElementById("proteksi_info").innerText = "";
                              document.getElementById("proteksi_button").disabled = false;
                            }
                          } else {
                            console.log("else tanggal dijalankan");
                            document.getElementById("proteksi").style = "";
                            document.getElementById("proteksi_info").style = "";
                            document.getElementById("proteksi_info").innerText = "";
                            document.getElementById("proteksi_button").disabled = false;
                          }
                        }
                      }
                    }
                  })
                })
              })
            </script>

            <script type="text/javascript">
              $(document).ready(function(){
                $("#ujian_hasil_tempat").change(function(){
                  var id = $(this).val();
                  $.ajax({
                    url : "<?=base_url();?>/Kps/get_waktu_hasil",
                    method: "POST",
                    dataType: "JSON",
                    async: false,
                    data: {
                      id: id
                    },
                    success: function(data) {
                      console.log(id);
                      var html = '';
                      html += '<option selected value="" disabled>--Pilih Waktu Ujian--</option>';
                      var i;
                      for(i=0; i<data.length; i++){
                        html += '<option value="'+data[i].waktu_ujian_id+'">'+data[i].waktu_mulai+' - '+data[i].waktu_selesai+'</option>';
                      }
                      $('#ujian_hasil_waktu').html(html);
                      document.getElementById("proteksi").style = "";
                      document.getElementById("proteksi_info").style = "";
                      document.getElementById("proteksi_info").innerText = "";
                      document.getElementById("proteksi_button").disabled = false;
                    }
                  })
                })
              })
            </script>

            <script type="text/javascript">
              $(document).ready(function(){
                $("#ujian_hasil_waktu").change(function(){
                  var waktu = $(this).val();
                  var tempat = $("#ujian_hasil_tempat").val();
                  var tanggal = $("#datepicker").val();
                  var dosen1 = $("#ujian_hasil_pembimbing1").val();
                  var dosen2 = $("#ujian_hasil_pembimbing2").val();
                  var dosen3 = $("#ujian_hasil_penguji1").val();
                  var dosen4 = $("#ujian_hasil_penguji2").val();
                  // console.log(tanggal);
                  $.ajax({
                    url : "<?=base_url();?>/Kps/proteksi",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                      tanggal: tanggal
                    },
                    success: function(data) {
                      console.log('js waktu');
                      for (i=0; i<data.length; i++){
                        if (data[i].seminar_tanggal == tanggal) {
                          if (data[i].seminar_waktu == waktu) {
                            if (data[i].seminar_pembimbing1_nama == dosen1 || data[i].seminar_pembimbing2_nama == dosen1
                              || data[i].seminar_penguji1_nama == dosen1 || data[i].seminar_penguji2_nama == dosen1
                              || data[i].seminar_pembimbing1_nama == dosen2 || data[i].seminar_pembimbing2_nama == dosen2
                              || data[i].seminar_penguji1_nama == dosen2 || data[i].seminar_penguji2_nama == dosen2
                              || data[i].seminar_pembimbing1_nama == dosen3 || data[i].seminar_pembimbing2_nama == dosen3
                              || data[i].seminar_penguji1_nama == dosen3 || data[i].seminar_penguji2_nama == dosen3
                              || data[i].seminar_pembimbing1_nama == dosen4 || data[i].seminar_pembimbing2_nama == dosen4
                              || data[i].seminar_penguji1_nama == dosen4 || data[i].seminar_penguji2_nama == dosen4) {
                              document.getElementById("proteksi").style = "background-color:#dd4b39; width:100%; height: 40px;";
                              document.getElementById("proteksi_info").style = "color:white;";
                              document.getElementById("proteksi_info").innerText = "terdapat dosen yang telah memiliki jadwal seminar di waktu yang sama";
                              document.getElementById("proteksi_button").disabled = true;
                              break;
                            } else if (data[i].seminar_tempat == tempat) {
                              document.getElementById("proteksi").style = "background-color:#dd4b39; width:100%; height: 40px;";
                              document.getElementById("proteksi_info").style = "color:white;";
                              document.getElementById("proteksi_info").innerText = "Tempat tidak bisa digunakan";
                              document.getElementById("proteksi_button").disabled = true;
                              break;
                            } else {
                              document.getElementById("proteksi").style = "";
                              document.getElementById("proteksi_info").style = "";
                              document.getElementById("proteksi_info").innerText = "";
                              document.getElementById("proteksi_button").disabled = false;
                            }
                          } else {
                            document.getElementById("proteksi").style = "";
                            document.getElementById("proteksi_info").style = "";
                            document.getElementById("proteksi_info").innerText = "";
                            document.getElementById("proteksi_button").disabled = false;
                          }
                        } else {
                          document.getElementById("proteksi").style = "";
                          document.getElementById("proteksi_info").style = "";
                          document.getElementById("proteksi_info").innerText = "";
                          document.getElementById("proteksi_button").disabled = false;
                        }
                      }
                    }
                  })
                })
              })
            </script>

            <script>
              $('#tambah_seminar_hasil').submit(function() {
                var nim_mahasiswa = $('#ujian_hasil_nim :selected').text();
                var nama_mahasiswa = $("#ujian_hasil_nama").val();
                var ujian_tanggal = $("[name=ujian_hasil_tanggal]").val();
                var ujian_waktu = $('#ujian_hasil_waktu :selected').text();
                var ujian_tempat = $('#ujian_hasil_tempat :selected').text();
                var notif_pembimbing1 = document.getElementById("ujian_hasil_notif_pembimbing1").checked;
                var notif_pembimbing2 = document.getElementById("ujian_hasil_notif_pembimbing2").checked;
                var notif_penguji1 = document.getElementById("ujian_hasil_notif_penguji1").checked;
                var notif_penguji2 = document.getElementById("ujian_hasil_notif_penguji2").checked;
                var pembimbing1 = $("#ujian_hasil_pembimbing1").val();
                var pembimbing2 = $("#ujian_hasil_pembimbing2").val();
                var penguji1 = $("#ujian_hasil_penguji1").val();
                var penguji2 = $("#ujian_hasil_penguji2").val();
                if (notif_pembimbing1 == true) {
                  fetch('<?=base_url()?>push_notification.php', {
                    method: 'POST',
                    body: JSON.stringify({
                      nim_mahasiswa : nim_mahasiswa,
                      nama_mahasiswa : nama_mahasiswa,
                      ujian_tanggal : ujian_tanggal,
                      ujian_waktu : ujian_waktu,
                      ujian_tempat : ujian_tempat,
                      nama_dosen : pembimbing1,
                      jenis : 'konfirmasi_seminar_hasil',
                      url : '<?=base_url()?>dosen/penugasanIn'
                    }),
                  });
                };
                if (notif_pembimbing2 == true) {
                  fetch('<?=base_url()?>push_notification.php', {
                    method: 'POST',
                    body: JSON.stringify({
                      nim_mahasiswa : nim_mahasiswa,
                      nama_mahasiswa : nama_mahasiswa,
                      ujian_tanggal : ujian_tanggal,
                      ujian_waktu : ujian_waktu,
                      ujian_tempat : ujian_tempat,
                      nama_dosen : pembimbing2,
                      jenis : 'konfirmasi_seminar_hasil',
                      url : '<?=base_url()?>dosen/penugasanIn'
                    }),
                  });
                };
                if (notif_penguji1 == true) {
                  fetch('<?=base_url()?>push_notification.php', {
                    method: 'POST',
                    body: JSON.stringify({
                      nim_mahasiswa : nim_mahasiswa,
                      nama_mahasiswa : nama_mahasiswa,
                      ujian_tanggal : ujian_tanggal,
                      ujian_waktu : ujian_waktu,
                      ujian_tempat : ujian_tempat,
                      nama_dosen : penguji1,
                      jenis : 'konfirmasi_seminar_hasil',
                      url : '<?=base_url()?>dosen/penugasanIn'
                    }),
                  });
                };
                if (notif_penguji2 == true) {
                  fetch('<?=base_url()?>push_notification.php', {
                    method: 'POST',
                    body: JSON.stringify({
                      nim_mahasiswa : nim_mahasiswa,
                      nama_mahasiswa : nama_mahasiswa,
                      ujian_tanggal : ujian_tanggal,
                      ujian_waktu : ujian_waktu,
                      ujian_tempat : ujian_tempat,
                      nama_dosen : penguji2,
                      jenis : 'konfirmasi_seminar_hasil',
                      url : '<?=base_url()?>dosen/penugasanIn'
                    }),
                  });
                };
              })
            </script>

            <!-- /.modal-dialog -->
          </div>
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Detail Seminar Hasil</h4>
                </div>
                <div class="modal-body">

                  <!-- Profile Image -->
                  <div class="box box-success">
                    <div class="box-body box-profile">
                      <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/')?>dist/img/avatar5.png" alt="User profile picture">

                      <h3 class="profile-username text-center" id="seminar_detail_nama"></h3>

                      <p class="text-muted text-center" id="seminar_detail_nim"></p>

                      <div class="box">
                        <div class="box-body">
                          <div class="col-md-6">
                            <p id="seminar_detail_departemen"></p>
                            <p id="seminar_detail_strata"></p>
                            <p id="seminar_detail_judul"></p>
                            <p id="seminar_detail_tanggal"></p>
                          </div>
                          <div class="col-md-6">
                            <p><font id="seminar_detail_pembimbing1_nama"></font>
                              <span class="pull-right-container">
                                <small id="seminar_detail_pembimbing1_status" class="label pull-right bg-green">Confirmed</small>
                              </span>
                            </p>
                            <p><font id="seminar_detail_pembimbing2_nama"></font>
                              <span class="pull-right-container">
                                <small id="seminar_detail_pembimbing2_status" class="label pull-right bg-green">Confirmed</small>
                              </span>
                            </p>
                            <p><font id="seminar_detail_penguji1_nama"></font>
                              <span class="pull-right-container">
                                <small id="seminar_detail_penguji1_status" class="label pull-right bg-yellow">Waiting</small>
                              </span>
                            </p>
                            <p><font id="seminar_detail_penguji2_nama"></font>
                              <span class="pull-right-container">
                                <small id="seminar_detail_penguji2_status" class="label pull-right bg-red">Rejected</small>
                              </span>
                            </p>
                          </div>
                        </div></div>

                        <p> Status
                          <span class="pull-right-container">
                            <small id="seminar_detail_status" class="label bg-blue"></small>
                          </span>
                        </p>

                      </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <!-- <button type="button" class="btn btn-primary">Tambahkan</button> -->
                </div>
              </div>
              <!-- /.modal-content -->
            </div>

            <script type="text/javascript">
              $(document).on("click", "#seminar_detail", function(){
                var id = $(this).attr('data-id')
                $.ajax({
                  url: "<?=base_url();?>/Kps/data_seminar",
                  method: "POST",
                  dataType: "JSON",
                  data: {
                    id: id
                  },
                  success: function(data){
                    document.getElementById("seminar_detail_nama").innerText = data[0].nama;
                    document.getElementById("seminar_detail_nim").innerText = data[0].nim;
                    document.getElementById("seminar_detail_departemen").innerText = 'Departemen ' + data[0].departemen;
                    document.getElementById("seminar_detail_strata").innerText = data[0].strata;
                    document.getElementById("seminar_detail_judul").innerText = data[0].judul;
                    document.getElementById("seminar_detail_tanggal").innerText = data[0].seminar_tanggal;
                    document.getElementById("seminar_detail_status").innerText = data[0].seminar_status;
                    document.getElementById("seminar_detail_pembimbing1_nama").innerText = data[0].seminar_pembimbing1_nama;
                    document.getElementById("seminar_detail_pembimbing2_nama").innerText = data[0].seminar_pembimbing2_nama;
                    document.getElementById("seminar_detail_penguji1_nama").innerText = data[0].seminar_penguji1_nama;
                    document.getElementById("seminar_detail_penguji2_nama").innerText = data[0].seminar_penguji2_nama;
                    if (data[0].seminar_pembimbing1_status == 'menunggu') {
                      document.getElementById("seminar_detail_pembimbing1_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_pembimbing1_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing1_status == 'diterima') {
                      document.getElementById("seminar_detail_pembimbing1_status").className = "label pull-right bg-green";
                      document.getElementById("seminar_detail_pembimbing1_status").innerText = "Diterima";
                    } else if (data[0].seminar_pembimbing1_status == 'ditolak') {
                      document.getElementById("seminar_detail_pembimbing1_status").className = "label pull-right bg-red";
                      document.getElementById("seminar_detail_pembimbing1_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("seminar_detail_pembimbing1_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_pembimbing1_status").innerText = "Menunggu";
                    }

                    if (data[0].seminar_pembimbing2_status == 'menunggu') {
                      document.getElementById("seminar_detail_pembimbing2_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_pembimbing2_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing2_status == 'diterima') {
                      document.getElementById("seminar_detail_pembimbing2_status").className = "label pull-right bg-green";
                      document.getElementById("seminar_detail_pembimbing2_status").innerText = "Diterima";
                    } else if (data[0].seminar_pembimbing2_status == 'ditolak') {
                      document.getElementById("seminar_detail_pembimbing2_status").className = "label pull-right bg-red";
                      document.getElementById("seminar_detail_pembimbing2_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("seminar_detail_pembimbing2_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_pembimbing2_status").innerText = "Menunggu";
                    }

                    if (data[0].seminar_penguji1_status == 'menunggu') {
                      document.getElementById("seminar_detail_penguji1_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_penguji1_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing1_status == 'diterima') {
                      document.getElementById("seminar_detail_penguji1_status").className = "label pull-right bg-green";
                      document.getElementById("seminar_detail_penguji1_status").innerText = "Diterima";
                    } else if (data[0].seminar_penguji1_status == 'ditolak') {
                      document.getElementById("seminar_detail_penguji1_status").className = "label pull-right bg-red";
                      document.getElementById("seminar_detail_penguji1_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("seminar_detail_penguji1_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_penguji1_status").innerText = "Menunggu";
                    }

                    if (data[0].seminar_penguji2_status == 'menunggu') {
                      document.getElementById("seminar_detail_penguji2_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_penguji2_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing2_status == 'diterima') {
                      document.getElementById("seminar_detail_penguji2_status").className = "label pull-right bg-green";
                      document.getElementById("seminar_detail_penguji2_status").innerText = "Diterima";
                    } else if (data[0].seminar_penguji2_status == 'ditolak') {
                      document.getElementById("seminar_detail_penguji2_status").className = "label pull-right bg-red";
                      document.getElementById("seminar_detail_penguji2_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("seminar_detail_penguji2_status").className = "label pull-right bg-yellow";
                      document.getElementById("seminar_detail_penguji2_status").innerText = "Menunggu";
                    }
                  }
                })
              })
            </script>

            <!-- /.modal-dialog -->
          </div>

          <div class="modal modal-danger fade" id="modal-seminar-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_seminar"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_seminar">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#seminar_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_seminar",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(data[0])
                  document.getElementById("ket_hapus_seminar").innerText='Anda akan menghapus data seminar yang diajukan oleh mahasiswa '+data[0].nama+' ?';
                  document.getElementById("button_hapus_seminar").href='<?=base_url();?>/Kps/hapus_seminar/'+data[0].seminar_id;
                }
              })
            })
          </script>

        </div>

          <!-- /.modal -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
