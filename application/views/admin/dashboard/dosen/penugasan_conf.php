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
                        <tr>
                          <td>
                            <b>
                              A. Muh. Fauzy
                            </b>
                            <br>
                            <span style="color: grey">
                              D42114516
                            </span>
                          </td>
                          <td>
                            11-12-2019
                          </td>
                          <td>
                            10:00
                          </td>
                          <td>
                            <a href="javascript:void(0)" class="product-title">
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                <i class="fa fa-fw fa-check-square-o"></i>
                              </button> 
                            </a> 
                          </td>
                        </tr>
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

                      <h3 class="profile-username text-center">Abdillah Satari Rahim</h3>

                      <p class="text-muted text-center">D42114516</p>
                     
                      <!-- <ul class="list-group list-group-bordered">
                          <li class="list-group-item">
                            <span class="col-md-6">
                              <b>Departemen Teknik Informatika</b>
                            </span>
                            <span class="col-md-6">
                                <b> Dosen Pembimbing 1
                                <span class="pull-right-container">
                                  <small class="label pull-right bg-green">Confirmed</small>
                                </span>
                              </b>
                            </span>
                          </li>
                      </ul> -->

                      <div class="box">
                        <div class="box-body">
                          <div class="col-md-6">
                            <p >Departemen Teknik Informatika</p>
                            <p >S1</p>
                            <p >Implementasi Progressive Web App (PWA) Menggunakan Framework Angular Dalam Membangun Sistem Monitoring Energy Listrik</p>
                            <p>17/10/2019</p>
                          </div>
                          <div class="col-md-6">
                            <p> Dosen Pembimbing 1
                              <span class="pull-right-container">
                                <small class="label pull-right bg-green">Confirmed</small>
                              </span>
                            </p>
                            <p> Dosen Pembimbing 2
                              <span class="pull-right-container">
                                <small class="label pull-right bg-green">Confirmed</small>
                              </span>
                            </p>
                            <p> Dosen Penguji 1
                              <span class="pull-right-container">
                                <small class="label pull-right bg-yellow">Waiting</small>
                              </span>
                            </p>
                            <p> Dosen Penguji 2
                              <span class="pull-right-container">
                                <small class="label pull-right bg-red">Rejected</small>
                              </span>
                            </p>
                          </div>
                        </div>
                      </div>

                      <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
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
            <!-- /.modal-dialog -->
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