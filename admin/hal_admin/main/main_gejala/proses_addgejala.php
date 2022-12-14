<?php
require "../../config/koneksi.php";
# Tombol Simpan diklik
if(isset($_POST['btnSimpan'])){
	# Baca Variabel Form
	$txtKode		= $_POST['txtKode'];
	$txtNama		= $_POST['txtNama'];

	# Validasi form, jika kosong sampaikan pesan error
	$pesanError = array();
	if (trim($txtKode)=="") {
		$pesanError[] = "Data <b>Kode Gejala</b> tidak boleh kosong !";		
	}
	if (trim($txtNama)=="") {
		$pesanError[] = "Data <b>Nama Gejala</b> tidak boleh kosong !";		
	}
	
	# Validasi Nama gejala, jika sudah ada akan ditolak
	$cekSql="SELECT * FROM gejala WHERE nm_gejala='$txtNama'";
	$cekQry=mysql_query($cekSql, $koneksidb) or die ("Eror Query".mysql_error()); 
	if(mysql_num_rows($cekQry)>=1){
		$pesanError[] = "MAAF, GEJALA <b> $txtNama </b> SUDAH ADA, GANTI DENGAN YANG LAIN";
	}

	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='../images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
				$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# SIMPAN DATA KE DATABASE. // Jika tidak menemukan error, simpan data ke database	
		// Membuat kode baru
		// Aktifkan ini jika ingin membuat kode otomatis & gantikan $txtKode dengan $kodeBaru
		// $kodeBaru	= buatKode("gejala", "E");

		$mySql	= "INSERT INTO gejala (kd_gejala, nm_gejala) VALUES ('$txtKode', '$txtNama')";
		$myQry	= mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?main=gejala'>";
		}
		exit;
	}	
} // Penutup Tombol Simpan
?>
