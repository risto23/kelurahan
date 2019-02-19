<?php
date_default_timezone_set('Asia/Jakarta');
include ('fungsi/config.php');
include ('fungsi/fungsi_hitungvisitor.php');
include ('fungsi/fungsi_tanggal.php');
session_start();
 $date = date('Y-m-d');
$idsession = $_SESSION['user'];
if(empty($_SESSION['user']))
{
  header('location:index.php');
}
else {
  $data = mysqli_query($koneksi,"select * from tb_login INNER JOIN tb_profil ON tb_login.id_login = tb_profil.id_login  where tb_login.id_login = $idsession");
  while($datalogin = mysqli_fetch_array($data))
  {
    $id = $datalogin['id_login'];
    $username = $datalogin['username'];
    $namalengkap = $datalogin['nama_lengkap'];
  }
  $jumlahuser = mysqli_num_rows(mysqli_query($koneksi,"select * from tb_login"));
  $jumlahnews = mysqli_num_rows(mysqli_query($koneksi,"select * from tb_news"));
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
  <style>
    .slimScrollDiv , .box-body{
      height: 500px !important;
    }
  </style>

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
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Buku Tamu</h3>
            </div>
            <div class="box-body chat" id="chat-box">
            <?php
            $databukutamu = mysqli_query($koneksi,"select * from tb_bukutamu INNER JOIN tb_balasan_bukutamu ON tb_bukutamu.id_bukutamu = tb_balasan_bukutamu.id_bukutamu");
            while ($listdata = mysqli_fetch_array($databukutamu)) {
            ?>
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/avatar.png" alt="user image" class="online">

                <p class="message">
                  <a href="javascript:void(0);" class="name">
                    <small class="text-muted pull-right">
                      <?php echo fungsi_tgl($listdata['date'])." &#160; &#160;".$listdata['time'];?>
                    </small>
                    <?php echo $listdata['nama'];?>
                  </a>
                  <?php echo $listdata['pesan'];?>
                </p>
                <div class="attachment">
                  <h4>Balasan:</h4>
                  <form action="proses_balasbukutamu.php" method="post">
                    <textarea name="pesan_balasan" rows="3" style="width:100%;resize: none;"><?php echo $listdata['pesan_balasan'] ?></textarea>
                    <input type="hidden" name="id_bukutamu" value="<?php echo $listdata['id_bukutamu'];?>">
                    <input type="hidden" name="id_login" value="<?php echo $_SESSION['user']; ?>">
                    <a href="proses_hapusbukutamu.php?id=<?php echo $listdata['id_bukutamu'] ?>" class="btn btn-default" style="float: right; margin-left: 10px;"> Hapus </a>
                    <button type="submit" class="btn btn-primary" style="float: right; ">Balas</button>
                    
                  </form>
                  <div class="pull-right">
                    
                  </div>
                </div>
                <!-- /.attachment -->
              </div>
              <!-- /.item -->
            <?php
            }
            ?>
              
            </div>
            <!-- /.chat -->
          </div>
          <!-- /.box (chat box) -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlahuser; ?></h3>
              <p>Total User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="tampil_adduser.php" class="small-box-footer"> Add User</a>
          </div>
          <div class="small-box bg-light-blue">
            <div class="inner" style="float: left;">
              <h3><?php echo $todayvisitor; ?></h3>

              <p>Today Visitor</p>
            </div>
            <div class="inner" style="text-align: right;">
              <h3><?php echo $totalvisitor; ?></h3>

              <p>Total Visitor</p>
            </div>
            <a href="#" style="cursor:text;" class="small-box-footer"> <?php echo fungsi_tgl($date);?></a>
          </div>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jumlahnews; ?></h3>
              <p>Total Berita / News</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="news.php" class="small-box-footer"> More</a>
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

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