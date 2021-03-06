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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Judul Penelitian</th>
                    <th>Dosen Menyetujui</th>
                    <th>Tgl Ujian</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datatampiltutup as $datatampiltutup) { ?>
                  <tr>
                    <td><?=$datatampiltutup->nim;?></td>
                    <td><?=$datatampiltutup->nama;?></td>
                    <td><?=$datatampiltutup->judul;?></td>
                    <td>
                    <?php
                        $count = 0;
                        $rejected = false;
                        $status = array($datatampiltutup->seminar_pembimbing1_status,  $datatampiltutup->seminar_pembimbing2_status,
                        $datatampiltutup->seminar_penguji1_status, $datatampiltutup->seminar_penguji2_status);
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
                    <td><?=$datatampiltutup->seminar_tanggal;?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" id="tutup_detail" data-id="<?=$datatampiltutup->seminar_id;?>"><i class="fa fa-fw  fa-ellipsis-h"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tutup-hapus" id="tutup_hapus" data-id="<?=$datatampiltutup->seminar_id;?>"><i class="fa fa-fw fa-remove"></i></button>
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
                <form id="tambah_seminar_tutup" role="form" action="<?php echo base_url().'kps/tambah_seminar_tutup';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIM</label>
                      <select class="form-control select2" name="ujian_tutup_nim" id="ujian_tutup_nim" style="width: 100%;" required>
                        <option selected value="" disabled>NIM</option>
                        <?php foreach ($mahasiswa as $mahasiswa) { ?>
                        <option><?=$mahasiswa->nim; ?></option>
                        <?php } ?>
                      </select>
                      <h6 id="ujian_tutup_nim_tidak_ada" class="help-block text-red"></h6>
                    </div>
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="ujian_tutup_nama" id="ujian_tutup_nama" placeholder="Nama Mahasiswa" readonly required>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing I</label>
                      <input type="text" class="form-control" name="ujian_tutup_pembimbing1" id="ujian_tutup_pembimbing1" placeholder="Pembimbing I" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_tutup_notif_pembimbing1" id="ujian_tutup_notif_pembimbing1" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Pembimbing II</label>
                      <input type="text" class="form-control" name="ujian_tutup_pembimbing2" id="ujian_tutup_pembimbing2" placeholder="Pembimbing II" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_tutup_notif_pembimbing2" id="ujian_tutup_notif_pembimbing2" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Penguji I</label>
                      <input type="text" class="form-control" name="ujian_tutup_penguji1" id="ujian_tutup_penguji1" placeholder="Penguji I" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_tutup_notif_penguji1" id="ujian_tutup_notif_penguji1" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Penguji II</label>
                      <input type="text" class="form-control" name="ujian_tutup_penguji2" id="ujian_tutup_penguji2" placeholder="Penguji II" readonly required>
                      <div class="checkbox">
                       <label><input name="ujian_tutup_notif_penguji2" id="ujian_tutup_notif_penguji2" type="checkbox" checked>Kirimkan Notifikasi</label>
                      </div>
                    </div>

                    <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
                    <script type="text/javascript">
                      $(document).ready(function(){
                        $('#ujian_tutup_nim').select2();
                        $("#ujian_tutup_nim").change(function(){
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
                                  if (data[0].hasil == 1) {
                                    document.getElementById("ujian_tutup_nim_tidak_ada").innerText = "";
                                    document.getElementById("ujian_tutup_nama").value = data[0].nama;
                                    document.getElementById("ujian_tutup_pembimbing1").value = data[0].pembimbing1;
                                    document.getElementById("ujian_tutup_pembimbing2").value = data[0].pembimbing2;
                                    document.getElementById("ujian_tutup_penguji1").value = data[0].penguji1;
                                    document.getElementById("ujian_tutup_penguji2").value = data[0].penguji2;
                                  } else {
                                    document.getElementById("ujian_tutup_nim_tidak_ada").innerText = "Mahasiswa dengan NIM " + data[0].nim + " belum melaksanakan Seminar Hasil";
                                    document.getElementById("ujian_tutup_nama").value = "";
                                    document.getElementById("ujian_tutup_pembimbing1").value = "";
                                    document.getElementById("ujian_tutup_pembimbing2").value = "";
                                    document.getElementById("ujian_tutup_penguji1").value = "";
                                    document.getElementById("ujian_tutup_penguji2").value = "";
                                  }
                                } else {
                                  document.getElementById("ujian_tutup_nim_tidak_ada").innerText = "Mahasiswa belum melaksanakan seminar proposal";
                                  document.getElementById("ujian_tutup_nama").value = "";
                                  document.getElementById("ujian_tutup_pembimbing1").value = "";
                                  document.getElementById("ujian_tutup_pembimbing2").value = "";
                                  document.getElementById("ujian_tutup_penguji1").value = "";
                                  document.getElementById("ujian_tutup_penguji2").value = "";
                                }
                              } else {
                                document.getElementById("ujian_tutup_nim_tidak_ada").innerText = "Data Mahasiswa tidak ditemukan!!!";
                                document.getElementById("ujian_tutup_nama").value = "";
                                document.getElementById("ujian_tutup_pembimbing1").value = "";
                                document.getElementById("ujian_tutup_pembimbing2").value = "";
                                document.getElementById("ujian_tutup_penguji1").value = "";
                                document.getElementById("ujian_tutup_penguji2").value = "";
                              }
                            }
                          })
                        });
                        $('#ujian_tutup_waktu').select2()
                        $('#ujian_tutup_tempat').select2()
                      });
                    </script>

                    <div class="form-group">
                      <label>Tanggal Ujian</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" name="ujian_tutup_tanggal" id="datepicker" placeholder="Tanggal Ujian">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Waktu Ujian</label>
                      <select class="form-control select2" name="ujian_tutup_waktu" id="ujian_tutup_waktu" style="width: 100%;" required>
                        <option selected value="" disabled>Waktu Ujian</option>
                        <?php foreach ($datawaktututup as $datawaktu) { ?>
                          <option value="<?=$datawaktu->waktu_ujian_id;?>"><?=$datawaktu->waktu_mulai;?> - <?=$datawaktu->waktu_selesai;?> WITA</option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Tempat Ujian</label>
                      <select class="form-control select2" name="ujian_tutup_tempat" id="ujian_tutup_tempat" style="width: 100%;" required>
                        <option selected value="" disabled>Tempat Ujian</option>
                        <?php foreach ($datatempattutup as $datatempat) { ?>
                          <option value="<?=$datatempat->tempat_ujian_nama;?>"><?=$datatempat->tempat_ujian_nama;?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </form>

                <script>
                  $('#tambah_seminar_tutup').submit(function() {
                    var nim_mahasiswa = $('#ujian_tutup_nim :selected').text();
                    var nama_mahasiswa = $("#ujian_tutup_nama").val();
                    var ujian_tanggal = $("[name=ujian_tutup_tanggal]").val();
                    var ujian_waktu = $('#ujian_tutup_waktu :selected').text();
                    var ujian_tempat = $('#ujian_tutup_tempat :selected').text();
                    var notif_pembimbing1 = document.getElementById("ujian_tutup_notif_pembimbing1").checked;
                    var notif_pembimbing2 = document.getElementById("ujian_tutup_notif_pembimbing2").checked;
                    var notif_penguji1 = document.getElementById("ujian_tutup_notif_penguji1").checked;
                    var notif_penguji2 = document.getElementById("ujian_tutup_notif_penguji2").checked;
                    var pembimbing1 = $("#ujian_tutup_pembimbing1").val();
                    var pembimbing2 = $("#ujian_tutup_pembimbing2").val();
                    var penguji1 = $("#ujian_tutup_penguji1").val();
                    var penguji2 = $("#ujian_tutup_penguji2").val();
                    if (notif_pembimbing1 == true) {
                      $.ajax({
                        url: "<?=base_url();?>Auth/push_notification_seminar",
                        method: 'POST',
                        dataType: "JSON",
                        data: JSON.stringify({
                          nim_mahasiswa : nim_mahasiswa,
                          nama_mahasiswa : nama_mahasiswa,
                          ujian_tanggal : ujian_tanggal,
                          ujian_waktu : ujian_waktu,
                          ujian_tempat : ujian_tempat,
                          nama_dosen : pembimbing1,
                          jenis : 'konfirmasi_seminar_tutup',
                          url : '<?=base_url()?>dosen/penugasanIn'
                        })
                      })
                    };
                    if (notif_pembimbing2 == true) {
                      $.ajax({
                        url: "<?=base_url();?>Auth/push_notification_seminar",
                        method: 'POST',
                        dataType: "JSON",
                        data: JSON.stringify({
                          nim_mahasiswa : nim_mahasiswa,
                          nama_mahasiswa : nama_mahasiswa,
                          ujian_tanggal : ujian_tanggal,
                          ujian_waktu : ujian_waktu,
                          ujian_tempat : ujian_tempat,
                          nama_dosen : pembimbing2,
                          jenis : 'konfirmasi_seminar_tutup',
                          url : '<?=base_url()?>dosen/penugasanIn'
                        })
                      })
                    };
                    if (notif_penguji1 == true) {
                      $.ajax({
                        url: "<?=base_url();?>Auth/push_notification_seminar",
                        method: 'POST',
                        dataType: "JSON",
                        data: JSON.stringify({
                          nim_mahasiswa : nim_mahasiswa,
                          nama_mahasiswa : nama_mahasiswa,
                          ujian_tanggal : ujian_tanggal,
                          ujian_waktu : ujian_waktu,
                          ujian_tempat : ujian_tempat,
                          nama_dosen : penguji1,
                          jenis : 'konfirmasi_seminar_tutup',
                          url : '<?=base_url()?>dosen/penugasanIn'
                        })
                      })
                    };
                    if (notif_penguji2 == true) {
                      $.ajax({
                        url: "<?=base_url();?>Auth/push_notification_seminar",
                        method: 'POST',
                        dataType: "JSON",
                        data: JSON.stringify({
                          nim_mahasiswa : nim_mahasiswa,
                          nama_mahasiswa : nama_mahasiswa,
                          ujian_tanggal : ujian_tanggal,
                          ujian_waktu : ujian_waktu,
                          ujian_tempat : ujian_tempat,
                          nama_dosen : penguji2,
                          jenis : 'konfirmasi_seminar_tutup',
                          url : '<?=base_url()?>dosen/penugasanIn'
                        })
                      })
                    };
                  })
                </script>

              </div>
              <!-- /.modal-content -->
            </div>
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

                      <h3 class="profile-username text-center" id="tutup_detail_nama"></h3>

                      <p class="text-muted text-center" id="tutup_detail_nim"></p>

                      <div class="box">
                        <div class="box-body">
                          <div class="col-md-6">
                            <p id="tutup_detail_departemen"></p>
                            <p id="tutup_detail_strata"></p>
                            <p id="tutup_detail_judul"></p>
                            <p id="tutup_detail_tanggal"></p>
                          </div>
                          <div class="col-md-6">
                            <p> Dosen Pembimbing 1
                              <span class="pull-right-container">
                                <small id="tutup_detail_pembimbing1_status" class="label pull-right bg-green"></small>
                              </span>
                            </p>
                            <p> Dosen Pembimbing 2
                              <span class="pull-right-container">
                                <small id="tutup_detail_pembimbing2_status" class="label pull-right bg-green"></small>
                              </span>
                            </p>
                            <p> Dosen Penguji 1
                              <span class="pull-right-container">
                                <small id="tutup_detail_penguji1_status" class="label pull-right bg-yellow"></small>
                              </span>
                            </p>
                            <p> Dosen Penguji 2
                              <span class="pull-right-container">
                                <small id="tutup_detail_penguji2_status" class="label pull-right bg-red"></small>
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>

                      <p> Status Ujian Tutup
                        <span class="pull-right-container">
                          <small id="tutup_detail_status" class="label bg-blue"></small>
                        </span>
                      </p>

                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>

            <script type="text/javascript">
              $(document).on("click", "#tutup_detail", function(){
                var id = $(this).attr('data-id')
                $.ajax({
                  url     : "<?=base_url();?>/Kps/data_tutup",
                  method  : "POST",
                  dataType: "JSON",
                  data    : { id: id },
                  success : function(data){
                    document.getElementById("tutup_detail_nama").innerText = data[0].nama;
                    document.getElementById("tutup_detail_nim").innerText = data[0].nim;
                    document.getElementById("tutup_detail_departemen").innerText = 'Departemen ' + data[0].departemen;
                    document.getElementById("tutup_detail_strata").innerText = data[0].strata;
                    document.getElementById("tutup_detail_judul").innerText = data[0].judul;
                    document.getElementById("tutup_detail_tanggal").innerText = data[0].seminar_tanggal;
                    document.getElementById("tutup_detail_status").innerText = data[0].seminar_status;
                    console.log(data[0].seminar_pembimbing1_status);
                    if (data[0].seminar_pembimbing1_status == 'menunggu') {
                      document.getElementById("tutup_detail_pembimbing1_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_pembimbing1_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing1_status == 'diterima') {
                      document.getElementById("tutup_detail_pembimbing1_status").className = "label pull-right bg-green";
                      document.getElementById("tutup_detail_pembimbing1_status").innerText = "Diterima";
                    } else if (data[0].seminar_pembimbing1_status == 'ditolak') {
                      document.getElementById("tutup_detail_pembimbing1_status").className = "label pull-right bg-red";
                      document.getElementById("tutup_detail_pembimbing1_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("tutup_detail_pembimbing1_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_pembimbing1_status").innerText = "Menunggu";
                    }

                    if (data[0].seminar_pembimbing2_status == 'menunggu') {
                      document.getElementById("tutup_detail_pembimbing2_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_pembimbing2_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing2_status == 'diterima') {
                      document.getElementById("tutup_detail_pembimbing2_status").className = "label pull-right bg-green";
                      document.getElementById("tutup_detail_pembimbing2_status").innerText = "Diterima";
                    } else if (data[0].seminar_pembimbing2_status == 'ditolak') {
                      document.getElementById("tutup_detail_pembimbing2_status").className = "label pull-right bg-red";
                      document.getElementById("tutup_detail_pembimbing2_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("tutup_detail_pembimbing2_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_pembimbing2_status").innerText = "Menunggu";
                    }

                    if (data[0].seminar_penguji1_status == 'menunggu') {
                      document.getElementById("tutup_detail_penguji1_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_penguji1_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing1_status == 'diterima') {
                      document.getElementById("tutup_detail_penguji1_status").className = "label pull-right bg-green";
                      document.getElementById("tutup_detail_penguji1_status").innerText = "Diterima";
                    } else if (data[0].seminar_penguji1_status == 'ditolak') {
                      document.getElementById("tutup_detail_penguji1_status").className = "label pull-right bg-red";
                      document.getElementById("tutup_detail_penguji1_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("tutup_detail_penguji1_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_penguji1_status").innerText = "Menunggu";
                    }

                    if (data[0].seminar_penguji2_status == 'menunggu') {
                      document.getElementById("tutup_detail_penguji2_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_penguji2_status").innerText = "Menunggu";
                    } else if (data[0].seminar_pembimbing2_status == 'diterima') {
                      document.getElementById("tutup_detail_penguji2_status").className = "label pull-right bg-green";
                      document.getElementById("tutup_detail_penguji2_status").innerText = "Diterima";
                    } else if (data[0].seminar_penguji2_status == 'ditolak') {
                      document.getElementById("tutup_detail_penguji2_status").className = "label pull-right bg-red";
                      document.getElementById("tutup_detail_penguji2_status").innerText = "Ditolak";
                    } else {
                      document.getElementById("tutup_detail_penguji2_status").className = "label pull-right bg-yellow";
                      document.getElementById("tutup_detail_penguji2_status").innerText = "Menunggu";
                    }
                  }
                })
              })
            </script>

            <!-- /.modal-dialog -->
          </div>

          <div class="modal modal-danger fade" id="modal-tutup-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_tutup"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_tutup">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#tutup_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_tutup",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(data[0])
                  document.getElementById("ket_hapus_tutup").innerText='Anda akan menghapus data seminar yang diajukan oleh mahasiswa '+data[0].nama+' ?';
                  document.getElementById("button_hapus_tutup").href='<?=base_url();?>/Kps/hapus_tutup/'+data[0].seminar_id;
                }
              })
            })
          </script>

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
