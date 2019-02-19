<?php
include ('fungsi/config.php');
session_start();
$idsession = $_SESSION['user'];
if(empty($_SESSION['user']))
{
  header('location:beranda.php');
}
else {
  $data = mysqli_query($koneksi,"select * from tb_login INNER JOIN tb_profil ON tb_login.id_login = tb_profil.id_login  where tb_login.id_login = $idsession");
  while($datalogin = mysqli_fetch_array($data))
  {
    $id = $datalogin['id_login'];
    $username = $datalogin['username'];
    $namalengkap = $datalogin['nama_lengkap'];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kecamatan Panggarangan | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php
  include "menu.php";
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-13 col-xs-12">
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pengaturan</h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profil">Data Profil</a></li>
                <li><a data-toggle="tab" href="#privasi">Privasi</a></li>
              </ul>
              <div class="tab-content">
                <div id="profil" class="tab-pane fade in active">
                  <form action="proses_editprofil.php" method="post">
                    <?php
                    $data = mysqli_query($koneksi,"select * from tb_profil where id_login = '$id' ");
                    while ($dataprofil = mysqli_fetch_array($data))
                    {
                    ?>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $dataprofil['nama_lengkap'];?>">
                      <input name="id" type="hidden" value="<?php echo $dataprofil['id_login'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input type="text" name="tmpt_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $dataprofil['tmpt_lahir'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $dataprofil['tgl_lahir'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input type="number" name="no_telp" class="form-control" placeholder="No Telepon" value="<?php echo $dataprofil['no_telp'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $dataprofil['email'];?>">
                    </div>
                    <button type="submit" name="inputprofil" class="btn btn-info pull-right">Simpan</button>
                    <?php
                    }
                    ?>
                  </form>
                </div>
                <div id="privasi" class="tab-pane fade">
                  <form action="proses_editprofil.php" method="post">
                    <?php
                    $data = mysqli_query($koneksi,"select * from tb_login where id_login = '$id' ");
                    while ($dataprivasi = mysqli_fetch_array($data))
                    {
                    ?>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $dataprivasi['username'];?>" readonly>
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"> </i>
                      </span>
                      <input type="password" class="form-control" name="password" placeholder="Password Kosong Bearti Mengunakan Password Yang Lama" value="">
                    </div>
                    <button type="submit" name="inputprivasi" class="btn btn-info pull-right">Simpan</button>
                    <?php
                    }
                    ?>
                  </form>
                </div>
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include 'footer.php';
  ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
}
?>