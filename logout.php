<?php
/*echo "hi";
exit;*/
    include('urlset.php');
	session_start();
	
	if (!isset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6'])) {
		header("Location: ".base_url()."");
	} else if(isset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6'])!="") {
		header("Location: home.php");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6']);
		session_unset();
		session_destroy();
		header("Location: ".base_url()."");
		exit;
	}