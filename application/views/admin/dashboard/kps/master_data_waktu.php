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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-waktu-edit" id="waktu_edit" data-id="<?= $datawaktumaster->waktu_ujian_id; ?>"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-waktu-hapus" id="waktu_hapus" data-id="<?= $datawaktumaster->waktu_ujian_id; ?>"><i class="fa fa-fw fa-remove"></i></button>
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
                <form role="form" id="waktu_form_edit" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Waktu Mulai</label>
                      <input type="text" class="form-control" name="waktu_mulai_edit" id="waktu_mulai_edit" placeholder="Waktu Mulai" required>
                      <h6 class="help-block text-red">Format memakai tanda titik, contoh : 09.00</h6>
                    </div>
                    <div class="form-group">
                      <label>Waktu Selesai</label>
                      <input type="text" class="form-control" name="waktu_selesai_edit" id="waktu_selesai_edit" placeholder="Waktu Selesai" required>
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

            <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript">
              $(document).on("click", "#waktu_edit", function(){
                var id = $(this).attr('data-id')
                $.ajax({
                  url: "<?=base_url();?>/Kps/data_waktu",
                  method: "POST",
                  dataType: "JSON",
                  data: { id: id},
                  success: function(data){
                    document.getElementById("waktu_mulai_edit").value = data[0].waktu_mulai;
                    document.getElementById("waktu_selesai_edit").value = data[0].waktu_selesai;
                    document.getElementById("waktu_form_edit").action = '<?=base_url();?>/Kps/edit_waktu/'+data[0].waktu_ujian_id;
                  }
                })
              })
            </script>

            <!-- /.modal-dialog -->
          </div>

          <div class="modal modal-danger fade" id="modal-waktu-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_waktu"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_waktu">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#waktu_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_waktu",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(data[0])
                  document.getElementById("ket_hapus_waktu").innerText='Anda akan menghapus data waktu '+data[0].waktu_mulai+' - '+data[0].waktu_selesai+' ?';
                  document.getElementById("button_hapus_waktu").href='<?=base_url();?>/Kps/hapus_waktu/'+data[0].waktu_ujian_id;
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
