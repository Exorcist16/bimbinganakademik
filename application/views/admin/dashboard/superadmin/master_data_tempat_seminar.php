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
              <h3 class="box-title">Daftar Tempat Ujian</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-tempat-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Tempat
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
                    <th>Tempat Ujian</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($datatempatmaster as $datatempatmaster) { ?>
                  <tr>
                    <td><?=$datatempatmaster->tempat_ujian_nama;?></td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tempat-edit" id="tempat_edit" data-id="<?=$datatempatmaster->tempat_ujian_id;?>"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tempat-hapus" id="tempat_hapus" data-id="<?=$datatempatmaster->tempat_ujian_id;?>"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-tempat-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Tempat Ujian</h4>
                </div>
                <form role="form" action="<?php echo base_url().'superadmin/tambah_tempat';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Tempat Ujian</label>
                      <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Ujian" required>
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

          <div class="modal fade" id="modal-tempat-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Tempat Ujian</h4>
                </div>
                <form role="form" id="tempat_form_edit" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Tempat Ujian</label>
                      <input type="text" class="form-control" name="tempat_nama_edit" id="tempat_nama_edit" placeholder="Tempat Ujian" required>
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

            <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript">
              $(document).on("click", "#tempat_edit", function(){
                var id = $(this).attr('data-id')
                $.ajax({
                  url: "<?=base_url();?>/Superadmin/data_tempat",
                  method: "POST",
                  dataType: "JSON",
                  data: { id: id},
                  success: function(data){
                    document.getElementById("tempat_nama_edit").value = data[0].tempat_ujian_nama;
                    document.getElementById("tempat_form_edit").action = '<?=base_url();?>/Superadmin/edit_tempat/'+data[0].tempat_ujian_id;
                  }
                })
              })
            </script>

            <!-- /.modal-dialog -->
          </div>

          <div class="modal modal-danger fade" id="modal-tempat-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_tempat"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_tempat">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#tempat_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_tempat",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(data[0])
                  document.getElementById("ket_hapus_tempat").innerText='Anda akan menghapus data tempat: '+data[0].tempat_ujian_nama+' ?';
                  document.getElementById("button_hapus_tempat").href='<?=base_url();?>/Superadmin/hapus_tempat/'+data[0].tempat_ujian_id;
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
