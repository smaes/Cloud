<?php
session_start();
   if(ISSET($_SESSION["username"]) and ISSET($_SESSION["id"]) and ISSET($_SESSION["status"]))
   {
     UNSET($_SESSION["username"]);
	 UNSET($_SESSION["id"]);
	 UNSET($_SESSION["status"]);
   } else {
     echo "log out gagal..";
   }
session_destroy();
header("location:index.php");
?>