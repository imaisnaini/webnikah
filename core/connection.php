<?php 
	/* Setting for online
	$servername = "localhost";
	$username = "id5573945_imaisnaini";
	$password = "123456";
	$dbname = "id5573945_db_rumah_mukenah";
	*/

	// Setting for local
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db_nikahyuk";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Databaase connection failed with followings errors : ". mysqli_connect_errno();
		die();
	}
 ?>