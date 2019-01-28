	<?php

session_start();
?>

<html>
<head>
	<title>Remove</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$tbl_name = "employee";
	$ssn = $_POST["ssn"];

	$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);;
	if ($conn->connect_error) {
		die("<h3>Connection failed: " . $conn->connect_error."</h3>");
	}

	$sql = "DELETE FROM $tbl_name WHERE ssn = $ssn";

	if ($conn->query($sql) === TRUE){
		echo "<h3> Successfully deleted Employee </h3>";
	}

	else {
		echo "Error " . $sql . "<br>" . $conn->error;
	}
}
?>
</body>
</html>