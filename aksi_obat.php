<?
session_start();
include"conn.php";

if(isset($_POST[tambah])){

$sql=mysql_query("select * from obat where kadaluarsa='$_POST[today]' limit 0,1");
$hit=mysql_num_rows($sql);
if($hit<=0){ 

$date=date("Y-m-d");
$hasil=mysql_query("INSERT INTO obat(id_obat,kd_obat,id_karyawan,id_jenis,nama_obat,kadaluarsa,jumlah_obat,tanggal_masuk) values('$_POST[idobat]','$_POST[kdobat]','$_SESSION[id]','$_POST[jenis]','$_POST[nama]','$_POST[today]','$_POST[stok]','$date')");

	print "<script>alert('Berhasil ditambah');
javascript: document.location='index.php?req=lihatobat';</script>";

}else{ 

while($hal=mysql_fetch_array($sql)){
$stok=$hal[jumlah_obat];
$ido=$hal[id_obat];
}
$jumlah=$stok+$_POST[stok];
$date=date("Y-m-d");
$hasil=mysql_query("update obat set jumlah_obat='$jumlah',tanggal_masuk='$date' where id_obat='$ido' and kadaluarsa='$_POST[today]'");

	print "<script>alert('Berhasil diupdate');
javascript: document.location='index.php?req=lihatobat';</script>";
}

}else if(isset($_GET[hapus])){ 

$hasil=mysql_query("delete from obat where id_obat='$_GET[id]' and kadaluarsa='$_GET[kadal]'");

	print "<script>alert('berhasil dihapus');
javascript: document.location='index.php?req=lihatobat';</script>";

}else if(isset($_POST[ambil])){

$has=$_POST[stok]-$_POST[jumlah];
if($has<0){ 
	print "<script>alert('Maaf stok tinggal $_POST[stok]');
javascript: document.location='index.php?req=lihatobat';</script>";
}else{ 
$hasil=mysql_query("update obat set jumlah_obat='$has' where id_obat='$_POST[ido]' and kadaluarsa='$_POST[kadal]'");

$date=date("Y-m-d");
$hasil=mysql_query("INSERT INTO mengambil(id_salesman,id_obat,tanggal_keluar,jumlah_pengambilan) values('$_SESSION[id]','$_POST[ido]','$date','$_POST[jumlah]')");

	print "<script>alert('Berhasil diupdate');
javascript: document.location='index.php?req=lihatobat';</script>";
}

}


?>