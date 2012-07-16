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
$q = mysql_query("select * from salesman where id_salesman='$_GET[id]' order by id_salesman desc limit 0,1"); 
while($j=mysql_fetch_array($q)){
?>
	<form method="post" action="aksi_editsales.php" onsubmit="MM_validateForm('nama','','R','idsales','','R','alamat','','R');return document.MM_returnValue">
    <table align="center" width="400" height="200" border="0" cellspacing="2" cellpadding="4" style="font-family:arial; font-size:12px; font-weight:bold; color:#666; margin:auto;">
  <tr>
    <td colspan="3" style="font-size:14px; padding-top:0px;" align="center" height="30" valign="top"> Form Edit Salesman </td>
    </tr>
  <tr>
    <td>Id Salesman</td>
    <td>:</td>
    <td><input name="idsales" type="text" id="idsales" readonly="readonly" value="<?=$j[id_salesman]?>" size="20" />
</td>
  </tr>
  <tr>
    <td>Nama</td>
    <td>:</td>
    <td><input name="nama" type="text" id="nama" value="<?=$j[nama]?>" size="20" maxlength="20" />
</td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td><input name="password" type="password" id="password" size="20" maxlength="10" />
</td>
  </tr>
  <tr>
    <td>Retype Password</td>
    <td>:</td>
    <td><input name="password1" type="password" id="password1" size="20" maxlength="10" />
</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><textarea name="alamat" id="alamat" cols="20" rows="5"><?=$j[alamat]?></textarea>
</td>
  </tr>

  <tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td><?=$j[tgl_lahir]?>
</td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><input type="radio" name="jk" value="Laki-laki" <? if($j[jenis_kelamin]=='Laki-laki'){ ?> checked="checked" <? } ?> />Laki-laki 
	<input type="radio" name="jk" value="Perempuan" <? if($j[jenis_kelamin]=='Perempuan'){ ?> checked="checked" <? } ?> />Perempuan
</td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="tambah" value="submit" style="font-family:arial; font-size:12px; background:#FFFFFF; border:1px groove #999"/></td>
  </tr>
</table></form>
<? } ?>
			</div>

