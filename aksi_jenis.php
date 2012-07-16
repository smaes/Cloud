<?
include"conn.php";

if(isset($_POST[tambah])){

$sql=mysql_query("select*from jenis where nama_jenis='$_POST[nama]' or id_jenis='$_POST[idjenis]' ");
$hit=mysql_num_rows($sql);
if($hit<=0){ 

$hasil=mysql_query("INSERT INTO jenis(id_jenis,nama_jenis) values('$_POST[idjenis]','$_POST[nama]')");

	print "<script>alert('Berhasil ditambah');
javascript: document.location='index.php?req=lihatjenis';</script>";

}else{ 
	print "<script>alert('Maaf nama jenis atau id jenis tidak diperbolehkan');
javascript: document.location='index.php?req=inputjenis';</script>";
}

}else if(isset($_GET[hapus])){ 

$hasil=mysql_query("delete from jenis where id_jenis='$_GET[id]'");

	print "<script>alert('berhasil dihapus');
javascript: document.location='index.php?req=lihatjenis';</script>";

}

?>