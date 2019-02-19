<section class="section bg-gray bd-b pt-70 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <h2 class="section-header">Buku Tamu</h2>
                    <div class="testimonial testimonial-slider" data-number-slide="1">
                    <?php
                    $prosesbukutamu = mysqli_query($koneksi,"select * from tb_bukutamu left join tb_balasan_bukutamu ON tb_bukutamu.id_bukutamu = tb_balasan_bukutamu.id_bukutamu left join tb_profil ON tb_balasan_bukutamu.id_login = tb_profil.id_login");
                    while ($databukutamu = mysqli_fetch_array($prosesbukutamu))
                    {
                    ?>
                        <div class="item">
                            <div class="testimonial-status white">
                                <?php echo $databukutamu['pesan'];?>
                            </div>
                            <div class="testimonial-author clearfix">
                                <h5 class="text-uppercase text-right">
                                    <?php echo $databukutamu['nama'];?>
                                </h5>
                            </div>
                            <div class="testimonial-status white">
                            <b>Balasan:</b>
                            <p>
                                <?php echo $databukutamu['pesan_balasan'];?>
                            </p>
                            </div>
                            <div class="testimonial-author clearfix">
                                <h5 class="text-uppercase text-right">
                                    <?php echo $databukutamu['nama_lengkap'];?>
                                </h5>
                            </div>
                        </div>
                    <?php 
                    }
                    ?>
                    </div><!-- /testimonial -->
                </div><!-- /col -->

                <div class="col-sm-6 col-xs-12">
                    <h2 class="section-header">Form Buku Tamu</h2>
                    <div class="row">
                        <form class="form-horizontal" method="post" action="proses_bukutamu.php">
                          <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Nama</label>

                              <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                                <input type="hidden" class="form-control" value="<?php echo date('Y-m-d');?>" name="date">
                                <input type="hidden" class="form-control" value="<?php echo date('H:i:s');;?>" name="time">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Pesan</label>

                              <div class="col-sm-10">
                                <textarea name="pesan" class="form-control" rows="10" placeholder="Masukkan Pesan / Masukan"></textarea>
                              </div>
                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-info pull-right" name="inputbukutamu">Kirim</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                    </div><!-- /row -->
                </div><!-- /col -->
            </div><!-- /row -->
        </div><!-- /container -->
    </section>
    <!-- END / TESTIMONIAL - CLIENT -->
    <!-- PORTFOLIO 1 -->
    <section class="section bg-parallax pt-60 pb-60" data-background="img/bg/portfolio.jpg">
        <div class="bg-overlay-black bg-overlay-7"></div>
        <div class="container">
            <h2 class="section-header big" data-section-center="991">Gallery</h2>
            <div class="gallery gallery-2 clearfix">
            <?php
            $prosesgallery = mysqli_query($koneksi,"select * from tb_gallery LIMIT 12");
            while ($datagallery = mysqli_fetch_array($prosesgallery)) {
            ?>
                <div class="gallery-item gallery-col-4 hover-link">
                    <img src="admin/news/gallery/<?php echo $datagallery['img_gallery'];?>" alt="<?php echo $datagallery['img_gallery'];?>">
                    <a href="admin/news/gallery/<?php echo $datagallery['img_gallery'];?>" class="mfp-image overlay" title="<?php echo $datagallery['title_gallery'];?>" data-effect="mfp-zoom-in"><i class="fa fa-search"></i></a>
                </div><!-- /gallery-item -->
            <?php  
            }
            ?>
            </div><!-- /gallery -->
        </div><!-- /container -->
    </section>