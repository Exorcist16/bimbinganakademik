<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Timeline -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <!-- Date and time range -->
                    <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-plus-square"></i> Aktivitas Baru
                    </a>
                  </div>
                </div>
                <br>
                <div class="media-scroll">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Topik</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Penggunaan Progressif Web App</td>
                        <td>
                          <a href="<?= base_url() ?>mahasiswa/bimbingan">
                            <button type="button" class="btn btn-primary">
                            <i class="fa fa-fw  fa-edit"></i>
                          </button>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Form Tambah Aktivitas</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <form role="form">
                          <div class="col-md-12">
                            
                            <div class="form-group">
                              <label>Dosen Pengarah</label>
                              <select class="form-control select2" style="width: 100%;">
                                <option selected="selected">Pembimbing 1</option>
                                <option>Pembimbing 2</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Topik</label>
                              <input type="text" class="form-control" placeholder="Topik Bimbingan">
                            </div>
                            <div class="form-group">
                              <label>Deskripsi</label>
                                <textarea class="form-control" rows="5" id="inputDescription" placeholder="Deskripsi Kegiatan"></textarea>
                            </div>                            
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary">Tambahkan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>