<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <?php foreach ($detail as $detail) { ?>

      <div class="row">
        <div class="col-md-12">

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
                <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/')?>dist/img/fotouser/<?php if ($detail->foto_dosen == null){
                  echo "user_profil.png";
                } else {
                  echo $detail->foto_dosen;
                }?>" style="background:grey" alt="User profile picture">
                <br>
                <center><a href="#">Ganti Foto Profil</a></center>
                <br>

                <div class="media-scroll">
                  <table id="" class="table table-bordered table-striped" style="width:100%;">
                    <tbody>
                      <tr>
                        <td>Nama Lengkap</td>
                        <td><b><?=$detail->nama_dosen;?></b></td>
                      </tr>
                      <tr>
                        <td>Nomor Induk Pegawai</td>
                        <td><b><?=$detail->nip;?></b></td>
                      </tr>
                      <tr>
                        <td>password</td>
                        <td><b>Password terenkripsi</b><a href="" class="pull-right" data-toggle="modal" data-target="#modal-pass-dosen" id="ganti_pass_dosen" data-id="<?=$detail->nip;?>">Ganti Password</a></td>
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

    <div class="modal fade" id="modal-pass-dosen">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ganti Password</h4>
          </div>
          <form role="form" action="<?php echo base_url().'auth/ganti_pass_dosen';?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>Password Lama</label>
                <input type="password" class="form-control" name="pass_lama_dosen" id="pass_lama_dosen" style="width: 100%;" required>
                <h6 id="password_lama_dosen_alert" class="help-block text-red"></h6>
              </div>
              <div class="form-group">
                <label>Password Baru</label>
                <input type="password" class="form-control" name="pass_baru_dosen" id="pass_baru_dosen" disabled>
                <h6 id="password_baru_dosen_alert" class="help-block text-red"></h6>
              </div>
              <div class="form-group">
                <label>Ulangi Password Baru</label>
                <input type="password" class="form-control" name="pass_baru_dosen_ulang" id="pass_baru_dosen_ulang" disabled>
                <h6 id="ulang_password_baru_dosen_alert" class="help-block text-red"></h6>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button id="btn_ganti_pass_dosen" type="submit" class="btn btn-primary" disabled>Ganti Password</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#pass_lama_dosen").change(function(){
            var pass = $(this).val();
            $.ajax({
              url: "<?=base_url();?>/auth/get_pass",
              method: "POST",
              dataType: "JSON",
              data: {
                pass: pass
              },
              success: function(data){
                if (data.password != data.passlama) {
                  document.getElementById("password_lama_dosen_alert").innerText = "password lama salah";
                  document.getElementById("btn_ganti_pass_dosen").disabled = true;
                  document.getElementById("pass_baru_dosen").disabled = true;
                  document.getElementById("pass_baru_dosen_ulang").disabled = true;
                } else {
                  document.getElementById("password_lama_dosen_alert").innerText = "";
                  document.getElementById("btn_ganti_pass_dosen").disabled = true;
                  document.getElementById("pass_baru_dosen").disabled = false;
                  document.getElementById("pass_baru_dosen").required = true;
                  document.getElementById("pass_baru_dosen_ulang").disabled = false;
                  document.getElementById("pass_baru_dosen_ulang").required = true;
                }
              }
            })
          })
        })
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#pass_baru_dosen").change(function(){
            var passbaru = $(this).val();
            var passbaruulang = $("#pass_baru_dosen_ulang").val();
            var passlama = $("#pass_lama_dosen").val();
            if (passlama == passbaru) {
              document.getElementById("password_baru_dosen_alert").innerText = "Password Baru tidak boleh sama dengan Password Lama";
              document.getElementById("btn_ganti_pass_dosen").disabled = true;
              document.getElementById("pass_baru_dosen_ulang").value = "";
              document.getElementById("ulang_password_baru_dosen_alert").innerText = "";
            } else if (passbaru == passbaruulang) {
                document.getElementById("password_baru_dosen_alert").innerText = "";
                document.getElementById("btn_ganti_pass_dosen").disabled = true;
                document.getElementById("pass_baru_dosen_ulang").value = "";
                document.getElementById("ulang_password_baru_dosen_alert").innerText = "";
            } else {
              document.getElementById("password_baru_dosen_alert").innerText = "";
              document.getElementById("btn_ganti_pass_dosen").disabled = false;
              document.getElementById("pass_baru_dosen_ulang").value = "";
              document.getElementById("ulang_password_baru_dosen_alert").innerText = "";
            }
          })
        })
      </script>
      <script type="text/javascript">
        $(document).ready(function(){
          $("#pass_baru_dosen_ulang").change(function(){
            var passbaruulang = $(this).val();
            var passbaru = $("#pass_baru_dosen").val();
            if (passbaruulang == passbaru) {
              document.getElementById("ulang_password_baru_dosen_alert").innerText = "";
              document.getElementById("btn_ganti_pass_dosen").disabled = false;
            } else {
              document.getElementById("ulang_password_baru_dosen_alert").innerText = "Password tidak sama";
              document.getElementById("btn_ganti_pass_dosen").disabled = true;
            }
          })
        })
      </script>
    </div>

  </div>
