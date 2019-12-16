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
              <h3 class="box-title">Daftar Departemen</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-departemen-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Departemen
                </button>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>
            <div class="media-scroll">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Departemen</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <tr>
                    <td>Teknik Informatika</td>
                    <td>Teknik Elektro</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-departemen-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Departemen</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Departemen</label>
                      <input type="text" class="form-control" name="departemen_nama" id="departemen_nama" placeholder="Nama Departemen" required>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="departemen_jurusan" id="departemen_jurusan" style="width: 100%;" required>
                        <option selected value="" disabled>Jurusan</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        <option value="Teknik Geologi">Teknik Geologi</option>
                      </select>
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

          <div class="modal fade" id="modal-departemen-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Departemen</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Departemen</label>
                      <input type="text" class="form-control" name="departemen_nama_edit" id="departemen_nama_edit" placeholder="Nama Departemen" required>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="departemen_jurusan_edit" id="departemen_jurusan_edit" style="width: 100%;" required>
                        <option selected value="" disabled>Jurusan</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        <option value="Teknik Geologi">Teknik Geologi</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
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
