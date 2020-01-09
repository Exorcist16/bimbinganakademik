<div class="content-wrapper">
  <!-- Main content -->
  <style type="text/css">
    a button{
      margin-left: 10px !important;
    }
  </style>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div>
              <!-- <br> -->
              <h3 class="box-title">Jadwal Dikonfirmasi</h3>
              <div class="box-tools pull-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">Jenjang Strata
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Jenjang S1</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="box box-success">
              <div class="box-body">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="media-scroll">
                    <table id="example2" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nama Mahasiswa</th>
                          <th>Tanggal Ujian</th>
                          <th>Waktu Ujian</th>
                          <th style="width: 100px">Konfirmasi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataconfirmed as $dataconfirmed): ?>
                          <tr>
                            <td><b><?= $dataconfirmed->nama;?></b>
                              <br>
                              <span style="color: grey"><?= $dataconfirmed->nim;?></span>
                            </td>
                            <td><?= $dataconfirmed->seminar_tanggal;?></td>
                            <td><?= $dataconfirmed->waktu_mulai;?> - <?= $dataconfirmed->waktu_selesai;?> WITA</td>
                            <td>
                              <a href="javascript:void(0)" class="product-title">
                                <button type="button" id="conf_detail" class="btn btn-success" data-toggle="modal" data-target="#modal-default" data-id="<?=$dataconfirmed->nim;?>">
                                  <i class="fa fa-fw fa-check-square-o"></i>
                                </button>
                              </a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
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

                      <h3 class="profile-username text-center" id="conf_nama"></h3>

                      <p class="text-muted text-center" id="conf_nim"></p>

                      <div class="box">
                        <div class="box-body">
                          <div class="col-md-6">
                            <p id="conf_departemen"></p>
                            <p id="conf_strata"></p>
                            <p id="conf_judul"></p>
                            <p id="conf_tanggal"></p>
                          </div>
                          <div class="col-md-6">
                            <p> Dosen Pembimbing 1
                              <span class="pull-right-container">
                                <small id="conf_status_pembimbing1" class="label pull-right bg-yellow">Status</small>
                              </span>
                            </p>
                            <p> Dosen Pembimbing 2
                              <span class="pull-right-container">
                                <small id="conf_status_pembimbing2" class="label pull-right bg-yellow">Status</small>
                              </span>
                            </p>
                            <p> Dosen Penguji 1
                              <span class="pull-right-container">
                                <small id="conf_status_penguji1" class="label pull-right bg-yellow">Status</small>
                              </span>
                            </p>
                            <p> Dosen Penguji 2
                              <span class="pull-right-container">
                                <small id="conf_status_penguji2" class="label pull-right bg-yellow">Status</small>
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>
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
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#conf_detail", function(){
              var nim = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Dosen/get_data",
                method: "POST",
                dataType: "JSON",
                data: {
                  nim: nim
                },
                success: function(data){
                  document.getElementById("conf_nama").innerText = data[0].nama;
                  document.getElementById("conf_nim").innerText = data[0].nim;
                  document.getElementById("conf_departemen").innerText = 'Departemen ' + data[0].departemen;
                  document.getElementById("conf_strata").innerText = data[0].strata;
                  document.getElementById("conf_judul").innerText = data[0].judul;
                  document.getElementById("conf_tanggal").innerText = data[0].seminar_tanggal;
                  if (data[0].seminar_pembimbing1_status == 'menunggu') {
                    document.getElementById("conf_status_pembimbing1").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_pembimbing1").innerText = "Menunggu";
                  } else if (data[0].seminar_pembimbing1_status == 'diterima') {
                    document.getElementById("conf_status_pembimbing1").className = "label pull-right bg-green";
                    document.getElementById("conf_status_pembimbing1").innerText = "Diterima";
                  } else if (data[0].seminar_pembimbing1_status == 'ditolak') {
                    document.getElementById("conf_status_pembimbing1").className = "label pull-right bg-red";
                    document.getElementById("conf_status_pembimbing1").innerText = "Ditolak";
                  } else {
                    document.getElementById("conf_status_pembimbing1").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_pembimbing1").innerText = "Menunggu";
                  }

                  if (data[0].seminar_pembimbing2_status == 'menunggu') {
                    document.getElementById("conf_status_pembimbing2").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_pembimbing2").innerText = "Menunggu";
                  } else if (data[0].seminar_pembimbing2_status == 'diterima') {
                    document.getElementById("conf_status_pembimbing2").className = "label pull-right bg-green";
                    document.getElementById("conf_status_pembimbing2").innerText = "Diterima";
                  } else if (data[0].seminar_pembimbing2_status == 'ditolak') {
                    document.getElementById("conf_status_pembimbing2").className = "label pull-right bg-red";
                    document.getElementById("conf_status_pembimbing2").innerText = "Ditolak";
                  } else {
                    document.getElementById("conf_status_pembimbing2").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_pembimbing2").innerText = "Menunggu";
                  }

                  if (data[0].seminar_penguji1_status == 'menunggu') {
                    document.getElementById("conf_status_penguji1").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_penguji1").innerText = "Menunggu";
                  } else if (data[0].seminar_pembimbing1_status == 'diterima') {
                    document.getElementById("conf_status_penguji1").className = "label pull-right bg-green";
                    document.getElementById("conf_status_penguji1").innerText = "Diterima";
                  } else if (data[0].seminar_penguji1_status == 'ditolak') {
                    document.getElementById("conf_status_penguji1").className = "label pull-right bg-red";
                    document.getElementById("conf_status_penguji1").innerText = "Ditolak";
                  } else {
                    document.getElementById("conf_status_penguji1").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_penguji1").innerText = "Menunggu";
                  }

                  if (data[0].seminar_penguji2_status == 'menunggu') {
                    document.getElementById("conf_status_penguji2").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_penguji2").innerText = "Menunggu";
                  } else if (data[0].seminar_pembimbing2_status == 'diterima') {
                    document.getElementById("conf_status_penguji2").className = "label pull-right bg-green";
                    document.getElementById("conf_status_penguji2").innerText = "Diterima";
                  } else if (data[0].seminar_penguji2_status == 'ditolak') {
                    document.getElementById("conf_status_penguji2").className = "label pull-right bg-red";
                    document.getElementById("conf_status_penguji2").innerText = "Ditolak";
                  } else {
                    document.getElementById("conf_status_penguji2").className = "label pull-right bg-yellow";
                    document.getElementById("conf_status_penguji2").innerText = "Menunggu";
                  }
                }
              })
            })
          </script>

        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
