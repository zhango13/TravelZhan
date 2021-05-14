<?php
	session_start();
	$db_host="localhost";
	$db_name="test";
	$db_user="root";
	$db_pass="";
	$uname = "";
	$email    = "";
	$fail = array();
	$_SESSION['success'] = "";
		$lim = 20;
$showmodul = "smodul.php";
$sfull = "sfull.php";

	  $conn= mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		if(mysqli_connect_error()){
        echo mysqli_connect_error();
        exit;
    }

?>
