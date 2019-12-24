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
              <h3 class="box-title">Daftar Waktu Ujian</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-waktu-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Waktu
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
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datawaktumaster as $datawaktumaster) { ?>
                  <tr>
                    <td><?= $datawaktumaster->waktu_mulai; ?> WITA</td>
                    <td><?= $datawaktumaster->waktu_selesai; ?> WITA</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-waktu-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-waktu-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Waktu Ujian</h4>
                </div>
                <form role="form" action="<?php echo base_url().'kps/tambah_waktu';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Waktu Mulai</label>
                      <input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai" required>
                      <h6 class="help-block text-red">Format memakai tanda titik, contoh : 09.00</h6>
                    </div>
                    <div class="form-group">
                      <label>Waktu Selesai</label>
                      <input type="text" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai" required>
                      <h6 class="help-block text-red">Format memakai tanda titik, contoh : 10.30</h6>
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

          <div class="modal fade" id="modal-waktu-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Waktu Ujian</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Waktu Mulai</label>
                      <input type="text" class="form-control" name="waktu_mulai" id="waktu_mulai" placeholder="Waktu Mulai" required>
                      <h6 class="help-block text-red">Format memakai tanda titik, contoh : 09.00</h6>
                    </div>
                    <div class="form-group">
                      <label>Waktu Selesai</label>
                      <input type="text" class="form-control" name="waktu_selesai" id="waktu_selesai" placeholder="Waktu Selesai" required>
                      <h6 class="help-block text-red">Format memakai tanda titik, contoh : 10.30</h6>
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
