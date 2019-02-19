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
     <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
              <h3 class="box-title">Profil Kecamatan</h3>
            </div>
            <div class="box-body">
              <div>
                <?php
                $datalist = mysqli_query($koneksi,"select * from tb_profilkec");
                $cekdata = mysqli_num_rows($datalist);
                if($cekdata >= 1)
                {
                  while ($dataprofilkec = mysqli_fetch_array($datalist) ) {
                  ?>
                    <form action="proses_profilkecamatan.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-book"> </i>
                      </span>
                      <input name="judul_profil" type="text" class="form-control" placeholder="Judul Profil" value="<?php echo $dataprofilkec['judul_profil'];?>">
                      <input name="id_profilkec" type="hidden" value="<?php echo $dataprofilkec['id_profilkec'];?>">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar"> </i>
                      </span>
                      <input readonly type="date" value="<?php echo date("Y-m-d");?>" name="date_profil" class="form-control" placeholder="Tanggal pembuatan">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-camera"> </i>
                      </span>
                      <input name="img_profil" type="file" class="form-control" placeholder="Foto Profil" accept="image/x-png,image/gif,image/jpeg">
                      <input type="text" class="form-control" value="Jika tidak ingin mengganti foto, biarkan form kosong" readonly="">
                      <input type="hidden" name="img_profil_old" value="<?php echo $dataprofilkec['img_profil'];?>">
                    </div>
                    <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-user" title="Penulis Profil"> </i>
                          </span>
                          <select name="id_login" class="form-control">
                            <?php
                            $dataprofil = mysqli_query($koneksi,"select * from tb_profil");
                            while ($data=mysqli_fetch_array($dataprofil)) {
                              if($data['id_login'] == $dataprofilkec['id_login'] )
                              {
                            ?>
                              <option selected value="<?php echo $data['id_login']; ?>"><?php echo $data['nama_lengkap'] ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>
                        </div>
                    <textarea class="textarea" name="desc_profil" placeholder="Berita apa hari ini?" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;border: 1px solid #dddddd; padding: 10px;"><?php echo $dataprofilkec['desc_profil'];?></textarea>
                   <a href="tampil_profilkecamatan.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                   <a href="proses_profilkecamatan.php?id=<?php echo $dataprofilkec['id_profilkec']; ?>" name="hapusprofilkec" class="btn btn-danger" style="float: right; margin-left: 10px;"> Hapus </a>
                    <button type="submit" name="editprofilkec" class="btn btn-info " style="float: right;">Simpan</button>
                  </form>
                  <?php
                  }
                }
                else
                {
                ?>
                  <form action="proses_profilkecamatan.php" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-book"> </i>
                      </span>
                      <input name="judul_profil" type="text" class="form-control" placeholder="Judul Profil">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-calendar"> </i>
                      </span>
                      <input readonly type="date" value="<?php echo date("Y-m-d");?>" name="date_profil" class="form-control" placeholder="Tanggal pembuatan">
                    </div>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-camera"> </i>
                      </span>
                      <input required name="img_profil" type="file" class="form-control" placeholder="Foto Profil" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Penulis Foto"> </i>
                        </span>
                        <select name="id_login" class="form-control">
                          <option value="<?php echo $id; ?>"><?php echo $namalengkap; ?></option>
                        </select>
                    </div>
                    <textarea class="textarea" name="desc_profil" placeholder="Berita apa hari ini?" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px;border: 1px solid #dddddd; padding: 10px;"></textarea>
                   <a href="tampil_profilkecamatan.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                    <button type="submit" name="inputprofilkec" class="btn btn-info " style="float: right;">Simpan</button>
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
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
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