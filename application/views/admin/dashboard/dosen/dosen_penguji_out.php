<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div>
              <!-- <br> -->
              <h3 class="box-title">Mahasiswa Pengujian (Selesai)</h3>
              <div class="box-tools pull-right">
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
            <div class="box box-success">
              <!-- /.box-header -->
              <div class="box-body">
                <div class="media-scroll">
                  <table id="example2" class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th class="pull-right">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($pengujialumni as $pengujialumni) { ?>
                      <tr>
                        <td>
                          <b><?=$pengujialumni->nama;?></b>
                          <br>
                          <span style="color: grey"><?=$pengujialumni->nim;?></span>
                        </td>
                        <td>
                          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-default" data-id="<?=$pengujialumni->nim;?>">
                            Detail
                          </button>
                        </td>
                        <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Detail Mahasiswa</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-12">

                      <!-- Profile Image -->
                      <div class="box box-primary">
                        <div class="box-body box-profile">
                          <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/')?>dist/img/user4-128x128.jpg" alt="User profile picture">

                          <h3 class="profile-username text-center" name="pengujia_nama" id="pengujia_nama"></h3>

                          <p class="text-muted text-center" name="pengujia_nim" id="pengujia_nim"></p>

                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b name="pengujia_departemen" id="pengujia_departemen"></b>
                            </li>
                            <li class="list-group-item">
                              <b name="pengujia_strata" id="pengujia_strata"></b>
                            </li>
                            <li class="list-group-item">
                              <b name="pengujia_angkatan" id="pengujia_angkatan"></b>
                            </li>
                          </ul>

                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->

                      <!-- About Me Box -->
                      <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Info!</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <strong><i class="fa fa-book margin-r-5"></i>Judul Penelitian</strong>

                          <p class="text-muted" name="pengujia_judul" id="pengujia_judul"></p>

                          <hr>

                          <strong><i class="fa fa-group margin-r-5"></i>Pembimbing</strong>

                          <p class="text-muted">
                          <p name="pengujia_pembimbing2" id="pengujia_pembimbing1"></p> <br>
                          <p name="pengujia_pembimbing2" id="pengujia_pembimbing2"></p>
                          </p>

                          <hr>

                          <strong><i class="fa fa-group margin-r-5"></i>Penguji</strong>

                          <p class="text-muted">
                          <p name="pengujia_penguji1" id="pengujia_penguji1"></p><br>
                          <p name="pengujia_penguji2" id="pengujia_penguji2">
                          </p>

                          <!-- <hr> -->
                        </div>
                        <!-- /.box-body -->
                      </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "button", function(){
              var nim = $(this).data('id');
              $.ajax({
                url: "<?=base_url();?>/Dosen/get_data",
                method: "POST",
                dataType: "JSON",
                data: {
                  nim: nim
                },
                success: function(data){
                  document.getElementById("pengujia_nama").innerText = data[0].nama;
                  document.getElementById("pengujia_nim").innerText = data[0].nim;
                  document.getElementById("pengujia_departemen").innerText = 'Departemen ' + data[0].departemen;
                  document.getElementById("pengujia_strata").innerText = data[0].strata;
                  document.getElementById("pengujia_angkatan").innerText = data[0].angkatan;
                  document.getElementById("pengujia_judul").innerText = data[0].judul;
                  document.getElementById("pengujia_pembimbing1").innerText = data[0].pembimbing1;
                  document.getElementById("pengujia_pembimbing2").innerText = data[0].pembimbing2;
                  document.getElementById("pengujia_penguji1").innerText = data[0].penguji1;
                  document.getElementById("pengujia_penguji2").innerText = data[0].penguji2;
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
