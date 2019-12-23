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
                    <th>Jurusan</th>
                    <th>Departemen</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tampilkps as $datakps) { ?>
                  <tr>
                    <td><?=$datakps->jurusan;?></td>
                    <td><?=$datakps->departemen;?></td>
                    <td><?=$datakps->username;?></td>
                    <td>md5 Encrypted Password</td>
                    <td>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-user-edit"><i class="fa fa-fw  fa-edit"></i></button>
                      <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modal-kps-hapus"><i class="fa fa-fw fa-remove"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-user-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah KPS</h4>
                </div>
                <form role="form" action="<?php echo base_url().'superadmin/tambah_kps';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="jurusan" id="jurusan" style="width: 100%;" required>
                        <option selected value="" disabled>-Pilih Jurusan-</option>
                        <?php foreach ($data->result() as $row) : ?>
                        <option value="<?=$row->id_jurusan?>"><?=$row->jurusan;?></option>
                      <?php endforeach ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="departemen" id="departemen" style="width: 100%;" required>
                        <option selected value="" disabled>-Pilih Departemen-</option>
                      </select>

                      <!--Script untuk chained dropdown 21-12-2019 -->
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                      <script>
                        $(document).ready(function(){
                          $('#jurusan').change(function() {
                            var id = $(this).val();
                            $.ajax({
                              url: "<?=base_url();?>/Superadmin/get_departemen",
                              method: "POST",
                              dataType: "JSON",
                              data: {
                                id: id
                              },
                              success: function(array) {
                                var html = '';
                                for (let index = 0; index < array.length; index++){
                                  html += "<option>" + array[index].departemen + "</option>"
                                }
                                $('#departemen').html(html);
                              }
                            })
                          })
                        })
                      </script>

                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username" required>
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
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Judul Penelitian</h4>
                </div>
                <form role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select class="form-control select2" name="user_jurusan_edit" id="user_jurusan_edit" style="width: 100%;" required>
                        <option selected value="" disabled>Jurusan</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknik Perkapalan">Teknik Perkapalan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                        <option value="Teknik Geologi">Teknik Geologi</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="user_departemen_edit" id="user_departemen_edit" style="width: 100%;" required>
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
                      <label>Username</label>
                      <input type="text" class="form-control" name="user_username_edit" id="user_username_edit" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="user_password_edit" id="user_password_edit" placeholder="Password" required>
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

          <div class="modal modal-danger fade" id="modal-kps-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4>Anda ingin menghapus user KPS <?=$datakps->username;?></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <button type="button" class="btn btn-outline">Ya, Hapus</button>
              </div>
            </div>
            <!-- /.modal-content -->
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
