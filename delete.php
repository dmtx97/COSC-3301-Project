<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
</head>
<body>

	<h2>Enter or Select SSN to delete an employee:</h2>

		<form name="delete form" method="post" action="remove.php">

<?php

$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);;

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ssn FROM employee";
$result = $conn->query($sql);

?>

<label for="selected"><strong>Select SSN#:</strong></label>
<!-- <select name='ssn'> -->

<!-- <option disabled selected value>-- select an option --</option> -->
<input list="ssn" name="ssn" maxlength="9">
<datalist id="ssn">
	<?php
	while($rows = $result->fetch_assoc()){

		$ssn = $rows['ssn'];
		echo "<option value='$ssn'>$ssn</option>"; 
	}
	// $conn->close();

	?>
	</datalist>
<!-- </select> -->

<br>
<br>

<input type="submit" name="Delete" value="Delete" /></td>
</form>

</body>
</html>