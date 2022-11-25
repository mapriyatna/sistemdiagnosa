<?php
session_start();
include "../../config/koneksi.php"; //koneksi ke database
if ($_SESSION['nama_user'] !== 'admin') {
    header("location:../?log=1");
} else {
?>

    <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>

    <head>
        <meta http-equiv='Content-type' content='text/html; charset=utf-8' />
        <link rel='stylesheet' href='../../style/style.css' type='text/css' />

        <!--[if lte IE 6]><link rel='stylesheet' href='css/ie6.css' type='text/css' media='all' /><![endif]-->

        <script type="text/javascript" src="../ajax/jquery.js"></script>
        <script type="text/javascript" src="../ajax/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="../ajax/smooth.table.js"></script>
        <script type="text/javascript" src="../ajax/javascript_functions.js"></script>
        <script type="text/javascript" src="../ajax/jquery.ui.datepicker.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $(".signin").click(function() {
                    $("fieldset#signin_menu").toggle();
                    $(".signin").toggleClass("menu-open");
                });

                $("fieldset#signin_menu").mouseup(function() {
                    return false
                });
                $(document).mouseup(function(e) {
                    if ($(e.target).parent("a.signin").length == 0) {
                        $(".signin").removeClass("menu-open");
                        $("fieldset#signin_menu").hide();
                    }
                });

            });
        </script>
        <script type="text/javascript">
            function confirmDelete() {
                return confirm("Anda yakin akan menghapus data ini?");

            }
        </script>

        <link href="../style/colorbox.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="../ajax/jquery.1.7.1.min.js"></script>
        <script type="text/javascript" src="../ajax/colorbox/jquery.colorbox.js"></script>
        <title>Sistem Diagnosa Kesehatan Mental</title>
    </head>

    <body>

        <!-- Shell -->
        <div class='shell'>

            <!-- Header -->
            <div id="header1">
                <div class="flash">
                </div>
            </div>

            <div id='header'>
                <!-- Navigation -->
                <div id='navigation' style='text-transform: uppercase;'>
                    <ul>
                        <li><a href="index.php?main=home">Beranda</a></li>
                        <li><a href='index.php?main=penyakit'>Penyakit</a></li>
                        <li><a href='index.php?main=gejala'>Gejala</a></li>
                        <li><a href='index.php?main=aturan'>Rule</a></li>
                        <li><a href='index.php?main=hasildiagnosa'>Hasil Diagnosa</a></li>
                        <li><a href='index.php?main=laporandiagnosa'>Laporan Diagnosa</a></li>
                        <li><a href='index.php?main=bukutamu'>Pesan Kontak</a></li>
                        <li><a href="index.php?main=setuser">Pengaturan</a></li>
                        <li><a href="main/logout.php" class="signin">Keluar</a></li>
                    </ul>
                </div>
                <!-- End Navigation -->
            </div>
            <!-- End Header -->

            <!-- media -->
            <div id='media'>
                <div class='cl'>&nbsp;</div>
                <!-- Content -->
                <div id='content'>
                    <div id="kontenkanan">
                        <div class=content>
                            <?php include "main/main_menu.php"; ?>
                        </div>
                    </div>
                </div>
                <!-- End Content -->

            </div>

            <!-- Footer -->
            <div id='footer'>
                <ul>
                    Sistem Diagnosa Kesehatan Mental &copy2022 <a>Putri Hana Salsabila</a>
                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </body>

    </html>
<?php } ?>