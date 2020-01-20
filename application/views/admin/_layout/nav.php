<?php $controller = $this->uri->segment(1); $modul = $this->uri->segment(2); $params = $this->uri->segment(3); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->

    <!-- kps navigation -->
    <?php if($this->session->userdata('role') == 'kps'):?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nama KPS</p>
        </div>
      </div>
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
        <li class="treeview <?= ($modul == 'persetujuanJadwalHasil' || $modul == 'persetujuanJadwalTutup' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-check-square-o"></i> <span>Konfirmasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'persetujuanJadwalHasil' ? 'active' : '') ?>"><a href="<?= base_url() ?>kps/persetujuanJadwalHasil"><i class="fa fa-circle-o"></i>Seminar Hasil</a></li>
            <li class="<?= ($modul == 'persetujuanJadwalTutup' ? 'active' : '') ?>"><a href="<?= base_url() ?>kps/persetujuanJadwalTutup"><i class="fa fa-circle-o"></i>Ujian Skripsi</a></li>
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
            <i class="fa fa-user"></i> <span>Daftar Dosen</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="treeview <?= ($modul == 'masterDataWaktu' || $modul == 'masterDataTempat' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'masterDataWaktu' ? 'active' : '') ?>"><a href="<?= base_url() ?>kps/masterDataWaktu"><i class="fa fa-circle-o"></i>Waktu Ujian</a></li>
            <li class="<?= ($modul == 'masterDataTempat' ? 'active' : '') ?>"><a href="<?= base_url() ?>kps/masterDataTempat"><i class="fa fa-circle-o"></i>Tempat Ujian</a></li>
          </ul>
        </li>
      </ul>
    <!-- end of kps navigation -->

    <!-- mahasiswa navigation -->
    <?php elseif($this->session->userdata('role') == 'mahasiswa'):?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nama Mahasiswa</p>
          <i>Nim Mahasiswa</i>
        </div>
      </div>
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
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Nama Dosen</p>
          <i>Nip Dosen</i>
        </div>
      </div>
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

    <!-- superadmin navigation -->
    <?php elseif($this->session->userdata('role') == 'superadmin'):?>
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Superadmin</p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= ($modul == 'dashboard' ? 'active' : '') ?>">
          <a href="<?= base_url() ?>superadmin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>
        <li class="treeview <?= ($modul == 'masterDataDepartemen' || $modul == 'masterDataJurusan' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-archive"></i> <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'masterDataJurusan' ? 'active' : '') ?>"><a href="<?= base_url() ?>superadmin/masterDataJurusan"><i class="fa fa-circle-o"></i>Jurusan</a></li>
            <li class="<?= ($modul == 'masterDataDepartemen' ? 'active' : '') ?>"><a href="<?= base_url() ?>superadmin/masterDataDepartemen"><i class="fa fa-circle-o"></i>Departemen</a></li>
          </ul>
        </li>
        <li class="treeview <?= ($modul == 'manajemenKps' ? 'active' : '') ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= ($modul == 'manajemenKps' ? 'active' : '') ?>"><a href="<?= base_url() ?>superadmin/manajemenKps"><i class="fa fa-circle-o"></i>KPS</a></li>
          </ul>
        </li>
      </ul>
    <?php endif; ?>
  </section>
  <!-- /.sidebar -->
</aside>
