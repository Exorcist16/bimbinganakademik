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
              <h3 class="box-title">Jadwal Selesai</h3>
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
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($datadone as $datadone) { ?>
                        <tr>
                          <td><b><?=$datadone->nama;?></b>
                            <br>
                            <span style="color: grey"><?=$datadone->nim;?></span>
                          </td>
                          <td><?=$datadone->seminar_tanggal;?></td>
                          <td><?=$datadone->waktu_mulai;?> - <?=$datadone->waktu_selesai;?></td>
                          <td><?=$datadone->seminar_jenis;?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>

          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Detail Mahasiswa</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">

                      <!-- Profile Image -->
                      <div class="box box-primary">
                        <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/')?>dist/img/user4-128x128.jpg" alt="User profile picture">

                          <h3 class="profile-username text-center">Abdillah Satari Rahim</h3>

                          <p class="text-muted text-center">D42114516</p>

                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b>Departemen Teknik Informatika</b>
                            </li>
                            <li class="list-group-item">
                              <b>Strata 1</b>
                            </li>
                            <li class="list-group-item">
                              <b>2014</b>
                            </li>
                          </ul>

                          <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->

                      <!-- About Me Box -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Info!</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <strong><i class="fa fa-book margin-r-5"></i>Judul Penelitian</strong>

                          <p class="text-muted">
                            Implementasi Teknologi Progressive Web Application Menggunakan Framework Angular Pada Sistem Monitoring Energi Listrik
                          </p>

                          <hr>

                          <strong><i class="fa fa-group margin-r-5"></i>Pembimbing</strong>

                          <p class="text-muted">
                          Dr. Amil Ahmad Ilham, S.T., M.IT. <br>
                          Dr. Eng. Zulkifli Tahir, S.T., M.Sc.
                          </p>

                          <hr>

                          <strong><i class="fa fa-group margin-r-5"></i>Penguji</strong>

                          <p class="text-muted">
                          Prof. Dr. Ir. Andani, S.T., M.T.<br>
                          Adnan, S.T., M.T., Ph.D<br>
                          Dr. Wardi, S.T., M.Eng.
                          </p>

                          <!-- <hr> -->
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
