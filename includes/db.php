<?php
	//create a mySQL DB connection:
	// $dbhost = "zahe.c6vazgunaywf.us-east-1.rds.amazonaws.com";
	// $dbuser = "admin";
	// $dbpass = "0502846050";
	// $dbname = "barber";
	$dbhost = "baderdaka2821119.domaincommysql.com";
	$dbuser = "barberdata";
	$dbpass = "Bader@123";
	$dbname = "barber";

	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	//testing connection success
	if (mysqli_connect_errno()) {
		echo'bb';
		die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
    
	
?>

<?php 

?> 