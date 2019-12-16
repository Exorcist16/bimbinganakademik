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
              <h3 class="box-title">List Dosen</h3>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-dosen-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Dosen
                </a>&nbsp;
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
                  <th>Nip</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Abdllah Satari Rahim</td>
                  <td>D42114516</td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Abdllah Satari Rahim</td>
                  <td>D42114516</td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Abdllah Satari Rahim</td>
                  <td>D42114516</td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Abdllah Satari Rahim</td>
                  <td>D42114516</td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Abdllah Satari Rahim</td>
                  <td>D42114516</td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <tr>
                  <td>Abdllah Satari Rahim</td>
                  <td>D42114516</td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-dosen-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Dosen</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <input type="text" class="form-control" name="dosen_nama" id="dosen_nama" placeholder="Nama Dosen"  required>
                    </div>
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" class="form-control" name="dosen_nim" id="dosen_nim" placeholder="NIP"  required>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="dosen_departemen" id="dosen_departemen" style="width: 100%;" required>
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
                      <label>Password</label>
                      <input type="password" class="form-control" name="dosen_password" id="dosen_password" placeholder="Password"  required>
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
          <div class="modal fade" id="modal-dosen-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Dosen</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <input type="text" class="form-control" name="dosen_nama_edit" id="dosen_nama_edit" placeholder="Nama Dosen"  required>
                    </div>
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" class="form-control" name="dosen_nim_edit" id="dosen_nim_edit" placeholder="NIP"  required>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="dosen_departemen_edit" id="dosen_departemen_edit" style="width: 100%;" required>
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
                      <label>Password</label>
                      <input type="password" class="form-control" name="dosen_password_edit" id="dosen_password_edit" placeholder="Password"  required>
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