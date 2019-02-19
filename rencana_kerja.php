<?php
include ('admin/fungsi/config.php');
include ('admin/fungsi/fungsi_tanggal.php');

?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html class="" lang="en"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,600,700' rel='stylesheet' type='text/css'>
    <!-- CSS LIBRARY -->
    <!-- Bootstrap -->
    <link type="text/css" href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/lib/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <!-- Font Icon -->
    <link type="text/css" href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="css/lib/cortana.css" rel="stylesheet">

    <!-- Revolution Slider -->
    <link type="text/css" href="rs-plugin/css/settings.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link type="text/css" href="css/lib/owl.carousel.css" rel="stylesheet">

    <!-- Select into div -->
    <link type="text/css" href="css/lib/select2.min.css" rel="stylesheet">

    <!-- Magnific Popup -->
    <link type="text/css" href="css/lib/magnific-popup.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link type="text/css" href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>Kecamatan Panggarangan | Rencana Kerja</title>
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
<?php
include ("header.php");
?>
<div id="page-wrap">
    <!-- SUB HEADER -->
    <section id="sub-header" class="section bg-parallax pt-0 pb-0">
        <div class="bg-overlay-black bg-overlay-5"></div>
        <div class="container">
            <div class="sub-wrapper">
            </div><!-- /sub-wrapper -->
        </div><!-- /container -->
    </section>
    <!-- END / SUB HEADER -->

    <!-- CONTENT -->
    <section class="section bg-white pt-70 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div id="content" class="site-content">
                        <main id="main">
                        <?php
                        $proseskec = mysqli_query($koneksi,"select * from tb_rencanakerja left join tb_profil ON tb_rencanakerja.id_login = tb_profil.id_login LIMIT 1");
                        while ($datakec = mysqli_fetch_array($proseskec)) {
                        ?>
                            <article class="post format-standard mb-40">
                                <header class="entry-header">
                                    <h2 class="entry-title h4">
                                       <?php echo $datakec['judul_rencana_kerja']; ?>
                                    </h2>
                                    <span class="byline">Posted by 
                                        <?php echo $datakec['nama_lengkap']; ?> - 
                                    </span>
                                    <span class="posted-on">
                                        <?php echo fungsi_tgl($datakec['date_rencana_kerja']);?>
                                    </span>
                                </header><!-- /header -->
                                <div class="entry-content">
                                     <iframe style="margin-top: 20px;" id="viewer" src="admin/news/pdf/<?php echo $datakec['pdf_rencana_kerja'];?>" frameborder="0" scrolling="no" width="100%" height="700"></iframe>
                                </div><!-- /entry-content -->
                            </article><!-- /post -->
                        <?php  
                        }
                        ?>
                        </main>
                    </div><!-- /site-content -->
                </div><!-- /col -->

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div id="sidebar" class="sidebar">
                        <div id="widget-area">
                            <aside class="widget widget_recent_entries">
                                <h3 class="widget-title h5">Recent Posts</h3>
                                <ul>
                                <?php
                                $prosesnews = mysqli_query($koneksi,"select * from tb_news order by RAND() LIMIT 5 ");
                                while($datanews = mysqli_fetch_array($prosesnews))
                                {
                                ?>
                                    <li>
                                        <a href="detail_news.php?id=<?php echo $datanews['id_news'];?>" title="<?php echo $datanews['judul_news'];?>">
                                            <img src="admin/news/<?php echo $datanews['img_news'];?>" alt="">
                                            <span class="title" data-number-line="2"><?php echo $datanews['judul_news'];?></span>
                                        </a>
                                        <span class="date">
                                            <?php echo fungsi_tgl($datanews['date_news']);?>
                                        </span>
                                    </li>
                                <?php
                                }
                                ?>
                                </ul>
                            </aside><!-- /widget_recent_entries -->
                        </div><!-- /widget-area -->
                    </div><!-- /sidebar -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
    <!-- END / CONTENT -->

    <?php
    include ("footer.php");
    ?>
</div><!-- /page-wrap -->

<!-- JQUERY -->
    <script type="text/javascript" src="js/lib/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lib/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="js/lib/owl.carousel.min.js"></script>
    <!-- Overflow Text -->
    <script type="text/javascript" src="js/lib/overflow-text.js"></script>

    <!-- Easing -->
    <script type="text/javascript" src="js/lib/jquery.easing.min.js"></script>

    <!-- Select to div -->
    <script type="text/javascript" src="js/lib/select2.min.js"></script>

    <!-- Parallax -->
    <script type="text/javascript" src="js/lib/jquery.parallax-1.1.3.js"></script>

    <!-- Waypoint -->
    <script type="text/javascript" src="js/lib/waypoints.min.js"></script>

    <!-- Count To -->
    <script type="text/javascript" src="js/lib/jquery.countTo.js"></script>

    <!-- Magnific Popup -->
    <script type="text/javascript" src="js/lib/jquery.magnific-popup.min.js"></script>

    <!-- Image Loaded -->
    <script type="text/javascript" src="js/lib/imagesloaded.pkgd.min.js"></script>

    <!-- Isotope -->
    <script type="text/javascript" src="js/lib/isotope.pkgd.min.js"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>