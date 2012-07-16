<?
include"conn.php";

if(isset($_POST[tambah])){

if(!empty($_POST[password]) and ($_POST[password]==$_POST[password1])){

$pass=md5($_POST[password]);
$hasil=mysql_query("update salesman set password='$pass',password1='$_POST[password]',nama='$_POST[nama]',alamat='$_POST[alamat]',jenis_kelamin='$_POST[jk]' where id_salesman='$_POST[idsales]'");

	print "<script>alert('Berhasil diupdate');
javascript: document.location='index.php?req=lihatsales';</script>";

}else if(empty($_POST[password])){

$hasil=mysql_query("update salesman set nama='$_POST[nama]',alamat='$_POST[alamat]',jenis_kelamin='$_POST[jk]' where id_salesman='$_POST[idsales]'");

	print "<script>alert('Berhasil diupdate');
javascript: document.location='index.php?req=lihatsales';</script>";
}else if(!empty($_POST[password]) and ($_POST[password]!=$_POST[password1])){

	print "<script>alert('Retype Password salah');
javascript: document.location='index.php?req=editsales&id=$_POST[idsales]';</script>";
}




}else if(isset($_GET[hapus])){ 

$hasil=mysql_query("delete from salesman where id_salesman='$_GET[id]'");

	print "<script>alert('berhasil dihapus');
javascript: document.location='index.php?req=lihatsales';</script>";

}

?>