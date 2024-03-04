<?php 

session_start();
session_destroy(); // sessionlar bu kodla iptal edilir

header("Location: ../login.php");

?>