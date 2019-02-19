<?php
include ('admin/fungsi/config.php');
include ('admin/fungsi/fungsi_statistik.php');
include ('admin/fungsi/fungsi_tulisan.php');
include ('admin/fungsi/fungsi_hitungvisitor.php');
include ('admin/fungsi/fungsi_tanggal.php');

?>
<!DOCTYPE html>
<!--[if IE 7 ]> <html class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> 
<html class="" lang="en"> <!--<![endif]-->
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

    <title>Kelurahan Setu | Home</title>
</head>

<!--[if IE 7]> <body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]> <body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]> <body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body> <!--<![endif]-->
<!-- HEADER 1 -->
<?php
include ("header.php");
?>
<div id="page-wrap">
    <!-- HOME MEDIA -->
    <section id="home-media" class="section pt-0 pb-0" data-home-media="760">
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <?php
                    $hasilslide = mysqli_query($koneksi,"select * from tb_news ORDER BY id_news DESC LIMIT 2");
                    while ($dataslide = mysqli_fetch_array($hasilslide)) {
                    ?>
                        <li data-transition="random" data-slotamount="7" data-masterspeed="500" data-thumb="img/slider/thumb/thumb-1.jpg"  data-saveperformance="on"  data-title="Slider 2">
                            <!-- MAIN IMAGE -->
                            <img src="img/slider/dummy.png"  alt="<?php echo $dataslide['img_news'];?>" data-lazyload="admin/news/<?php echo $dataslide['img_news'];?>" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <!-- LAYERS -->

                           <div class="tp-caption grey_heavy_72 sfb tp-resizeme rs-parallaxlevel-0 tp-description"
                                data-x="left"
                                data-y="340"
                                data-hoffset="15"
                                data-speed="500"
                                data-start="1350"
                                data-easing="Power3.easeInOut"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 99; max-width: auto; max-height: auto; white-space: nowrap; font-size: 40px !important; font-weight: 600;">
                                <?php echo $dataslide['judul_news'];?>
                            </div>
                            <div class="tp-caption grey_heavy_72 sfl tp-resizeme rs-parallaxlevel-0"
                                data-x="left"
                                data-y="440"
                                data-hoffset="15"
                                data-speed="500"
                                data-start="2050"
                                data-easing="Power3.easeInOut"
                                data-splitin="none"
                                data-splitout="none"
                                data-elementdelay="0.1"
                                data-endelementdelay="0.1"
                                style="z-index: 99; max-width: auto; max-height: auto; white-space: nowrap;"><a href="detail_news.php?id=<?php echo $dataslide['id_news'];?>" class='btn btn-transparent'>Read More</a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <div class="tp-bannertimer"></div>
            </div><!-- /tp-banner -->
        </div><!-- /tp-banner-container -->
    </section>
    <!-- END / HOME MEDIA -->

    <!-- ABOUT -->
    <section class="section bg-white bd-b pt-70 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-push-4 col-sm-12 col-xs-12" style="text-align: justify;">
                   
                    <div class="divider pt-30 pb-40"></div>

                    <div class="row">
                        <?php
                        $prosesnews = mysqli_query($koneksi,"select * from tb_news order by id_news DESC LIMIT 3");
                        while($datanews = mysqli_fetch_array($prosesnews))
                        {
                        ?>
                        <div class="col-lg-4 col-sm-6 col-xs-12">
                            <h3 class="h5 text-uppercase mb-20" style="    line-height: 2.2em;">
                                <a href="detail_news.php?id=<?php echo $datanews['id_news'];?>"><b>
                                    <?php echo $datanews['judul_news'];?></b>
                                </a>
                            </h3>
                            <div class="post-thumbnail hover-link">
                                <img src="admin/news/<?php echo $datanews['img_news'];?>" alt="<?php echo $datanews['img_news'];?>" />
                                <a href="detail_news.php?id=<?php echo $datanews['id_news'];?>" class="overlay"><i class="fa fa-link"></i></a>
                            </div><!--/ post-thumbnail -->
                            <div class="mb-30">
                                <?php echo tulisan($datanews['news']);?>
                            </div>
                        </div><!-- /col -->
                        <?php
                        }
                        ?>
                    </div><!-- /row -->
                </div><!-- /col -->

                <div class="col-lg-4 col-sm-pull-8 col-sm-12 col-xs-12">
                    <div class="sidebar sidebar-2">
                        <?php
                        $prosesvideo = mysqli_query($koneksi,"select * from tb_video LIMIT 1");
                        while($datavideo = mysqli_fetch_array($prosesvideo))
                        {
                        ?>
                        <aside class="widget widget_about">
                            <h3 class="widget-title h5" style="line-height: 2.2em;"><?php echo $datavideo['judul_video'];?></h3>
                            <iframe width="100%" height="200" src="<?php echo $datavideo['url_video'];?>" frameborder="0" allowfullscreen></iframe>
                        </aside><!-- /widget_about -->
                        <?php
                        }
                        ?>
                    </div><!-- sidebar -->
                    <div class="sidebar sidebar-2">
                        <aside class="widget widget_contact">
                            <h3 class="widget-title h5">Statistik Pengunjung</h3>
                            <ul>
                                <li>
                                    <i class="fa fa-user"></i>
                                    Hari ini
                                    <span style="float: right;"><?php echo $todayvisitor;?></span>
                                </li>
                                <li>
                                    <i class="fa fa-bar-chart"></i>
                                    Total
                                    <span style="float: right;"><?php echo $totalvisitor;?></span>
                                </li>
                            </ul>
                        </aside><!-- /widget_contact -->
                    </div>
                    <div class="sidebar sidebar-2">
                        <aside class="widget widget_contact">
                            <h3 class="widget-title h5">Kalender</h3>
                            <?php
                            $month= date ("m");
                            $year=date("Y");
                            $day=date("d");
                            $endDate=date("t",mktime(0,0,0,$month,$day,$year));
                            echo '<font face="arial" size="2">';
                            echo '<table align="center" border="0" cellpadding=5 cellspacing=5 style=""><tr><td align=center>';
                            echo "Hari ini : ".fungsi_tgl(date("Y-m-d"));
                            echo '</td></tr></table><br>';
                            echo '<table class="table table-striped" align="center">
                                <tr class="table-info">
                                <td class="table-info" align=center><font color=red>Min</font></td>
                                <td class="table-info" align=center>Sen</td>
                                <td class="table-info" align=center>Sel</td>
                                <td class="table-info" align=center>Rab</td>
                                <td class="table-info" align=center>Kam</td>
                                <td class="table-info" align=center>Jum</td>
                                <td class="table-info" align=center>Sab</td>
                                </tr>';
                                $s=date ("w", mktime (0,0,0,$month,1,$year));
                                for ($ds=1;$ds<=$s;$ds++) {
                                echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
                                </td>";}
                                for ($d=1;$d<=$endDate;$d++) {
                                if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
                                $fontColor="#000000";
                                if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
                                echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
                                if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }}
                                echo '</table>'; 
                                ?>
                        </aside><!-- /widget_contact -->
                    </div>
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
    <!-- END / ABOUT -->

    <!-- TESTIMONIAL - CLIENT -->
    
    <!-- END / PORTFOLIO 1 -->
    <!-- FOOTER -->
    <?php
    include "footer.php";
    ?>
    <!-- END / FOOTER -->
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