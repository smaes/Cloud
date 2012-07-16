<html>
<head><title>Blog Ri32.wordpress.com</title>
<script type="text/javascript" src="calendarDateInput.js"></script>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<center>
	<h2>Agenda Anda</h2>
	<form method="post" action="kalender-view.php">
	<table>
	<tr>
		<td>Judul Agenda</td><td><input name="agenda" id="agenda" type="text" size="30"></td>
	</tr>	
	<tr>
		<td>Tanggal Kegiatan</td><td><script>DateInput('today', true)</script> </td>
	</tr>
	<tr>
		<td>Tempat Kegiatan</td><td><input name="tempat" id="tempat" type="text" size="30"></td>
	</tr>			
	<tr>
		<td>Rincian Kegiatan</td><td><textarea name="kegiatan" id="kegiatan" cols="25" rows="5" ></textarea></td>
	</tr>	
	<tr>
		<td>&nbsp;</td><td><input type="submit" onClick="return cek_kalender()" name="kirimkan" value="Simpan"></td>
	</tr>
	</table>	
	</form>
</center>
</body>
</html>

