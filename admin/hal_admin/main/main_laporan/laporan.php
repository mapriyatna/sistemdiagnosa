<?php

require "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/fungsi_combobox.php";
include "../../config/library.php";

echo "<div class=judul><h2>Daftar Laporan Diagnosa</h2>
        <br/><br/>
          <form method=POST action='main/main_laporan/pdf_diagnosa.php' target='_blank'>
          <table>
          <tr><td colspan=2><b>Laporan Per Periode</b></td></tr>
          <tr><td>Dari Tanggal</td><td> : ";
combotgl(1, 31, 'tgl_mulai', $tgl_skrg);
combonamabln(1, 12, 'bln_mulai', $bln_sekarang);
combothn(2000, $thn_sekarang, 'thn_mulai', $thn_sekarang);

echo "</td></tr>
          <tr><td>s/d Tanggal</td><td> : ";
combotgl(1, 31, 'tgl_selesai', $tgl_skrg);
combonamabln(1, 12, 'bln_selesai', $bln_sekarang);
combothn(2000, $thn_sekarang, 'thn_selesai', $thn_sekarang);

echo "</td></tr>
          <tr><td colspan=2><input type=submit value=Proses></td></tr>
          </table>
          </form></div>";

echo "</tbody></table><hr><br/></br></br></br></br></br></br></br></br></br></br></br>";



echo "
      <div class=judul><h2>Daftar Diagnosa Terakhir</h2></div>
      <br/><br/><br/>";

// $halaman = 10;
// $page = isset($_GET["diagnosa"]) ? (int)$_GET["diagnosa"] : 1;
// $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
// $result = mysql_query("SELECT * FROM diagnosa");
// $total = mysql_num_rows($result);
// $pages = ceil($total / $halaman);
// $sql = mysql_query("select * from diagnosa LIMIT $mulai, $halaman") or die();
// $no = $mulai + 1;

$p = new Paging;
$posisi = $p->cariPosisi($batas);
$batas = 20;
$sql = mysql_query("SELECT * FROM diagnosa ");
$no = 1;
$i = $posisi;

// $sql = mysql_query("SELECT * FROM diagnosa");
// $no = 1;
echo "<br/>
            <table id=o width=100%><tbody> <tr>
                          <th class=th>No</th>
                          <th class=th>Kode Diagnosa</th>
                          <th class=th>Nama</th>
                          <th class=th>Jenis Kelamin</th>
                          <th class=th>Usia</th>
                          <th class=th>Alamat</th>
                          <th class=th>Tanggal</th>
                  </tr>";


while ($q = mysql_fetch_array($sql)) {
      if (($no % 2) > 0)
            $bg = '#ffffff';
      else
            $bg = '#f5f5f5';
      echo "	         
               
                    <tr bgcolor=" . $bg . ">
                    <td class=td align=center>$no</td>
                    <td class=td align=center>$q[kd_diagnosa]</td>
                    <td class=td>$q[nama]</td>
                    <td class=td>$q[jenis_kelamin]</td> 
                    <td class=td align=center>$q[usia]</td>
                    <td class=td>$q[alamat]</td>
                    <td class=td>$q[tgl_diagnosa]</td> 
                   </tr>";
      $no++;

      echo "</tbody></table><hr>";

      $sql_pagging = mysql_query("SELECT COUNT(*) AS jml FROM diagnosa");
      $pagging = mysql_fetch_array($sql_pagging);
      $jml = $pagging['jml'];


      echo "
		 </br>
        <div class='results'> <span>Jumlah Data : $jml</span><br/><br/> ";
      $jmldata = mysql_num_rows(mysql_query("SELECT * from diagnosa"));
      $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
      $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

      echo " Halaman : $linkHalaman </div>";
}
