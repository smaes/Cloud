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

<?
include"conn.php";
$q= mysql_query("select * from obat,jenis where obat.id_jenis=jenis.id_jenis and obat.id_obat='$_GET[id]' and obat.kadaluarsa='$_GET[kadal]' order by obat.id_obat limit 0,1"); 
while($y=mysql_fetch_array($q)){
?>

	<form method="post" action="aksi_obat.php" onsubmit="MM_validateForm('jumlah','','R');return document.MM_returnValue">
    <table align="center" width="400" height="200" border="0" cellspacing="2" cellpadding="4" style="font-family:arial; font-size:12px; font-weight:bold; color:#666; margin:auto;">
  <tr>
    <td colspan="3" style="font-size:14px; padding-top:0px;" align="center" height="30" valign="top"> Form Ambil Obat </td>
    </tr>
  <tr>
    <td>Nama Obat</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama" value="<?=$y[nama_obat]?>" size="20" readonly="readonly" />
	<input name="ido" type="hidden" id="ido" value="<?=$y[id_obat]?>" size="20" readonly="readonly" />
	<input name="kadal" type="hidden" id="kadal" value="<?=$y[kadaluarsa]?>" size="20" readonly="readonly" />
</td>
  </tr>
    <tr>
    <td>Jenis</td>
    <td>:</td>
    <td><input name="jenis" type="text" id="jenis" size="20" value="<?=$y[nama_jenis]?>" readonly="readonly" /> </td>
  </tr>
  <tr>
    <td>Stok</td>
    <td>:</td>
    <td><input name="stok" type="text" id="stok" size="10" value="<?=$y[jumlah_obat]?>" onkeypress="return checkForInt(event)" readonly="readonly" />
</td>
  </tr>

  <tr>
    <td>Kadaluarsa</td>
    <td>:</td>
    <td><?=$y[kadaluarsa]?>
</td>
  </tr>

  <tr>
    <td>Jumlah ambil</td>
    <td>:</td>
    <td><input name="jumlah" type="text" id="jumlah" size="10" onkeypress="return checkForInt(event)" />
</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="ambil" value="submit" style="font-family:arial; font-size:12px; background:#FFFFFF; border:1px groove #999"/></td>
  </tr>
</table></form>

<? } ?>			</div>

