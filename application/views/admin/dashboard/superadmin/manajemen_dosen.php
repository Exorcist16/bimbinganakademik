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
              <h3 class="box-title">List Dosen</h3>
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-dosen-tambah-file">
                  <i class="fa fa-plus-square"></i> Tambah dengan File
                </a>&nbsp;
              <div class="box-tools pull-right">
                <a class="btn btn-sm btn-social btn-google" data-toggle="modal" data-target="#modal-dosen-tambah">
                  <i class="fa fa-plus-square"></i> Tambah Manual
                </a>&nbsp;
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">Jenjang Strata
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Jenjang S1</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <!-- Date and time range -->
              </div>
            </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dosendata as $dosendata) { ?> <!--22-12-2019 -->
                <tr>
                  <td><?=$dosendata->nama_dosen; ?></td>
                  <td><?=$dosendata->nip; ?></td>
                  <td>md5 Encrypted Password</td>
                  <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen-edit" id="dosen_edit" data-id="<?=$dosendata->nip;?>"><i class="fa fa-fw  fa-edit"></i></button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-dosen-hapus" id="dosen_hapus" data-id="<?=$dosendata->nip;?>"><i class="fa fa-fw fa-remove"></i></button>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!-- /.box-body -->
          <div class="modal fade" id="modal-dosen-tambah">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Tambah Dosen</h4>
                </div>
                <form role="form" action="<?php echo base_url().'superadmin/tambah_dosen';?>" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <input type="text" class="form-control" name="dosen_nama" id="dosen_nama" placeholder="Nama Dosen"  required>
                    </div>
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" class="form-control" name="dosen_nip" id="dosen_nip" placeholder="NIP"  required>
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

          <div class="modal fade" id="modal-dosen-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Edit Dosen</h4>
                </div>
                <form role="form" id="form_edit_dosen" method="post">
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Nama Dosen</label>
                      <input type="text" class="form-control" name="dosen_nama_edit" id="dosen_nama_edit" placeholder="Nama Dosen"  required>
                    </div>
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" class="form-control" name="dosen_nip_edit" id="dosen_nip_edit" placeholder="NIP"  required>
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

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#dosen_edit", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_dosen",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("dosen_nama_edit").value = data[0].nama_dosen;
                  document.getElementById("dosen_nip_edit").value = data[0].nip;
                  document.getElementById("form_edit_dosen").action = '<?=base_url();?>/Superadmin/edit_dosen/'+data[0].nip;
                }
              })
            })
          </script>

          <div class="modal modal-danger fade" id="modal-dosen-hapus">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_hapus_dosen"></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hapus_dosen">
                  <button type="button" class="btn btn-outline">Ya, Hapus</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#dosen_hapus", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Superadmin/data_dosen",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(data[0])
                  document.getElementById("ket_hapus_dosen").innerText='Anda akan menghapus data Dosen '+data[0].nama_dosen+' ?';
                  document.getElementById("button_hapus_dosen").href='<?=base_url();?>/Superadmin/hapus_dosen/'+data[0].nip;
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
