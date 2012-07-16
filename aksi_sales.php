<?
include"conn.php";

if(isset($_POST[tambah])){

$sql=mysql_query("select*from salesman where id_salesman='$_POST[idsales]' or (nama='$_POST[nama]' and password1='$_POST[password]')");
$hit=mysql_num_rows($sql);
if($hit<=0){ 

if($_POST[password]==$_POST[password1]){

$pass=md5($_POST[password]);
$hasil=mysql_query("INSERT INTO salesman(id_salesman,password,password1,nama,alamat,tgl_lahir,jenis_kelamin) values('$_POST[idsales]','$pass','$_POST[password]','$_POST[nama]','$_POST[alamat]','$_POST[today]','$_POST[jk]')");

	print "<script>alert('Berhasil ditambah');
javascript: document.location='index.php?req=lihatsales';</script>";
}else{
	print "<script>alert('Retype Password salah');
javascript: document.location='index.php?req=inputsales';</script>";
}
}else{ 
	print "<script>alert('Maaf id_salesman atau nama tidak diperbolehkan');
javascript: document.location='index.php?req=inputsales';</script>";
}

}else if(isset($_GET[hapus])){ 

$hasil=mysql_query("delete from salesman where id_salesman='$_GET[id]'");

	print "<script>alert('berhasil dihapus');
javascript: document.location='index.php?req=lihatsales';</script>";

}

?>