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
              <h3 class="box-title">Daftar User KPS</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-user-tambah">
                  <i class="fa fa-plus-square"></i> Tambah User
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
                    <th>Departemen</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kps as $datakps) { ?>
                  <tr>
                    <td><?=$datakps->departemen;?></td>
                    <td><?=$datakps->username;?></td>
                    <td>md5 Encrypted Password</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-user-edit" id="manajemen_edit" data-id="<?=$datakps->username;?>"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-kps-hapus" id="manajemen_hapus" data-id="<?=$datakps->username;?>"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.box -->

        <!-- /.box-body -->
        <div class="modal fade" id="modal-user-tambah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tambah KPS</h4>
              </div>
              <form role="form" action="<?php echo base_url().'superadmin/tambah_kps';?>" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Departemen</label>
                    <select class="form-control select2" name="departemen" id="departemen" style="width: 100%;" required>
                      <option selected value="" disabled>-Pilih Departemen-</option>
                      <?php foreach ($departemen as $dept) { ?>
                        <option value="<?= $dept->departemen;?>"><?= $dept->departemen;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username" required>
                    <h6 class="help-block text-red">*<i>username</i> tidak boleh mengandung spasi dan simbol</h6>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password" required>
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

        <div class="modal fade" id="modal-user-edit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Edit Data User KPS</h4>
              </div>
              <form role="form" id="form_user_edit" method="post">
                <div class="modal-body">
                  <div class="form-group">
                    <label>Departemen</label>
                    <select class="form-control select2" name="user_departemen_edit" id="user_departemen_edit" style="width: 100%;" required>
                      <option id="departemen_terpilih" selected value="" disabled>-Pilih Departemen-</option>
                      <?php foreach ($departemen as $depart) { ?>
                        <option value="<?= $depart->departemen;?>"><?= $depart->departemen;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="user_username_edit" id="user_username_edit" placeholder="Username" required>
                    <h6 class="help-block text-red">*<i>username</i> tidak boleh mengandung spasi dan simbol</h6>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="user_password_edit" id="user_password_edit" placeholder="Password" required>
                  </div>

                  <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
                  <script type="text/javascript">
                    $(document).on("click", "#manajemen_edit", function(){
                      var id = $(this).attr('data-id')
                      $.ajax({
                        url: "<?=base_url();?>/Superadmin/data_kps",
                        method: "POST",
                        dataType: "JSON",
                        data: { id: id},
                        success: function(data){
                          document.getElementById("departemen_terpilih").value = data[0].departemen;
                          document.getElementById("departemen_terpilih").innerText = data[0].departemen;
                          document.getElementById("user_username_edit").value = data[0].username;
                          document.getElementById("form_user_edit").action = '<?=base_url();?>/Superadmin/edit_kps/'+data[0].username;
                        }
                      })
                    })
                  </script>

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

        <div class="modal modal-danger fade" id="modal-kps-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_kps"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_kps">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>

          <script type="text/javascript">
            $(document).on("click", "#manajemen_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_kps",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("ket_hapus_kps").innerText = 'Anda akan menghapus data user '+data[0].username+'?';
                  document.getElementById("button_hapus_kps").href = '<?=base_url();?>/Superadmin/hapus_kps/'+data[0].username;
                }
              })
            })
          </script>
        </div>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
