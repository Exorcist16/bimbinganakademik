<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <?php foreach ($detail as $detail) { ?>

      <div class="row">
        <div class="col-md-6">

          <!-- Timeline -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <h3>Data Pribadi</h3>
                  </div>
                </div>
              </div>
              <!-- /.box -->

              <div>
                <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/')?>dist/img/<?php if ($detail->foto == null){
                  echo "user_profil.png";
                } else {
                  echo $detail->foto;
                }?>" style="background:grey" alt="User profile picture">
                <br>
                <center><a href="#">Ganti Foto Profil</a></center>
                <br>

                <div class="media-scroll">
                  <table id="" class="table table-bordered table-striped" style="width:100%;">
                    <tbody>
                      <tr>
                        <td>Nama Lengkap</td>
                        <td><b><?=$detail->nama;?></b></td>
                      </tr>
                      <tr>
                        <td>NIM</td>
                        <td><b><?=$detail->nim;?></b></td>
                      </tr>
                      <tr>
                        <td>password</td>
                        <td><b>Password terenkripsi</b><button type="button" class="btn btn-default btn-flat pull-right" data-toggle="modal" data-target="#modal-pass-mahasiswa" id="ganti_pass_mahasiswa" data-id="<?=$detail->nim;?>">Ganti Password</button></td>
                      </tr>
                      <tr>
                        <td>Departemen</td>
                        <td><b><?=$detail->departemen;?></b></td>
                      </tr>
                      <tr>
                        <td>Strata</td>
                        <td><b><?=$detail->strata;?></b></td>
                      </tr>
                      <tr>
                        <td>Angkatan</td>
                        <td><b><?=$detail->angkatan;?></b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-6">

          <!-- Timeline -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                    <h3>Data Tugas Akhir</h3>
                  </div>
                </div>
              </div>
              <!-- /.box -->
              <div>
                <div class="media-scroll">
                  <table id="" class="table table-bordered table-striped" style="width:100%;">
                    <tbody>
                      <tr>
                        <td>Judul</td>
                        <td><b><?=$detail->judul;?></b></td>
                      </tr>
                      <tr>
                        <td>Pembimbing 1</td>
                        <td><b><?=$detail->pembimbing1;?></b></td>
                      </tr>
                      <tr>
                        <td>Pembimbing 2</td>
                        <td><b><?=$detail->pembimbing2;?></b></td>
                      </tr>
                      <tr>
                        <td>Penguji 1</td>
                        <td><b><?=$detail->penguji1;?></b></td>
                      </tr>
                      <tr>
                        <td>Penguji 2</td>
                        <td><b><?=$detail->penguji2;?></b></td>
                      </tr>
                      <tr>
                        <td>Seminar Hasil</td>
                        <td><b><?php if ($detail->hasil == 1) {
                          echo "Selesai";
                        } else {
                          echo "Belum";
                        }?></b></td>
                      </tr>
                      <tr>
                        <td>Ujian Skripsi</td>
                        <td><b><?php if ($detail->alumni == 1) {
                          echo "Selesai";
                        } else {
                          echo "Belum";
                        }?></b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <?php } ?>

    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-pass-mahasiswa">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ganti Password</h4>
          </div>
          <form role="form" action="<?php echo base_url().'auth/ganti_pass_mahasiswa';?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" class="form-control" name="pass_lama_mhs" id="pass_lama_mhs" style="width: 100%;" required>
                <h6 id="password_lama_mhs_alert" class="help-block text-red"></h6>
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="pass_baru_mhs" id="pass_baru_mhs" disabled>
                <h6 id="password_baru_mhs_alert" class="help-block text-red"></h6>
              </div>
              <div class="form-group">
                <label>Ulangi Password Baru</label>
                <input type="password" class="form-control" name="pass_baru_mhs_ulang" id="pass_baru_mhs_ulang" disabled>
                <h6 id="ulang_password_baru_mhs_alert" class="help-block text-red"></h6>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button id="btn_ganti_pass_mhs" type="submit" class="btn btn-primary" disabled>Ganti Password</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#pass_lama_mhs").change(function(){
            var pass = $(this).val();
            $.ajax({
              url: "<?=base_url();?>/auth/get_pass",
              method: "POST",
              dataType: "JSON",
              data: {
                pass: pass
              },
              success: function(data){
                console.log(data.password);
                console.log(data.passlama);
                if (data.password != data.passlama) {
                  document.getElementById("password_lama_mhs_alert").innerText = "password lama salah";
                  document.getElementById("btn_ganti_pass_mhs").disabled = true;
                  document.getElementById("pass_baru_mhs").disabled = true;
                  document.getElementById("pass_baru_mhs_ulang").disabled = true;
                } else {
                  document.getElementById("password_lama_mhs_alert").innerText = "";
                  document.getElementById("btn_ganti_pass_mhs").disabled = true;
                  document.getElementById("pass_baru_mhs").disabled = false;
                  document.getElementById("pass_baru_mhs").required = true;
                  document.getElementById("pass_baru_mhs_ulang").disabled = false;
                  document.getElementById("pass_baru_mhs_ulang").required = true;
                }
              }
            })
          })
        })
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#pass_baru_mhs").change(function(){
            var passbaru = $(this).val();
            var passbaruulang = $("#pass_baru_mhs_ulang").val();
            var passlama = $("#pass_lama_mhs").val();
            if (passlama == passbaru) {
              document.getElementById("password_baru_mhs_alert").innerText = "Password Baru tidak boleh sama dengan Password Lama";
              document.getElementById("btn_ganti_pass_mhs").disabled = true;
              document.getElementById("pass_baru_mhs_ulang").value = "";
              document.getElementById("ulang_password_baru_mhs_alert").innerText = "";
            } else if (passbaru == passbaruulang) {
                document.getElementById("password_baru_mhs_alert").innerText = "";
                document.getElementById("btn_ganti_pass_mhs").disabled = true;
                document.getElementById("pass_baru_mhs_ulang").value = "";
                document.getElementById("ulang_password_baru_mhs_alert").innerText = "";
            } else {
              document.getElementById("password_baru_mhs_alert").innerText = "";
              document.getElementById("btn_ganti_pass_mhs").disabled = false;
              document.getElementById("pass_baru_mhs_ulang").value = "";
              document.getElementById("ulang_password_baru_mhs_alert").innerText = "";
            }
          })
        })
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#pass_baru_mhs_ulang").change(function(){
            var passbaruulang = $(this).val();
            var passbaru = $("#pass_baru_mhs").val();
            if (passbaruulang == passbaru) {
              document.getElementById("ulang_password_baru_mhs_alert").innerText = "";
              document.getElementById("btn_ganti_pass_mhs").disabled = false;
            } else {
              document.getElementById("ulang_password_baru_mhs_alert").innerText = "Password tidak sama";
              document.getElementById("btn_ganti_pass_mhs").disabled = true;
            }
          })
        })
      </script>
    </div>

  </div>
