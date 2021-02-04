<?php include('pagin_act.php');

	$edit_state = false; 
		$id = 0;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pagination</title>
	</head>

	<body>
		<h1>Pagination</h1>

		<p>Write into database</p>
		<form method="post" action="pagin_act.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="text" name="name1" placeholder="Name 1" value="<?php echo $name1; ?>">
			<input type="text" name="name2" placeholder="Name 2" value="<?php echo $name2; ?>">
			<?php if ($edit_state == false) { ?>
			<button type="submit" name="submit">Submit</button>
			<?php } else { ?>
			<button type="submit" name="update">Update</button>
			<?php } ?>
		</form>

		<br><br>

		




		<table border="4" cellspacing="0">
			<tr>
				<td>ID</td>
				<td>Param 1</td>
				<td>Param 2</td>
			</tr>

			<?php 

				

				$conn = mysqli_connect("localhost", "user", "password", "test");

				if (!$conn) {
					echo "Connection failed.";
					exit;
				} 
			
				$sql = "SELECT id, name1, name2 FROM pagination_table";
				$result = mysqli_query($conn, $sql);
				$checkResult = mysqli_num_rows($result);
			/*
				if ($checkResult > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo $row['id'] . " / " . $row['name1'] . "  " . $row['name2'] . "<br>";
					}
				}
			*/
				$result_per_page = 10;
				
				// print_r($result_per_page);


				$number_of_pages = ceil($checkResult / ($result_per_page + 1));

				for ($page = 1; $page <= $number_of_pages; $page++) {
					echo '<a href="pagination.php?page='. $page .'"> ' . $page . ' </a> ';
				}

				echo "<br><br>";

				if (!isset($_GET['page'])) {
					$page = 1;
				} else {
					$page = $_GET['page'];
				}

				$this_page_first_result = ($page - 1) * $result_per_page;

				$sql = "SELECT * FROM pagination_table LIMIT " . $this_page_first_result . ' , ' . $result_per_page;
				$result = mysqli_query($conn, $sql);
				$checkResult = mysqli_num_rows($result);

				if ($checkResult > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo '<tr><td>' . $row['id'] . '</td><td> ' . $row['name1'] . '</td><td> ' . $row['name2'] . '</td></tr>';
					}
				}

				if (isset ($_POST['update'])) {
					$name1  = mysqli_real_escape_string($_POST['name1']);
					$name2  = mysqli_real_escape_string($_POST['name2']);
					$id  = mysqli_real_escape_string($_POST['id']);
				}
			 ?>

		</table>

	</body>
</html>