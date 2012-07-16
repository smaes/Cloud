<? session_start(); ?>
<?
function rupiah($nominal)
 {
 $rupiah =  number_format($nominal,0, ",",".");
 $rupiah = "Rp "  . $rupiah . ",-";
 return $rupiah;
 }
?>

			<div class="news_block">
<? include"waktu.php"; ?>
<?
	include"conn.php";
if(empty($_GET[a])){ $a=0; }else{
 $a=$_GET[a]; }

$q = mysql_query("select * from obat,jenis where obat.id_jenis=jenis.id_jenis order by obat.kd_obat limit $a,10"); 

	$x=1;
	?>
<style>
.ctable{
	background-color:#fff;
}
.etable{
	background-color:#fff;
}
td{padding-left:5px; }
</style>
<center><h2 style="font-family:arial; font-size:16px; font-weight:bold; color:#666;" >Daftar Obat</h2></center>
    <table align="center" width="800" border="0" cellspacing="0" cellpadding="6" style="font-family:arial; font-size:12px; font-weight:bold; color:#000; margin:auto">
      <tr style="font-size:12px; font-weight:bold; background-color:#3d107b; color:#fff;" height="30">
    <td width="100" style="border:solid #000 1px; border-right:none;">Kode Obat</td>
    <td width="100" style="border:solid #000 1px; border-right:none;">Kadaluarsa</td>
    <td width="200" style="border:solid #000 1px; border-right:none;">Nama Obat</td>
    <td width="100" style="border:solid #000 1px; border-right:none;">Jenis</td>
    <td width="100" style="border:solid #000 1px; ">Stok</td>
<? if($_SESSION[status]==supplier){ }else{ ?>
    <td width="50" style="border:solid #000 1px; border-left:none">&nbsp;</td><? } ?>
  </tr>
  <?
  $aa=0;
  while ($j = mysql_fetch_array($q))
  { 
  ?>
  <tr <? if ($x%2==0){?>class="ctable"<? }else{?>class="etable"<? } ?> height="20">
    <td style="border:solid #000 1px; border-right:none; border-top:none;"><?=$j[kd_obat]?></td>
    <td style="border:solid #000 1px; border-right:none; border-top:none;"><?=$j[kadaluarsa]?></td>
    <td style="border:solid #000 1px; border-right:none; border-top:none;"><?=$j[nama_obat]?></td>
    <td style="border:solid #000 1px; border-right:none; border-top:none;"><?=$j[nama_jenis]?></td>
    <td style="border:solid #000 1px; border-top:none;"><?=$j[jumlah_obat]?></td>
<? if($_SESSION[status]==supplier){ }else{ ?>
    <td style="border:solid #000 1px; border-top:none; border-left:none">
	<? if($_SESSION[status]==salesman){ ?>
	<a href="?req=ambil&id=<?=$j[id_obat]?>&kadal=<?=$j[kadaluarsa]?>">Ambil</a>
	<? }else if($_SESSION[status]==gudang){ ?>
	<a href="aksi_obat.php?hapus=1&id=<?=$j[id_obat]?>&kadal=<?=$j[kadaluarsa]?>">Hapus</a><? } ?>
	</td>
	<? } ?>
  </tr>
  <?
  $x++;
  }
  ?>
</table>

<? $quer5=mysql_query("select count(obat.id_obat) usaha1 from obat,jenis where obat.id_jenis=jenis.id_jenis order by obat.id_obat "); 

$data='';

while($baris5 = mysql_fetch_array($quer5))
 { 
 $b=$baris5[usaha1];
 $c=$b-$a;}

echo"<div style='float:left; width:100%'><center><a href='#' style='color:#000; font-size:14px; margin:5px;'>Page</a>"; 
$er=$b/10; $et=ceil($er); 
$a=0;
for($te=1; $te<=$et; $te++){ if($_REQUEST[po]==$te){ echo"<a href='?req=lihatobat&a=$a&data=$data&po=$te' style='color:#999; font-size:14px; margin:5px;'>$te</a>"; }else{
 echo"<a href='?req=lihatobat&a=$a&data=$data&po=$te' style='color:#000; font-size:14px; margin:5px;'>$te</a>"; } $a=$a+10; }
echo"</center></div>";
 ?>
			</div>
