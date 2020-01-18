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
              <h3 class="box-title">Konfirmasi Ujian Skripsi</h3>
              <div class="box-tools pull-right">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown">Jenjang Strata
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Jenjang S1</a></li>
                    <li><a href="#">Jenjang S2</a></li>
                    <li><a href="#">Jenjang S3</a></li>
                  </ul>
                </div>
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
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <?php foreach ($konfirmasitutup as $konfirmasitutup) { ?>
                  <tbody>
                    <tr>
                      <td><?=$konfirmasitutup->nim;?></td>
                      <td><?=$konfirmasitutup->nama;?></td>
                      <td><?=$konfirmasitutup->seminar_tanggal;?></td>
                      <td><?=$konfirmasitutup->waktu_mulai;?> - <?=$konfirmasitutup->waktu_selesai;?> WITA</td>
                      <td><?=$konfirmasitutup->seminar_tempat;?></td>
                      <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tutup-selesai" id="tutup_selesai" data-id="<?=$konfirmasitutup->seminar_id;?>"><i class="fa fa-fw  fa-check-square-o"></i></button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tutup-batal" id="tutup_batal" data-id="<?=$konfirmasitutup->seminar_id;?>"><i class="fa fa-fw fa-remove"></i></button>
                      </td>
                    </tr>
                  </tbody>
                <?php } ?>
              </table>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="modal modal-success fade" id="modal-tutup-selesai">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Konfirmasi Ujian Skripsi</h4>
                </div>
                <div class="modal-body">
                  <p id="ket_tutup_selesai"></p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_tutup_selesai">
                  <button type="button" class="btn btn-outline">Ya, Lanjutkan</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#tutup_selesai", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_konfirmasi_tutup",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(id)
                  document.getElementById("ket_tutup_selesai").innerText='Ujian Skripsi mahasiswa '+data[0].nama+' telah dilaksanakan?';
                  document.getElementById("button_tutup_selesai").href='<?=base_url();?>/Kps/tutup_selesai/'+data[0].seminar_id+'/'+data[0].seminar_nim;
                }
              })
            })
          </script>

          <div class="modal modal-danger fade" id="modal-tutup-batal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Batalkan Ujian Skripsi</h4>
                </div>
                <div class="modal-body">
                  <p id="ket_tutup_batal"></p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_tutup_batal">
                  <button type="button" class="btn btn-outline">Ya, Batalkan</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script type="text/javascript">
            $(document).on("click", "#tutup_batal", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_konfirmasi_tutup",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  document.getElementById("ket_tutup_batal").innerText='Ujian Skripsi mahasiswa '+data[0].nama+' akan dibatalkan?';
                  document.getElementById("button_tutup_batal").href='<?=base_url();?>/Kps/tutup_batal/'+data[0].seminar_id+'/'+data[0].seminar_nim;
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
