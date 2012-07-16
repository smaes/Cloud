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

$q = mysql_query("select * from jenis order by id_jenis limit $a,10"); 

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
<center><h2 style="font-family:arial; font-size:16px; font-weight:bold; color:#666;" >Daftar Jenis Obat</h2></center>
    <table align="center" width="500" border="0" cellspacing="0" cellpadding="6" style="font-family:arial; font-size:12px; font-weight:bold; color:#000; margin:auto">
      <tr style="font-size:12px; font-weight:bold; background-color:#3d107b; color:#fff;" height="30">
    <td width="100" style="border:solid #000 1px; border-right:none;">Id Jenis</td>
    <td width="200" style="border:solid #000 1px; border-right:none;">Nama Jenis</td>
    <td width="50" style="border:solid #000 1px; ">&nbsp;</td>
  </tr>
  <?
  $aa=0;
  while ($j = mysql_fetch_array($q))
  { 
  ?>
  <tr <? if ($x%2==0){?>class="ctable"<? }else{?>class="etable"<? } ?> height="20">
    <td style="border:solid #000 1px; border-right:none; border-top:none;"><?=$j[id_jenis]?></td>
    <td style="border:solid #000 1px; border-right:none; border-top:none;"><?=$j[nama_jenis]?></td>
    <td style="border:solid #000 1px; border-top:none;"><a href="aksi_jenis.php?hapus=1&id=<?=$j[id_jenis]?>">Hapus</a></td>
  </tr>
  <?
  $x++;
  }
  ?>
</table>

<? $quer5=mysql_query("select count(id_jenis) usaha1 from jenis order by id_jenis "); 

$data='';

while($baris5 = mysql_fetch_array($quer5))
 { 
 $b=$baris5[usaha1];
 $c=$b-$a;}

echo"<div style='float:left; width:100%'><center><a href='#' style='color:#000; font-size:14px; margin:5px;'>Page</a>"; 
$er=$b/10; $et=ceil($er); 
$a=0;
for($te=1; $te<=$et; $te++){ if($_REQUEST[po]==$te){ echo"<a href='?req=lihatjenis&a=$a&data=$data&po=$te' style='color:#999; font-size:14px; margin:5px;'>$te</a>"; }else{
 echo"<a href='?req=lihatjenis&a=$a&data=$data&po=$te' style='color:#000; font-size:14px; margin:5px;'>$te</a>"; } $a=$a+10; }
echo"</center></div>";
 ?>
			</div>
