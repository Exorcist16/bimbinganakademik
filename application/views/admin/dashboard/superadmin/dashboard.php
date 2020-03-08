<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3 name="departemen_value"><?php foreach ($jmldepartemen as $jmldepartemen) {?>
                <?= $jmldepartemen->jumlah_departemen;?>
              <?php }?></h3>

              <p>Jumlah Departemen</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <div href="#" class="small-box-footer">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 name="kps_value"><?php foreach ($jmlkps as $jmlkps) {?>
                <?= $jmlkps->jumlah_kps;?>
              <?php }?></h3>

              <p>Jumlah KPS</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <div href="#" class="small-box-footer">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="small-box bg-blue">
            <div class="inner">
              <h3 name="room_value"><?php foreach ($jmlruangan as $jmlruangan) {?>
                <?= $jmlruangan->jumlah_ruangan;?>
              <?php }?></h3>

              <p>Total Ruangan Seminar</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <div href="#" class="small-box-footer">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3 name="dosen_value"><?php foreach ($jmldosen as $jmldosen) {?>
                <?= $jmldosen->jumlah_dosen;?>
              <?php }?></h3>

              <p>Total Dosen</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <div href="#" class="small-box-footer">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3 name="s1_value"><?php foreach ($jmls1 as $jmls1) {?>
                <?= $jmls1->jumlah_s1;?>
              <?php }?></h3>

              <p>Total Mahasiswa S1</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <div href="#" class="small-box-footer">
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3 name="s2s3_value"><?php foreach ($jmls23 as $jmls23) {?>
                <?= $jmls23->jumlah_s23;?>
              <?php }?></h3>

              <p>Total Mahasiswa S2 & S3</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <div href="#" class="small-box-footer">
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- /.content -->
  </div>
