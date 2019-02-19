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
    $status = $datalogin['status'];
  }
  if($status != 'admin')
  {
    echo"<script> alert('Maaf Anda Tidak Ada Akses') ; window.location.href='beranda.php'; </script>";
  }
  else {
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
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <!-- Input addon -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">User</h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#input">Input</a></li>
                <li><a data-toggle="tab" href="#user">Data User</a></li>
              </ul>
              <div class="tab-content">
                <div id="input" class="tab-pane fade in active">
                  <?php
                  if(isset($_GET['id']))
                  {
                    $id_login = $_GET['id'];
                    $datalist = mysqli_query($koneksi,"select * from tb_login INNER JOIN tb_profil ON tb_login.id_login = tb_profil.id_login where tb_login.id_login = '$id_login' ");
                    while($data = mysqli_fetch_array($datalist))
                    {
                  ?>
                    <form action="proses_adduser.php" method="post" >
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Nama Lengkap"> </i>
                        </span>
                        <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap'];?>" required="">
                        <input name="id_login" type="hidden" value="<?php echo $data['id_login'];?>" >
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Username"> </i>
                        </span>
                        <input name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $data['username'];?>" required="" readonly>
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-lock" title="Password"> </i>
                        </span>
                        <input name="password" type="password" class="form-control" placeholder="Password" value>
                        <input type="text" class="form-control" readonly="" value="Jika tidak ingin mengganti password, biarkan form kosong">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-users" title="Status"> </i>
                        </span>
                        <select name="status" class="form-control">
                          <?php
                          if($data['status'] == 'admin')
                          {
                            echo '
                              <option selected value="admin">Admin</option>
                              <option value="user">User</option>
                            ';
                          }
                          else {
                            echo '
                            <option value="admin">Admin</option>
                            <option selected value="user">User</option>
                            ';
                          }
                          ?>
                          
                        </select>
                      </div>
                      <a href="tampil_adduser.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                      <button type="submit" name="edituser" class="btn btn-info " style="float: right;">Simpan</button>
                    </form>
                  <?php
                    }
                  }
                  else
                  {
                  ?>
                    <form action="proses_adduser.php" method="post" >
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Nama Lengkap"> </i>
                        </span>
                        <input name="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" value="" required="">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-user" title="Username"> </i>
                        </span>
                        <input name="username" type="text" class="form-control" placeholder="Username" value="" required="">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-lock" title="Password"> </i>
                        </span>
                        <input name="password" type="password" class="form-control" placeholder="Password" value="" required="">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="fa fa-users" title="Status"> </i>
                        </span>
                        <select name="status" class="form-control">
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                        </select>
                      </div>
                      <a href="tampil_adduser.php" class="btn btn-default" style="float: right; margin-left: 10px;"> Batal </a>
                      <button type="submit" name="inputuser" class="btn btn-info " style="float: right;">Simpan</button>
                    </form>
                  <?php
                  }
                  ?>
                </div>
                <div id="user" class="tab-pane fade">
                  <table id="table_news" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from tb_login");
                    while($datauser = mysqli_fetch_array($data))
                    {
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $datauser['username']; ?></td>
                        <td><?php echo $datauser['password']; ?></td>
                        <td><?php echo $datauser['status']; ?></td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                              Action <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                              <li>
                                <a href="tampil_adduser.php?id=<?php echo $datauser['id_login']; ?>">Edit</a>
                              </li>
                              <li>
                                <a href="proses_adduser.php?proses_hapus=<?php echo $datauser['id_login']; ?>">Hapus</a>
                              </li>
                            </ul>
                            </div>
                          </td>
                      </tr>
                    <?php
                    $no++;
                    }
                    ?>
                    </tbody>
                  </table>
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
  <div class="control-sidebar-bg"></div>
</div>
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
<!-- page script -->
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#table_news').DataTable(
    {
      "scrollX": true
    })
  })
</script>
</body>
</html>
<?php
  }
}
?>