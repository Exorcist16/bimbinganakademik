<div class="content-wrapper">
  <!-- Main content -->
  <style type="text/css">
    a button{
      margin-left: 10px !important;
    }
  </style>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <div>
              <!-- <br> -->
              <h3 class="box-title">Jadwal Masuk</h3>
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
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Detail</th>
                        <th class="text-center" style="width: 140px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($dataupcoming as $u) { ?>
                      <tr>
                        <td><b><?=$u->nama;?></b>
                          <br>
                          <span style="color: grey"><?=$u->nim;?></span>
                        </td>
                        <td><?=$u->seminar_tanggal;?></td>
                        <td><?=$u->waktu_mulai;?>-<?=$u->waktu_selesai;?></td>
                        <td>
                          <a href="javascript:void(0)" class="product-title">
                            <button type="button" id="detail" class="btn btn-warning text-center" data-toggle="modal" data-target="#modal-default" data-nim="<?=$u->nim;?>">
                              <i class="fa fa-fw fa-edit"></i>
                            </button>
                          </a>
                        </td>
                        <td>
                          <a href="javascript:void(0)" class="product-title">
                            <button type="button" class="btn btn-danger pull-right">
                              Reject
                            </button>
                            <button type="button" id="terima" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-terima" data-nim="<?=$u->nim;?>">
                              Accept
                            </button>
                          </a>
                        </td>
                      </tr>
                      <?php } ?>
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

                          <h3 class="profile-username text-center" name="bimbing_nama" id="bimbing_nama"></h3>

                          <p class="text-muted text-center" name="bimbing_nim" id="bimbing_nim"></p>

                          <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                              <b name="bimbing_departemen" id="bimbing_departemen"></b>
                            </li>
                            <li class="list-group-item">
                              <b name="bimbing_strata" id="bimbing_strata"></b>
                            </li>
                            <li class="list-group-item">
                              <b name="bimbing_angkatan" id="bimbing_angkatan"></b>
                            </li>
                          </ul>

                          <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
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

                          <p class="text-muted" name="bimbing_judul" id="bimbing_judul"></p>

                          <hr>

                          <strong><i class="fa fa-group margin-r-5"></i>Pembimbing</strong>

                          <p class="text-muted">
                          <p name="bimbing_pembimbing2" id="bimbing_pembimbing1"></p> <br>
                          <p name="bimbing_pembimbing2" id="bimbing_pembimbing2"></p>
                          </p>

                          <hr>

                          <strong><i class="fa fa-group margin-r-5"></i>Penguji</strong>

                          <p class="text-muted">
                          <p name="bimbing_penguji1" id="bimbing_penguji1"></p><br>
                          <p name="bimbing_penguji2" id="bimbing_penguji2">
                          </p>

                          <!-- <hr> -->
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

          <div class="modal modal-success fade" id="modal-terima">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="ket_terima">Anda ingin menerima permintaan seminar?</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="btn-terima">
                  <button type="button" class="btn btn-outline">Ya, Terima</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#terima", function(){
              var nim = $(this).attr('data-nim')
              $.ajax({
                url: "<?=base_url();?>/Dosen/get_data",
                method: "POST",
                dataType: "JSON",
                data: {
                  nim: nim
                },
                success: function(data){
                  document.getElementById("ket_terima").innerText = 'Anda ingin menerima permintaan Seminar oleh mahasiswa atas nama '+data[0].nama;
                  document.getElementById("btn-terima").href='<?=base_url();?>/Dosen/terima_seminar/'+data[0].nim;
                }
              })
            })
          </script>

          <script type="text/javascript">
            $(document).on("click", "#detail", function(){
              var nim = $(this).attr('data-nim')
              $.ajax({
                url: "<?=base_url();?>/Dosen/get_data",
                method: "POST",
                dataType: "JSON",
                data: {
                  nim: nim
                },
                success: function(data){
                  document.getElementById("bimbing_nama").innerText = data[0].nama;
                  document.getElementById("bimbing_nim").innerText = data[0].nim;
                  document.getElementById("bimbing_departemen").innerText = 'Departemen ' + data[0].departemen;
                  document.getElementById("bimbing_strata").innerText = data[0].strata;
                  document.getElementById("bimbing_angkatan").innerText = data[0].angkatan;
                  document.getElementById("bimbing_judul").innerText = data[0].judul;
                  document.getElementById("bimbing_pembimbing1").innerText = data[0].pembimbing1;
                  document.getElementById("bimbing_pembimbing2").innerText = data[0].pembimbing2;
                  document.getElementById("bimbing_penguji1").innerText = data[0].penguji1;
                  document.getElementById("bimbing_penguji2").innerText = data[0].penguji2;
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
