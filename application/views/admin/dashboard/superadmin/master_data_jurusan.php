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
              <h3 class="box-title">Daftar Jurusan</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-jurusan-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Jurusan
                </button>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <br>
            <div class="media-scroll">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nama Jurusan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($jurusan as $jurusan) {?>
                  <tr>
                    <td><?=$jurusan->jurusan;?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-jurusan-edit" id="edit_jurusan" data-id="<?=$jurusan->id_jurusan;?>"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-jurusan-hapus" id="hapus_jurusan" data-id="<?=$jurusan->id_jurusan;?>"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- /.box-body -->
          <div class="modal fade" id="modal-jurusan-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Jurusan</h4>
                </div>
                <form role="form" action="<?php echo base_url().'superadmin/tambah_jurusan';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Jurusan</label>
                      <input type="text" class="form-control" name="jurusan_nama" id="jurusan_nama" placeholder="Nama Jurusan" required>
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

          <div class="modal fade" id="modal-jurusan-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Jurusan</h4>
                </div>
                <form role="form" id="jurusan_simpan_edit" action="#" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Jurusan</label>
                      <input type="text" class="form-control" name="jurusan_nama_edit" id="jurusan_nama_edit" placeholder="Nama Jurusan" required>
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
            $(document).on("click", "#edit_jurusan", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_jurusan",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("jurusan_nama_edit").placeholder=data[0].jurusan;
                  console.log(data[0].jurusan)
                  document.getElementById("jurusan_simpan_edit").action='<?=base_url();?>/Superadmin/edit_jurusan/'+data[0].id_jurusan;
                }
              })
            })
          </script>

          <div class="modal modal-danger fade" id="modal-jurusan-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_jurusan"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_jurusan">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#hapus_jurusan", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_jurusan",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("ket_hapus_jurusan").innerText='Anda akan menghapus data Jurusan '+data[0].jurusan+' ?';
                  document.getElementById("button_hapus_jurusan").href='<?=base_url();?>/Superadmin/hapus_jurusan/'+data[0].id_jurusan;
                }
              })
            })
          </script>

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
