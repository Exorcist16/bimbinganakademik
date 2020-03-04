<?php $controller = $this->uri->segment(1); $modul = $this->uri->segment(2); $params = $this->uri->segment(3); ?>
<header class="main-header">
  <style type="text/css">
    .logo .logo-mini img{
      height: 20% !important;
    }
  </style>
  <!-- Logo -->
  <a href="index2.html" class="logo normal-logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- <span class="logo-mini"><b>A</b>LT</span> -->
    <span class="logo-mini"><img src="<?=base_url('assets/')?>dist/img/unhas.webp"></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="<?=base_url('assets/')?>dist/img/unhas-cover.png"></span>
  </a>

  <!-- kps navigation -->
  <?php if($this->session->userdata('role') == 'kps'):?>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <a href="#" class="mobile-logo">
      <img style="width: auto; height: 40px;" src="<?=base_url('assets/')?>dist/img/unhas-cover.png">
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                    page and may cause design problems
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-users text-red"></i> 5 new members joined
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class="fa fa-user text-red"></i> You changed your username
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">

              <p>
                <?php echo $this->session->userdata('username'); ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-pass-kps" id="ganti_pass_kps" data-id="">Ganti Password</button>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url(); ?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>

  </nav>

  <!-- mahasiswa navigation -->
  <?php elseif($this->session->userdata('role') == 'mahasiswa'):?>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="#" class="mobile-logo">
        <img style="width: auto; height: 40px;" src="<?=base_url('assets/')?>dist/img/unhas-cover.png">
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_user');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_user');?>
                  <small><?php echo $this->session->userdata('username');?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url() ?>auth/profil_mahasiswa" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="<?php echo base_url(); ?>auth/logout" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            <a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>

  <!-- dosen navigation -->
  <?php elseif($this->session->userdata('role') == 'dosen'):?>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="#" class="mobile-logo">
        <img style="width: auto; height: 40px;" src="<?=base_url('assets/')?>dist/img/unhas-cover.png">
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?=base_url('assets/')?>dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('nama_user');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets/')?>dist/img/user_profil.png  " class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('nama_user');?>
                  <small><?php echo $this->session->userdata('username');?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?= base_url() ?>auth/profil_dosen" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="<?php echo base_url(); ?>auth/logout" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            <a href="<?php echo base_url(); ?>auth/logout"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>

  <!-- superadmin navigation -->
  <?php elseif($this->session->userdata('role') == 'superadmin'):?>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="#" class="mobile-logo">
        <img style="width: auto; height: 40px;" src="<?=base_url('assets/')?>dist/img/unhas-cover.png">
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Superadmin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets/')?>dist/img/user_profil.png" class="img-circle" alt="User Image">

                <p>
                  Superadmin
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#modal-pass-superadmin" id="ganti_pass_superadmin" data-id="superadmin">Ganti Password</button>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
    <?php endif; ?>

</header>
<div class="modal fade" id="modal-pass-superadmin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ganti Password Superadmin</h4>
      </div>
      <form role="form" action="<?php echo base_url().'auth/ganti_pass';?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Password Lama</label>
            <input type="password" class="form-control" name="pass_lama_superadmin" id="pass_lama_superadmin" style="width: 100%;" required>
            <h6 id="password_lama_superadmin_alert" class="help-block text-red"></h6>
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control" name="pass_baru" id="pass_baru" disabled>
            <h6 id="password_baru_superadmin_alert" class="help-block text-red"></h6>
          </div>
          <div class="form-group">
            <label>Ulangi Password Baru</label>
            <input type="password" class="form-control" name="pass_baru_superadmin_ulang" id="pass_baru_superadmin_ulang" disabled>
            <h6 id="ulang_password_baru_superadmin_alert" class="help-block text-red"></h6>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button id="btn_ganti_pass_superadmin" type="submit" class="btn btn-primary" disabled>Ganti Password</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>

  <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#pass_lama_superadmin").change(function(){
        var pass = $(this).val();
        console.log(pass);
        var id = "superadmin";
        $.ajax({
          url: "<?=base_url();?>/auth/get_pass",
          method: "POST",
          dataType: "JSON",
          data: {
            id: id,
            pass: pass
          },
          success: function(data){
            console.log(data.password);
            console.log(data.passlama);
            if (data.password != data.passlama) {
              document.getElementById("password_lama_superadmin_alert").innerText = "password lama salah";
              document.getElementById("btn_ganti_pass_superadmin").disabled = true;
              document.getElementById("pass_baru").disabled = true;
              document.getElementById("pass_baru_superadmin_ulang").disabled = true;
            } else {
              document.getElementById("password_lama_superadmin_alert").innerText = "";
              document.getElementById("btn_ganti_pass_superadmin").disabled = true;
              document.getElementById("pass_baru").disabled = false;
              document.getElementById("pass_baru").required = true;
              document.getElementById("pass_baru_superadmin_ulang").disabled = false;
              document.getElementById("pass_baru_superadmin_ulang").required = true;
            }
          }
        })
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#pass_baru").change(function(){
        var passbaru = $(this).val();
        var passbaruulang = $("#pass_baru_superadmin_ulang").val();
        var passlama = $("#pass_lama_superadmin").val();
        if (passlama == passbaru) {
          document.getElementById("password_baru_superadmin_alert").innerText = "Password Baru tidak boleh sama dengan Password Lama";
          document.getElementById("btn_ganti_pass_superadmin").disabled = true;
          document.getElementById("pass_baru_superadmin_ulang").value = "";
          document.getElementById("ulang_password_baru_superadmin_alert").innerText = "";
        } else if (passbaru == passbaruulang) {
            document.getElementById("password_baru_superadmin_alert").innerText = "";
            document.getElementById("btn_ganti_pass_superadmin").disabled = true;
            document.getElementById("pass_baru_superadmin_ulang").value = "";
            document.getElementById("ulang_password_baru_superadmin_alert").innerText = "";
        } else {
          document.getElementById("password_baru_superadmin_alert").innerText = "";
          document.getElementById("btn_ganti_pass_superadmin").disabled = false;
          document.getElementById("pass_baru_superadmin_ulang").value = "";
          document.getElementById("ulang_password_baru_superadmin_alert").innerText = "";
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#pass_baru_superadmin_ulang").change(function(){
        var passbaruulang = $(this).val();
        var passbaru = $("#pass_baru").val();
        if (passbaruulang == passbaru) {
          document.getElementById("ulang_password_baru_superadmin_alert").innerText = "";
          document.getElementById("btn_ganti_pass_superadmin").disabled = false;
        } else {
          document.getElementById("ulang_password_baru_superadmin_alert").innerText = "Password tidak sama";
          document.getElementById("btn_ganti_pass_superadmin").disabled = true;
        }
      })
    })
  </script>
</div>

<div class="modal fade" id="modal-pass-kps">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Ganti Password KPS <?php echo $this->session->userdata('username');?></h4>
      </div>
      <form role="form" action="<?php echo base_url().'auth/ganti_pass_kps';?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Password Lama</label>
            <input type="password" class="form-control" name="pass_lama_kps" id="pass_lama_kps" style="width: 100%;" required>
            <h6 id="password_lama_kps_alert" class="help-block text-red"></h6>
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control" name="pass_baru_kps" id="pass_baru_kps" disabled>
            <h6 id="password_baru_kps_alert" class="help-block text-red"></h6>
          </div>
          <div class="form-group">
            <label>Ulangi Password Baru</label>
            <input type="password" class="form-control" name="pass_baru_kps_ulang" id="pass_baru_kps_ulang" disabled>
            <h6 id="ulang_password_baru_kps_alert" class="help-block text-red"></h6>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button id="btn_ganti_pass_kps" type="submit" class="btn btn-primary" disabled>Ganti Password</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#pass_lama_kps").change(function(){
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
              document.getElementById("password_lama_kps_alert").innerText = "password lama salah";
              document.getElementById("btn_ganti_pass_kps").disabled = true;
              document.getElementById("pass_baru_kps").disabled = true;
              document.getElementById("pass_baru_kps_ulang").disabled = true;
            } else {
              document.getElementById("password_lama_kps_alert").innerText = "";
              document.getElementById("btn_ganti_pass_kps").disabled = true;
              document.getElementById("pass_baru_kps").disabled = false;
              document.getElementById("pass_baru_kps").required = true;
              document.getElementById("pass_baru_kps_ulang").disabled = false;
              document.getElementById("pass_baru_kps_ulang").required = true;
            }
          }
        })
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#pass_baru_kps").change(function(){
        var passbaru = $(this).val();
        var passbaruulang = $("#pass_baru_kps_ulang").val();
        var passlama = $("#pass_lama_kps").val();
        if (passlama == passbaru) {
          document.getElementById("password_baru_kps_alert").innerText = "Password Baru tidak boleh sama dengan Password Lama";
          document.getElementById("btn_ganti_pass_kps").disabled = true;
          document.getElementById("pass_baru_kps_ulang").value = "";
          document.getElementById("ulang_password_baru_kps_alert").innerText = "";
        } else if (passbaru == passbaruulang) {
            document.getElementById("password_baru_kps_alert").innerText = "";
            document.getElementById("btn_ganti_pass_kps").disabled = true;
            document.getElementById("pass_baru_kps_ulang").value = "";
            document.getElementById("ulang_password_baru_kps_alert").innerText = "";
        } else {
          document.getElementById("password_baru_kps_alert").innerText = "";
          document.getElementById("btn_ganti_pass_kps").disabled = false;
          document.getElementById("pass_baru_kps_ulang").value = "";
          document.getElementById("ulang_password_baru_kps_alert").innerText = "";
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#pass_baru_kps_ulang").change(function(){
        var passbaruulang = $(this).val();
        var passbaru = $("#pass_baru_kps").val();
        if (passbaruulang == passbaru) {
          document.getElementById("ulang_password_baru_kps_alert").innerText = "";
          document.getElementById("btn_ganti_pass_kps").disabled = false;
        } else {
          document.getElementById("ulang_password_baru_kps_alert").innerText = "Password tidak sama";
          document.getElementById("btn_ganti_pass_kps").disabled = true;
        }
      })
    })
  </script>
</div>
