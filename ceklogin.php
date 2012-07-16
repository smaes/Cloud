<?
session_start();
include "conn.php";
$pass=md5($_POST[password]);
if (!empty ($_POST[username]) and !empty ($pass)) {
$perintah="select * from user where nama='$_POST[username]' and password='$pass' "; 

$hasil=mysql_query ($perintah);
$hitu=mysql_num_rows($hasil);

if($hitu<=0){
$hasil1=mysql_query ("select * from salesman where nama='$_POST[username]' and password='$pass' ");
$baris=mysql_fetch_array($hasil1); 
	$idkaryawan=$baris[id_salesman];
	$statuskaryawan=salesman;
}else{
$baris=mysql_fetch_array($hasil);
	$idkaryawan=$baris[id_karyawan];
	$statuskaryawan=$baris[jabatan];
 }
if ($baris[nama]==$_POST[username] and $baris[password]==$pass)
{
	session_register("username");
	session_register("id");
	session_register("status");
	$username=$baris[nama];
	$id=$idkaryawan;
	$status=$statuskaryawan;
if($status=='supplier'){
	print "<script>top.location='index.php?req=lihatobat';</script>";  }
else if($status=='gudang'){
	print "<script>top.location='index.php?req=lihatobat';</script>";  }
else if($status=='salesman'){
	print "<script>top.location='index.php?req=lihatobat';</script>";  }
	
} else {
	print "<script>alert('login gagal');
javascript:history.go(-1);</script>";
}
} else {
	print "<script>alert('Isi Username dan Password');
javascript:history.go(-1);</script>";
}
?>
