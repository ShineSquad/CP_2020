<?php 
	require "db_link.php";

	$sql = "SELECT instructions.* FROM instructions";
	$result = mysqli_query($link, $sql);
	$instructions = array();

	while ($row = mysqli_fetch_assoc($result)) {
		$instructions[] = $row["id"];
	}

	if (isset($_GET["inst_pos"])) {
		$sql = "SELECT * FROM positions";
		$result = mysqli_query($link, $sql);

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["id"];
			$count = rand(3,15);

			$sql = "INSERT INTO position_instructions (id, instruction_id, position_id) VALUES ";
			$values = [];
			while ($count) {
				$i = -1;
				while ($i == -1) {
					$r = rand(0, count($instructions)-1);
					if (isset($instructions[$r])) {
						$i = $instructions[$r];
						unset($instructions[$r]);
					}
				}

				$values[] = "(NULL, $i, $id)";
				$count--;
			}

			$sql .= implode(",", $values);
			mysqli_query($link, $sql);
		}
	}
?>

<?php require "nav.php";?>

<form method="GET">
	<input type="submit" name="inst_pos" value="Add instructions to position">
</form>