<?php
ob_start();
session_start();
if(isset($_SESSION['username'])) {
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['phone']);
	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>