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
              <h3 class="box-title">Konfirmasi Seminar Hasil</h3>
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
                <tbody>
                  <?php foreach ($konfirmasihasil as $konfirmasihasil): ?>
                    <tr>
                      <td><?=$konfirmasihasil->nim;?></td>
                      <td><?=$konfirmasihasil->nama;?></td>
                      <td><?=$konfirmasihasil->seminar_tanggal;?></td>
                      <td><?=$konfirmasihasil->waktu_mulai;?> - <?=$konfirmasihasil->waktu_selesai;?> WITA</td>
                      <td><?=$konfirmasihasil->seminar_tempat;?></td>
                      <td>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-hasil-selesai" id="hasil_selesai" data-id="<?=$konfirmasihasil->seminar_id;?>"><i class="fa fa-fw  fa-check-square-o"></i></button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="modal modal-success fade" id="modal-hasil-selesai">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Konfirmasi Seminar Hasil</h4>
                </div>
                <div class="modal-body">
                  <p id="ket_hasil_selesai"></p>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak, Kembali</button>
                <a href="#" id="button_hasil_selesai">
                  <button type="button" class="btn btn-outline">Ya, Lanjutkan</button>
                </a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

          <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
          <script type="text/javascript">
            $(document).on("click", "#hasil_selesai", function(){
              var id = $(this).attr('data-id')
              $.ajax({
                url: "<?=base_url();?>/Kps/data_hasil",
                method: "POST",
                dataType: "JSON",
                data: { id: id},
                success: function(data){
                  console.log(id)
                  document.getElementById("ket_hasil_selesai").innerText='Seminar hasil mahasiswa '+data[0].nama+' telah dilaksanakan?';
                  document.getElementById("button_hasil_selesai").href='<?=base_url();?>/Kps/hasil_selesai/'+data[0].seminar_id+'/'+data[0].seminar_nim;
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
