 <?php
                    $prosesprofil = mysqli_query($koneksi,"select * from tb_profilkec");
                    while ($dataprofil = mysqli_fetch_array($prosesprofil)) {
                    ?>
                        <h2 class="section-header big">
                            <?php echo $dataprofil['judul_profil'];
                            ?>
                        </h2>
                        <?php
                        echo $dataprofil['desc_profil'];
                        ?>
                        <a href="profil_kecamatan.php" class='btn btn-primary'>Read More</a>
                    <?php
                    }
                    ?>