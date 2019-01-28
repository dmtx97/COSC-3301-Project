<?php
// Start the session
session_start();
?>


<html>
<head>
<title>Add</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// retrieve all variables
	$tbl_name = "employee";
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$ssn = $_POST["ssn"];
	$minit = $_POST["minit"];
	$sex = $_POST["sex"];
	$bdate = $_POST["bdate"];
	$salary = $_POST["salary"];
	$address = $_POST["address"];
	$superssn = $_POST["superssn"];
	$dno = $_POST["dno"];

	// insert information to database

	$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);;
	if ($conn->connect_error) {
		die("<h3>Connection failed: " . $conn->connect_error."</h3>");
	}

	$sql="insert into $tbl_name (fname,minit,lname,ssn,bdate,address,sex,salary,superssn, dno) values"."('$fname','$minit','$lname','$ssn','$bdate','$address','$sex','$salary','$superssn','$dno')";

	if ($conn->query($sql) === TRUE) {
		echo "<h3>New record inserted successfully</h3>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>

</body>
</html>
