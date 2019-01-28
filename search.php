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

		<h2>Search Employees by Name:</h2>
		<form name="search form" method="GET" action="search.php">
				<label for="name"><strong>Enter name or part of name:</strong></label>
				<br>
				<td><input name="name" type="text"/></td>
				<input type="submit" name="Search" value="Search" /></td>
			<br>
			<br>
		</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$tbl_name = "employee";
	if(isset($_GET['name'])){
		$name = filter_var($_GET['name'], FILTER_SANITIZE_STRING);
	// $name = $_GET['name'];

	$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"],$_SESSION["dbname"]);;
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

		$sql = "SELECT * FROM $tbl_name WHERE CONCAT( fname, ' ', lname ) LIKE '%$name%'";
		
		$result = $conn->query($sql);

		$all_property = array();  //declare an array for saving property

		if (!empty($_GET['name'])){
			// sourced from https://stackoverflow.com/a/37400065
			// showing property
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