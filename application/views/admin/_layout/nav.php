<?php $controller = $this->uri->segment(1); $modul = $this->uri->segment(2); $params = $this->uri->segment(3); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Abdillah Satari</p>
        <i>D42114000</i>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- kps navigation -->
    <?php if($this->session->userdata('role') == 'kps'):?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($modul == 'daftarJudul' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>kps/daftarJudul">
            <i class="fa fa-file-text"></i> <span>Daftar Judul</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="<?= ($modul == 'seminarHasil' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>kps/seminarHasil">
            <i class="fa fa-file-text-o"></i> <span>Seminar Hasil</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="<?= ($modul == 'ujianSkripsi' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>kps/ujianSkripsi">
            <i class="fa fa-mortar-board"></i> <span>Ujian Skripsi</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="treeview <?= ($modul == 'persetujuanJadwalHasil' || $modul == 'persetujuanJadwalTutup' || $modul == 'komunikasiJadwalHasil' || $modul == 'komunikasiJadwalTutup' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-comments"></i> <span>Persetujuan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'persetujuanJadwalHasil' || $modul == 'komunikasiJadwalHasil' ? 'active' : '') ?>"><a href="<?= base_url() ?>kps/persetujuanJadwalHasil"><i class="fa fa-circle-o"></i>Seminar Hasil</a></li>
            <li class="<?= ($modul == 'persetujuanJadwalTutup' || $modul == 'komunikasiJadwalTutup' ? 'active' : '') ?>"><a href="<?= base_url() ?>kps/persetujuanJadwalTutup"><i class="fa fa-circle-o"></i>Ujian Skripsi</a></li>
          </ul>
        </li>
        <li class="<?= ($modul == 'daftarMahasiswa' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>kps/daftarMahasiswa">
            <i class="fa fa-user"></i> <span>Daftar Mahasiswa</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="<?= ($modul == 'daftarDosen' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>kps/daftarDosen">
            <i class="fa fa-tripadvisor"></i> <span>Daftar Dosen</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
      </ul>
    <!-- end of kps navigation -->
    <!-- mahasiswa navigation -->
    <?php elseif($this->session->userdata('role') == 'mahasiswa'):?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($modul == 'beranda' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>mahasiswa/beranda">
            <i class="fa fa-info"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="<?= ($modul == 'tambahAktivitas' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>mahasiswa/tambahAktivitas">
            <i class="fa fa-circle-o"></i> <span>Bimbingan</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="<?= ($modul == 'kartuKontrol' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>mahasiswa/kartuKontrol">
            <i class="fa fa-file-text"></i> <span>Kartu Kontrol</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
      </ul>
    <!-- end of mahasiswa navigation -->
    <!-- dosen navigation -->
    <?php elseif($this->session->userdata('role') == 'dosen'):?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($modul == 'dashboard' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>dosen/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="treeview <?= ($modul == 'pembimbingIn' || $modul == 'pembimbingOut' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Pembimbing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'pembimbingIn' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/pembimbingIn"><i class="fa fa-circle-o"></i>Aktif</a></li>
            <li class="<?= ($modul == 'pembimbingOut' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/pembimbingOut"><i class="fa fa-circle-o"></i>Selesai</a></li>
          </ul>
        </li>
        <li class="treeview <?= ($modul == 'pengujiIn' || $modul == 'pengujiOut' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Penguji</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'pengujiIn' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/pengujiIn"><i class="fa fa-circle-o"></i>Aktif</a></li>
            <li class="<?= ($modul == 'pengujiOut' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/pengujiOut"><i class="fa fa-circle-o"></i>Selesai</a></li>
          </ul>
        </li>
        <li class="treeview <?= ($modul == 'penugasanIn' || $modul == 'penugasanConf' || $modul == 'penugasanOut' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Penugasan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'penugasanIn' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/penugasanIn"><i class="fa fa-circle-o"></i>Upcoming</a></li>
            <li class="<?= ($modul == 'penugasanConf' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/penugasanConf"><i class="fa fa-circle-o"></i>Confirmed</a></li>
            <li class="<?= ($modul == 'penugasanOut' ? 'active' : '') ?>"><a href="<?= base_url() ?>dosen/penugasanOut"><i class="fa fa-circle-o"></i>Done</a></li>
          </ul>
        </li>
        <li class="<?= ($modul == 'bimbinganMasuk' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>dosen/bimbinganMasuk">
            <i class="fa fa-comments-o"></i> <span>Bimbingan</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
      </ul>
    <?php endif; ?>
  </section>
  <!-- /.sidebar -->
</aside>
