<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();

	if(isset($_SESSION['stud'])){

	session_unset($_SESSION['stud']);
	session_destroy();
	}

	else if(isset($_SESSION['admin_id'])){

	session_unset($_SESSION['admin_id']);
	session_destroy();
	}



	header('Location: index.php');

?>