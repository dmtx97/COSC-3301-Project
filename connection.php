<?php
// Start the session
session_start();
?>
<html>
<head><title>Connection</title></head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

	//mysql credentials
	$servername = "localhost";
	$username = "";
	$password = "";
	$dbname = "company";
	
	$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


	//Open a new connection to the MySQL server
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("<h3>Connection failed: " . $conn->connect_error."</h3>");
	}
	else{
		echo "<center><h3>Connected to Company database</h3></center>";
	}
	$_SESSION["servername"] = $servername;
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
	$_SESSION["dbname"] = $dbname;
}
?>

