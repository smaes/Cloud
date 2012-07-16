<? session_start(); ?>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+'.\n'; }
    } if (errors) alert('Tidak boleh ada yang kosong\n');
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<script>
function checkForInt(evt) {
 var charCode = ( evt.which ) ? evt.which : event.keyCode;
 return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
}
</script>
<?
function rupiah($nominal)
 {
 $rupiah =  number_format($nominal,0, ",",".");
 $rupiah = "Rp "  . $rupiah . ",-";
 return $rupiah;
 }
?>
<div class="news_block">
<style>
.up{ margin:auto; width:350px; text-align:center;  margin-bottom:20px; border:#999999 solid 1px;background-color:#666; }
.up a{ background-color:#666; color:#FFFFFF; }
.up a:hover{ background-color:#fff; color:#000;}
</style>
<? include"waktu.php";?>

	<form method="post" action="aksi_stok.php" onsubmit="MM_validateForm('nama','','R','jenis','','R','stok','','R');return document.MM_returnValue">
    <table align="center" width="400" height="200" border="0" cellspacing="2" cellpadding="4" style="font-family:arial; font-size:12px; font-weight:bold; color:#666; margin:auto;">
  <tr>
    <td colspan="3" style="font-size:14px; padding-top:0px;" align="center" height="30" valign="top"> Form Input Stok Obat </td>
    </tr>
    <tr>
    <td>Jenis Obat</td>
    <td>:</td>
    <td><select name="jenis" id="jenis">
	<? 
	include"conn.php";
	$p = mysql_query("select * from jenis order by id_jenis");
	while($t=mysql_fetch_array($p)){  ?>
	<option value="<?=$t[id_jenis]?>"><?=$t[nama_jenis]?></option>
	<? } ?>
	</select> </td>
  </tr>
  <tr>
    <td>Nama Obat</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama" size="20" />
</td>
  </tr>
  <tr>
    <td>Stok</td>
    <td>:</td>
    <td><input name="stok" type="text" id="stok" size="10" onkeypress="return checkForInt(event)" />
</td>
  </tr>

  <tr>
    <td>Kadaluarsa</td>
    <td>:</td>
    <td><script>DateInput('today', true)</script>
</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="tambah" value="submit" style="font-family:arial; font-size:12px; background:#FFFFFF; border:1px groove #999"/></td>
  </tr>
</table></form>
			</div>

