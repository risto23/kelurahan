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
              <h3 class="box-title">Video</h3>
            </div>
            <div class="box-body">
              <div>
                <?php
                $datalist = mysqli_query($koneksi,"select * from tb_video");
                $cekdata = mysqli_num_rows($datalist);
                if($cekdata >= 1)
                {
                  while ($datavideo = mysqli_fetch_array($datalist) ) {
                  ?>
                    <form action="proses_video.php" method="post">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-calendar"> </i>
                        </span>
                        <input readonly type="date" name="date_video" class="form-control" placeholder="Tanggal Video" value="<?php echo date('Y-m-d');?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-video-camera"> </i>
                        </span>
                        <input name="judul_video" type="text" class="form-control" placeholder="Judul Video" value="<?php echo $datavideo['judul_video'];?>">
                        <input name="id_video" type="hidden" value="<?php echo $datavideo['id_video'];?>">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-link"> </i>
                        </span>
                        <input type="url" name="url_video" class="form-control" placeholder="Url Video Youtube" value="<?php echo $datavideo['url_video'];?>">
                      </div>
                      <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-user" title="Penulis Foto"> </i>
                          </span>
                          <select name="id_login" class="form-control">
                            <?php
                            $dataprofil = mysqli_query($koneksi,"select * from tb_profil");
                            while ($data=mysqli_fetch_array($dataprofil)) {
                              if($data['id_login'] == $datavideo['id_login'] )
                              {
                            ?>
                              <option selected value="<?php echo $data['id_login']; ?>"><?php echo $data['nama_lengkap'] ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                      <a href="proses_video.php?proses_hapus=<?php echo $datavideo['id_video'];?>" class="btn btn-danger" style="margin-left: 10px; float: right;"> Hapus </a>
                      <button type="submit" name="editvideo" class="btn btn-info pull-right">Simpan</button>
                    </form>
                  <?php
                  }
                }
                else
                {
                ?>
                  <form action="proses_video.php" method="post">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar"> </i>
                      </span>
                      <input type="date" readonly name="date_video" class="form-control" placeholder="Tanggal Video" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-video-camera"> </i>
                      </span>
                      <input name="judul_video" type="text" class="form-control" placeholder="Judul Video">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-link"> </i>
                      </span>
                      <input type="url" name="url_video" class="form-control" placeholder="Url Video Youtube">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Penulis Foto"> </i>
                        </span>
                        <select name="id_login" class="form-control">
                          <option value="<?php echo $id; ?>"><?php echo $namalengkap; ?></option>
                        </select>
                      </div>
                    <button type="submit" name="inputvideo" class="btn btn-info pull-right">Simpan</button>
                  </form>
                <?php
                }
                ?>
                </div>
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