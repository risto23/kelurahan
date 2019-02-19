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
              <h3 class="box-title">Hub. Kami</h3>
            </div>
            <div class="box-body">
              <?php
              $data = mysqli_query($koneksi,"select * from tb_hubkami LIMIT 1");
              $ceknilai = mysqli_num_rows($data);
              if ($ceknilai >= 1)
              {
                while($datahub=mysqli_fetch_array($data))
                {
                ?>
                <form action="proses_hubkami.php" method="post">
                  <div class="input-group">
                    <span class="input-group-addon">
                      Penulis
                    </span>
                    <select name="id_login" class="form-control">
                    <?php
                          $dataprofil1 = mysqli_query($koneksi,"select * from tb_profil");
                          while ($dataprofil=mysqli_fetch_array($dataprofil1)) {
                            if($dataprofil['id_login'] == $datahub['id_login']['id_login'] )
                            {
                          ?>
                            <option selected value="<?php echo $dataprofil['id_login']; ?>"><?php echo $dataprofil['nama_lengkap'] ?></option>
                          <?php
                            }
                          }
                          ?>
                    </select>
                    <input type="hidden" name="id_hubkami" value="<?php echo $datahub['id_hubkami'];?>">
                  </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        Tanggal
                      </span>
                      <input type="date" readonly value="<?php echo date('Y-m-d');?>" name="date_hubkami" class="form-control">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          Nama Tempat
                      </span>
                      <input name="nama_hubkami" type="text" class="form-control" placeholder="Nama Tempat" value="<?php echo $datahub['nama_hubkami'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          Alamat Email
                      </span>
                      <input name="email_hubkami" type="email" class="form-control" placeholder="Alamat Email" value="<?php echo $datahub['email_hubkami'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          Nomer Telepon
                      </span>
                      <input name="telp_hubkami" type="text" class="form-control" placeholder="Nomer Telepon" value="<?php echo $datahub['telp_hubkami'];?>">
                    </div>
                    <textarea class="form-control" name="alamat_hubkami" cols="30" rows="10" style="resize: none;" placeholder="Alamat Lengkap"><?php echo $datahub['alamat_hubkami'];?></textarea>
                    <br>
                    <a href="tampil_contact.php" class="btn btn-default" style="margin-left:10px; float:right;"> Batal </a>
                    <a href="proses_hubkami.php?hapus_proses=<?php echo $datahub['id_hubkami'];?>" class="btn btn-danger" style="margin-left:10px; float:right;"> Hapus </a>
                    <button type="submit" name="edithubkami" class="btn btn-info pull-right">Simpan</button>
                </form>
                <?php
                }
              }
              else
              {
              ?>
                <form action="proses_hubkami.php" method="post">
                  <div class="input-group">
                    <span class="input-group-addon">
                      Penulis
                    </span>
                    <select name="id_login" class="form-control">
                      <option value="<?php echo $id; ?>"><?php echo $namalengkap; ?></option>
                    </select>
                  </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        Tanggal
                      </span>
                      <input type="date" readonly value="<?php echo date('Y-m-d');?>" name="date_hubkami" class="form-control">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          Nama Tempat
                      </span>
                      <input name="nama_hubkami" type="text" class="form-control" placeholder="Nama Tempat">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          Alamat Email
                      </span>
                      <input name="email_hubkami" type="email" class="form-control" placeholder="Alamat Email">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                          Nomer Telepon
                      </span>
                      <input name="telp_hubkami" type="text" class="form-control" placeholder="Nomer Telepon">
                    </div>
                    <textarea class="form-control" name="alamat_hubkami" cols="30" rows="10" style="resize: none;" placeholder="Alamat Lengkap"></textarea>
                    <br>
                    <a href="tampil_contact.php" class="btn btn-default" style="margin-left:10px; float:right;"> Batal </a>
                    <button type="submit" name="inputhubkami" class="btn btn-info pull-right">Simpan</button>
                </form>
              <?php
              }
              ?>
                
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