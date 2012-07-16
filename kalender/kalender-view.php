<html>
<head>
	<title></title>
</head>
<body>
	<?
	$agenda=ucwords($_POST['agenda']);
	$tanggal=$_POST['today'];
	$tempat=ucwords($_POST['tempat']);
	$kegiatan=$_POST['kegiatan'];
	
	//kalo kosong
	if(empty($agenda)||empty($tanggal) || empty($tempat) || empty($kegiatan)){
		?>
		<script>alert("Maaf data Anda belum lengkap");</script>
		<script language="javascript">document.location.href="kalender-input.php"</script><?
		
	}else{
		?>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<table width="366" cellspacing="3" cellpadding="3" border="1" align="center" class="datatable">
		<tr>
			<td width="34%" valign="middle">Judul agenda</td>
			<td width="66%"><? echo $agenda; ?></td>
		</tr>
		
		<tr>
			<td valign="middle">Tanggal Kegiatan</td>
			<td><? echo $tanggal; ?></td>
		</tr>
		<tr>
			<td>Tempat</td>
			<td><? echo $tempat;?></td>
		</tr>
		<tr>
			<td>Rincian Kegiatan</td>
			<td><? echo $kegiatan;?></td>
		</tr>
		<tr>
			<td><a href="kalender-input.php" style="text-decoration:none" title="Kembali ke Form">&laquo;Back</a></td>
		</tr>
</table>
	<?
	}
	?>	
</body></html>