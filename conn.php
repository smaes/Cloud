<?
$user = 'root';
$pass = '';
$host = 'localhost';
$db = 'cloud';
mysql_connect($host,$user,$pass);
mysql_select_db($db) or die('db not found');
?>