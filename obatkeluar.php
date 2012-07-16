<?php 
session_start(); 
?>
<p align="center"><font size="+3">Laporan Obat Keluar</font></p><br />
	 <form method="post" action="?req=obatkeluar">
<select name="bulan">
    <option>.: Bulan :.</option>
	<option value="01">JANUARI</option>
	<option value="02">FEBRUARI</option>
	<option value="03">MARET</option>
	<option value="04">APRIL</option>
	<option value="05">MEI</option>
	<option value="06">JUNI</option>
	<option value="07">JULI</option>
	<option value="08">AGUSTUS</option>
	<option value="09">SEPTEMBER</option>
	<option value="10">OKTOBER</option>
	<option value="11">NOVEMBER</option>
	<option value="12">DESEMBER</option></select> 
	<select name="tahun">
    <option>.: Tahun :.</option>
	<option value="2011">2011</option>
	<option value="2012">2012</option>
	<option value="2013">2013</option>
	<option value="2014">2014</option>
	<option value="2015">2015</option>
	</select><input type="submit" name="sort" value="Cari" /></form>
	 <?php
		error_reporting(0);
if(empty($_GET[a])){ $a=0; }else{
 $a=$_GET[a]; }

		include "conn.php";
		//error_reporting(0);
		// Deklarasi variabel
if(isset($_POST[sort])){
		$bulan=$_POST['bulan'];
		$tahun=$_POST['tahun'];} else{
		$bulan=$_GET['bulan'];
		$tahun=$_GET['tahun'];
		}
		//$alt2=$_POST['klinik'];
		//echo $alt1;
?>
<table id="myHTMLTable" border="1" align="left" class="cssform1">
<tr>
<th align="center">Id_salesman</th>
<th align="center">Jumlah</th>

</tr>

<?php
if(!$tanggal=="-"){
	$query = mysql_query("SELECT jumlah_pengambilan,id_salesman FROM mengambil WHERE substr(tanggal_keluar,1,4)='$tahun' and substr(tanggal_keluar,6,2)='$bulan' group by id_salesman order by tanggal_keluar desc limit 0,4");
}else{
	$query = mysql_query("SELECT jumlah_pengambilan,id_salesman FROM mengambil WHERE substr(tanggal_keluar,1,4)='$tahun' and substr(tanggal_keluar,6,2)='$bulan' group by id_salesman order by tanggal_keluar desc limit 0,4");
}

while($row=mysql_fetch_array($query))
{
	$query1 = mysql_query("SELECT sum(jumlah_pengambilan) jml,id_salesman FROM mengambil WHERE substr(tanggal_keluar,1,4)='$tahun' and substr(tanggal_keluar,6,2)='$bulan' and id_salesman='$row[id_salesman]'order by id_salesman");
while($rew=mysql_fetch_array($query1))
{ $jum=$rew[jml]; $idsal=$rew[id_salesman];}
?>

	<tr>
		<td><?=$idsal?></td>
		<td><?=$jum?></td>
	 
	</tr>
<? } ?>

	</table>
	<br><br>
	<script type="text/javascript">
	$('#myHTMLTable').convertToFusionCharts({
		swfPath: "FusionChartsFree/Charts/",
		type: "MSColumn3D",
		data: "#myHTMLTable",
		dataFormat: "HTMLTable"
	});

	$('#myHTMLTable1').convertToFusionCharts({
		swfPath: "FusionChartsFree/Charts/",
		type: "Pie2D",
		data: "#myHTMLTable1",
		dataFormat: "HTMLTable"
	});
	</script>
