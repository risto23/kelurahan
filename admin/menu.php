<header class="main-header">
    <!-- Logo -->
    <a href="beranda.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Kec</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kec.</b> Panggarangan</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $namalengkap; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
                <p>
                  <?php echo $namalengkap; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="tampil_profil.php" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="proses_keluar.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $namalengkap; ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="beranda.php">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tampil_profilkecamatan.php"><i class="fa fa-circle-o"></i>Profil Kecamatan</a></li>
            <li><a href="tampil_visimisi.php"><i class="fa fa-circle-o"></i>Visi & Misi</a></li>
            <li><a href="tampil_rencanakerja.php"><i class="fa fa-circle-o"></i>Rencana Kerja</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Organisasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="tampil_strukturorganisasi.php">
                <i class="fa fa-sitemap"></i> <span>Struktur Organisasi</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-server"></i> <span>Sumber Daya</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="tampil_daftargarapan.php"><i class="fa fa-circle-o"></i>Daftar Garapan Bina Tani</a></li>
            <li><a href="tampil_kajianlaporan.php"><i class="fa fa-circle-o"></i>Kajian dan Laporan</a></li>
          </ul>
        </li>
        <li>
          <a href="news.php">
            <i class="fa fa-newspaper-o"></i> <span>News</span>
          </a>
        </li>
        <li>
          <a href="gallery.php">
            <i class="fa fa-camera"></i> <span>Gallery</span>
          </a>
        </li>
        <li>
          <a href="video.php">
            <i class="fa fa-youtube"></i> <span>Video</span>
          </a>
        </li>
        <li>
          <a href="tampil_contact.php">
            <i class="fa fa-phone"></i> <span>Hub. Kami</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>