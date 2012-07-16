<? session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Kimia Farma</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="menuh.css" rel="stylesheet" type="text/css" media="screen" />
	<script type="text/javascript" src="kalender/calendarDateInput.js"></script>
 <script type="text/javascript" src="FusionChartsFree/JS/jquery-1.4.2.js"></script>
 <script type="text/javascript" src="FusionChartsFree/JS/jquery.fusioncharts.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header">
			<div id="logo">
				<img src="images/logo.png" width="250" />
				

			</div>
			<div id="menu">

<div style="height:80px; width:200px;">&nbsp;</div>				
<div id="menuh">
<? if(!isset($_SESSION[id])){ } 
else if(isset($_SESSION[id]) and $_SESSION[status]=='supplier'){ ?>
					<ul>
<li><a href="#" class="top_parent">Obat</a>
			<ul >
		<li class="link"><a href="?req=lihatobat" class="parent">View Obat</a></li>
		<li class="link"><a href="?req=inputobat" class="parent">Input Obat</a></li>
		</ul></li>
		</ul>
					<ul><li><a href="#" class="top_parent">Jenis</a>
			<ul >
		<li class="link"><a href="?req=lihatjenis" class="parent">View Jenis</a></li>
		<li class="link"><a href="?req=inputjenis" class="parent">Input Jenis</a></li>
		</ul></li></ul>
					<ul><li><a href="logout.php" class="top_parent">Logout</a></li></ul>
<? } else if(isset($_SESSION[id]) and $_SESSION[status]=='gudang'){  ?>
					<ul><li><a href="?req=lihatobat" class="top_parent">Obat</a></li></ul>
					<ul><li><a href="#" class="top_parent">Laporan</a>
					<ul >
		<li class="link"><a href="?req=obatmasuk" class="parent">Obat Masuk</a></li>
		<li class="link"><a href="?req=obatkeluar" class="parent">Obat Keluar</a></li>
		</ul></li></ul>
					<ul><li><a href="#" class="top_parent">Salesman</a>
			<ul >
		<li class="link"><a href="?req=lihatsales" class="parent">View Salesman</a></li>
		<li class="link"><a href="?req=inputsales" class="parent">Input Salesman</a></li>
		</ul></li></ul>
					<ul><li><a href="logout.php" class="top_parent">Logout</a></li></ul>

<? }else if(isset($_SESSION[id]) and $_SESSION[status]=='salesman'){ ?>
					<ul><li><a href="?req=lihatobat" class="top_parent">Obat</a></li></ul>
					<ul><li><a href="logout.php" class="top_parent">Logout</a></li></ul>

<? } ?>
				</ul>
			</div>
			</div>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
					
					<?
					if((!$_REQUEST[req] and !isset($_SESSION[id])) or !isset($_SESSION[id]) ){ include"home.php"; }
			else if($_REQUEST[req]==lihatobat and $_SESSION[status]==supplier){include"lihatobat.php"; } 
			else if($_REQUEST[req]==inputobat and $_SESSION[status]==supplier){include"inputobat.php"; } 
			else if($_REQUEST[req]==lihatjenis and $_SESSION[status]==supplier){include"lihatjenis.php"; } 
			else if($_REQUEST[req]==inputjenis and $_SESSION[status]==supplier){include"inputjenis.php"; } 
//supplier			
			else if($_REQUEST[req]==lihatobat and $_SESSION[status]==gudang){include"lihatobat.php"; } 
			else if($_REQUEST[req]==lihatsales and $_SESSION[status]==gudang){include"lihatsales.php"; } 
			else if($_REQUEST[req]==inputsales and $_SESSION[status]==gudang){include"inputsales.php"; } 
			else if($_REQUEST[req]==editsales and $_SESSION[status]==gudang){include"editsales.php"; } 
			else if($_REQUEST[req]==obatmasuk and $_SESSION[status]==gudang){include"obatmasuk.php"; } 
			else if($_REQUEST[req]==obatkeluar and $_SESSION[status]==gudang){include"obatkeluar.php"; } 
//gudang
			else if($_REQUEST[req]==lihatobat and $_SESSION[status]==salesman){include"lihatobat.php"; } 
			else if($_REQUEST[req]==ambil and $_SESSION[status]==salesman){include"ambil.php"; } 
//sales
			?>
				 
					</div>
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>Copyright (c) 2012. All rights reserved.</p>
</div>
<!-- end #footer -->
</body>
</html>
