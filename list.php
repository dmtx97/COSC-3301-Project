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
		
	<h2>List all employees and sort by:</h2>

		<form name="list form" method="GET" action="list.php">

				<select name="chosen">
					<option disabled selected value> Select</option>
					<option value="ssn">SSN</option>
					<option value="fname">First Name</option>
					<option value="lname">Last Name</option>
					<option value="dno">Department Number</option>
				</select>

			<input type="submit" name="List" value="List" /></td>
		</form>

		<br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$tbl_name = "employee";

	if(isset($_GET['chosen'])){

		$selected_val = $_GET["chosen"];


		$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);;
		if ($conn->connect_error) {
			die("<h3>Connection failed: " . $conn->connect_error."</h3>");
		}

		$sql   = "SELECT * FROM $tbl_name ORDER BY $selected_val"; //value is safe

		$result = $conn->query($sql);

		$all_property = array();  //declare an array for saving property

		if (!empty($selected_val)){

//sourced from https://stackoverflow.com/a/37400065
	//showing property
			echo '<table border="2" cellspacing="2" cellpadding="2">';  //initialize table tag
			while ($property = mysqli_fetch_field($result)) {
			    echo '<td>' . $property->name . '</td>';  //get field name for header
			    array_push($all_property, $property->name);  //save those to array
			}
			echo '</tr>'; //end tr tag

			//showing all data
			while ($row = mysqli_fetch_array($result)) {
			    echo "<tr>";
			    foreach ($all_property as $item) {
			        echo '<td>' . $row[$item] . '</td>'; //get items using property value
			    }
			    echo '</tr>';
			}
			echo "</table>";
		}
		$conn->close();
	}
}

?>

</body>
</html>
