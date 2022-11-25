<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome To Login</title>
    <link rel='stylesheet' href='style/style_login.css' type='text/css' />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="ajax/jquery.min.js"></script>
    <script type="text/javascript" src="ajax/init.js"></script>

    </script>
</head>

<body>
    <div id="header1">
        <div>
            <?php
            $jam = date('H:i:s');


            date_default_timezone_set('Asia/Jakarta');
            //Menampilkan tanggal hari ini dalam bahasa Indonesia dan English
            $namaHari = array("Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
            $namaBulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $today = date('l, F j, Y');
            $sekarang = $namaHari[date('N')] . ", " . date('j') . " " . $namaBulan[(date('n') - 1)] . " " . date('Y');
            ?>
        </div><br>

        <div id="main">
            <input type=hidden value='<?php echo isset($_GET['log']) ?>' name=log />
            <form id="login" action="javascript:alert('success!');">
                <table border="0" cellpadding="1px" cellspacing="1px">
                    <tbody>
                        <tr>
                            <td rowspan="5">
                                <!-- <img src="images/kunci.png" height="100" width="100" align="absmiddle" /> -->
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" height="10" align="center">
                                <div style="color:#333333;"><iframe src="datetime_digital2.php" width=100% height=30 scrolling=no frameborder=0></iframe></div>
                                <font face="verdana" size="3" style="font-weight:bold;">&nbsp;LOGIN PLEASE</h3>
                                    <hr size="1" width="100%" />
                                    <?php
                                    $log = isset($_GET['log']);
                                    $logout = isset($_GET['logout']);
                                    $reset = isset($_GET['reset']);
                                    if ($log == '1') {
                                        echo '<div style=color:#336699; font-size: 10px; id=login_response>Silahkan Login</div>';
                                    } elseif ($logout == '2') {
                                        echo '<div style=color:green; font-size: 15px; id=login_response>Anda Sudah berhasil Keluar</div>';
                                    } elseif ($reset == '3') {
                                        echo '<div style=color:green; font-size: 15px; id=login_response>Mohon login kembali <br/>dengan password Anda yang baru</div>';
                                    }
                                    ?>
                                    <div id="login_response">
                                        <!-- spanner -->
                                    </div>
                            </td>
                        </tr>
                        <tr>
                            <td><span>Username</span></td>
                            <td>:</td>
                            <td><input type="text" name="id-user" id="id-user" /></td>
                        </tr>
                        <tr>
                            <td><span>Password</span></td>
                            <td>:</td>
                            <td><input class="form-control" type="password" name="passwd" id="passwd" /></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><input type="hidden" name="action" value="user_login">
                                <input type="hidden" name="module" value="login"><input type="submit" name="Login" value="Login" class="big1" id="signin_submit" /><br />
                                <h2 <div id="ajax_loading" style='display:none'>
                                    <bu < <img align="absmiddle" src="images/spinner.gif">&nbsp;Sedang Proses..
        </div>
        </td>
        </tr>
        </tbody>
        </table>
        </form>
    </div>
    </div>
</body>

</html>