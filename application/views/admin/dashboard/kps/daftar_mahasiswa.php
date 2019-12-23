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
              <h3 class="box-title">List Mahasiswa</h3>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-mahasiswa-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Mahasiswa
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
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nim</th>
                  <th>Strata</th>
                  <th>Angkatan</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mahasiswadata as $mahasiswa) { ?> <!--22-12-2019 -->
                <tr>
                  <td><?= $mahasiswa->nama; ?></td>
                  <td><?= $mahasiswa->nim; ?></td>
                  <td><?= $mahasiswa->strata; ?></td>
                  <td><?= $mahasiswa->angkatan; ?></td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mahasiswa-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->

          <div class="modal fade" id="modal-mahasiswa-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Mahasiswa</h4>
                </div>
                <form role="form" action="<?php echo base_url().'kps/tambah_mahasiswa';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="mahasiswa_nama" id="mahasiswa_nama" placeholder="Nama Mahasiswa"  required>
                    </div>
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="mahasiswa_nim" id="mahasiswa_nim" placeholder="NIM"  required>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="mahasiswa_departemen" id="mahasiswa_departemen" style="width: 100%;" required>
                        <?php foreach ($departemendata as $departemen) { ?>    <!-- 22-12-2019 -->
                        <option value="<?=$departemen->departemen;?>"><?=$departemen->departemen;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form_group">
                      <label>Strata</label>
                      <select class="form-control select2" name="mahasiswa_strata" id="mahasiswa_strata" style="width: 100%;" required>
                        <option selected value="" disabled>--Strata--</option>
                        <option value="S1">Strata 1</option>
                        <option value="S2">Strata 2</option>
                        <option value="S3">Strata 3</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Angkatan</label>
                      <input type="number" class="form-control" name="mahasiswa_angkatan" id="mahasiswa_angkatan" placeholder="Angkatan"  required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="mahasiswa_password" id="mahasiswa_password" placeholder="Password"  required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <div class="modal fade" id="modal-mahasiswa-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Mahasiswa</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="mahasiswa_nama_edit" id="mahasiswa_nama_edit" placeholder="Nama Mahasiswa"  required>
                    </div>
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="mahasiswa_nim_edit" id="mahasiswa_nim_edit" placeholder="NIM"  required>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="mahasiswa_departemen_edit" id="mahasiswa_departemen_edit" style="width: 100%;" required>
                        <option selected value="" disabled>Departemen</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        <option value="Teknik Geologi">Teknik Geologi</option>
                        <option value="Teknik Industri">Teknik Industri</option>
                        <option value="Teknik Kelautan">Teknik Kelautan</option>
                        <option value="Teknik Perkapalan">Teknik Sistem Perkapalan</option>
                        <option value="Teknik Perencanaan Wilayah Kota">Teknik Perencanaan Wilayah Kota</option>
                        <option value="Teknik Pertambangan">Teknik Pertambangan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Angkatan</label>
                      <input type="number" class="form-control" name="mahasiswa_angkatan_edit" id="mahasiswa_angkatan_edit" placeholder="Angkatan"  required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="mahasiswa_password_edit" id="mahasiswa_password_edit" placeholder="Password"  required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                  </div>
                </form>
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
