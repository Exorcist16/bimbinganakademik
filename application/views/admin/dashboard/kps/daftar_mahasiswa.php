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
              <h3 class="box-title">List Mahasiswa</h3>
              <div class="btn-group pull-right">
                <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">Jenjang Strata
                  <span class="fa fa-caret-down"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="#">Jenjang S1</a></li>
                  <li><a href="#">Jenjang S2</a></li>
                  <li><a href="#">Jenjang S3</a></li>
                </ul>&nbsp;
              </div>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-mahasiswa-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Mahasiswa
                </a>&nbsp;
              </div>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-mahasiswa-tambah-file">
                  <i class="fa fa-plus-square"></i> Tambah dengan File
                </a>&nbsp;
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <?php echo $this->session->flashdata('notif'); ?>
                <!-- Date and time range -->
              </div>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nim</th>
                  <th>Strata</th>
                  <th>Angkatan</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($mahasiswadata as $mahasiswa) { ?> <!--22-12-2019 -->
                <tr>
                  <td><?= $mahasiswa->nama; ?></td>
                  <td><?= $mahasiswa->nim; ?></td>
                  <td><?= $mahasiswa->strata; ?></td>
                  <td><?= $mahasiswa->angkatan; ?></td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-mahasiswa-edit" id="mahasiswa_edit" data-id="<?=$mahasiswa->nim;?>"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-mahasiswa-hapus" id="mahasiswa_hapus" data-id="<?=$mahasiswa->nim;?>"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!-- /.box-body -->
          <div class="modal fade" id="modal-mahasiswa-tambah-file">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Mahasiswa dengan File</h4>
                </div>
                <form role="form" action="<?php echo base_url().'kps/upload_mahasiswa';?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-grup">
                      <label>Catatan: </label>
                      <p>- unduh format file di link berikut: <a href="<?php echo base_url().'kps/download_format_mahasiswa';?>">Unduh Format</a></p>
                      <label>Unggah File Excel</label>
                      <input type="file" name="userfile" class="form-control">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Upload</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <!-- /.box-body -->

          <div class="modal fade" id="modal-mahasiswa-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Mahasiswa</h4>
                </div>
                <form role="form" action="<?php echo base_url().'kps/tambah_mahasiswa';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="mahasiswa_nim" id="mahasiswa_nim" placeholder="NIM"  required>
                    </div>
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="mahasiswa_nama" id="mahasiswa_nama" placeholder="Nama Mahasiswa"  required>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="mahasiswa_departemen" id="mahasiswa_departemen" style="width: 100%;" required>
                        <?php foreach ($departemendata as $departemen) { ?>    <!-- 22-12-2019 -->
                        <option value="<?=$departemen->departemen;?>"><?=$departemen->departemen;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form_group">
                      <label>Strata</label>
                      <select class="form-control select2" name="mahasiswa_strata" id="mahasiswa_strata" style="width: 100%;" required>
                        <option selected value="" disabled>--Strata--</option>
                        <option value="S1">Strata 1</option>
                        <option value="S2">Strata 2</option>
                        <option value="S3">Strata 3</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Angkatan</label>
                      <input type="number" class="form-control" name="mahasiswa_angkatan" id="mahasiswa_angkatan" placeholder="Angkatan"  required>
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

          <div class="modal fade" id="modal-mahasiswa-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Mahasiswa</h4>
                </div>
                <form role="form" id="mahasiswa_form_edit" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>NIM</label>
                      <input type="text" class="form-control" name="mahasiswa_nim_edit" id="mahasiswa_nim_edit" placeholder="NIM"  required>
                    </div>
                    <div class="form-group">
                      <label>Nama Mahasiswa</label>
                      <input type="text" class="form-control" name="mahasiswa_nama_edit" id="mahasiswa_nama_edit" placeholder="Nama Mahasiswa"  required>
                    </div>
                    <div class="form-group">
                      <label>Departemen</label>
                      <select class="form-control select2" name="mahasiswa_departemen_edit" id="mahasiswa_departemen_edit" style="width: 100%;" required>
                        <?php foreach ($departemendata as $departemen) { ?>
                          <option value="<?$departemen->departemen;?>"><?=$departemen->departemen;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form_group">
                      <label>Strata</label>
                      <select class="form-control select2" name="mahasiswa_strata_edit" id="mahasiswa_strata_edit" style="width: 100%;" required>
                        <option selected value="" disabled>--Strata--</option>
                        <option value="S1">Strata 1</option>
                        <option value="S2">Strata 2</option>
                        <option value="S3">Strata 3</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label>Angkatan</label>
                      <input type="number" class="form-control" name="mahasiswa_angkatan_edit" id="mahasiswa_angkatan_edit" placeholder="Angkatan"  required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                  </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#mahasiswa_edit", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_mahasiswa",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("mahasiswa_nama_edit").value = data[0].nama;
                  document.getElementById("mahasiswa_nim_edit").value = data[0].nim;
                  document.getElementById("mahasiswa_angkatan_edit").value = data[0].angkatan;
                  document.getElementById("mahasiswa_form_edit").action = '<?=base_url();?>/Kps/edit_mahasiswa/'+data[0].nim;
                }
              })
            })
          </script>

          <div class="modal modal-danger fade" id="modal-mahasiswa-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_mahasiswa"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_mahasiswa">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#mahasiswa_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_mahasiswa",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(data[0])
                  document.getElementById("ket_hapus_mahasiswa").innerText='Anda akan menghapus data Mahasiswa atas nama: '+data[0].nama+' ?';
                  document.getElementById("button_hapus_mahasiswa").href='<?=base_url();?>/Kps/hapus_mahasiswa/'+data[0].nim;
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
