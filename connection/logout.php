<?php

	session_start();
	
	if (!isset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6'])) {
		header("Location: index.php");
	} else if(isset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6'])!="") {
		header("Location: home.php");
	}
	
	if (isset($_GET['logout'])) {
		unset($_SESSION['kU7sDGw65ra8ee65aFasae9Dr6as5d6']);
		session_unset();
		session_destroy();
		header("Location: index.php");
		exit;
	}