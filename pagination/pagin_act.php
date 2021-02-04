<?php 

	$dbServername = "localhost";
	$dbUsername = "user";
	$dbPassword = "password";
	$dbName = "test";

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	if (!$conn) {
		echo "Connection failed.";
		exit;
	} else {
		// echo "<h1 style='color: green;'>You connected successfully</h1>";
	}

	$name1 = "";
	$name2 = "";

	$name1 = $_POST['name1'];
	$name2 = $_POST['name2'];

	$sql = "INSERT INTO pagination_table (name1, name2) VALUES ('$name1', '$name2')";
	$result = mysqli_query($conn, $sql);

	if (!$result) {
		echo "Result did not wroten in the database!";
		exit;
	}

	// header("location: pagination.php");

	if (isset ($_POST['update'])) {
					$name1  = mysqli_real_escape_string($_POST['name1']);
					$name2  = mysqli_real_escape_string($_POST['name2']);
					$id  = mysqli_real_escape_string($_POST['id']);
				}

 ?>