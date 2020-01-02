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
                  <?php foreach ($hasil as $data) { ?>
                  <tr>
                    <td><?=$data->departemen;?></td>
                    <td><?=$data->jurusan;?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-departemen-edit" id="edit_departemen" data-id="<?=$data->id_departemen;?>"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
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
                <form role="form" action="<?php echo base_url().'superadmin/tambah_departemen';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Departemen</label>
                      <input type="text" class="form-control" name="departemen_nama" id="departemen_nama" placeholder="Nama Departemen" required>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="departemen_jurusan" id="departemen_jurusan" style="width: 100%;" required>
                        <option selected value="" disabled>Jurusan</option>
                        <?php foreach ($jurusan as $jurusan) { ?>
                        <option value="<?=$jurusan->id_jurusan;?>"><?=$jurusan->jurusan;?></option>
                        <?php } ?>
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
                <form role="form" id="departemen_simpan_edit" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Departemen</label>
                      <input type="text" class="form-control" name="departemen_nama_edit" id="departemen_nama_edit" required>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="departemen_jurusan_edit" id="departemen_jurusan_edit" style="width: 100%;" required>
                        <option selected value="" disabled>Jurusan</option>
                        <?php $je = $this->db->query("SELECT * FROM jurusan")->result();
                        foreach ($je as $jurusanedit) { ?>
                        <option value="<?=$jurusanedit->id_jurusan;?>"><?=$jurusanedit->jurusan;?></option>
                        <?php } ?>
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

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#edit_departemen", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_departemen",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("departemen_nama_edit").value = data[0].departemen;
                  document.getElementById("departemen_simpan_edit").action='<?=base_url();?>/Superadmin/edit_departemen/'+data[0].id_departemen;
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
