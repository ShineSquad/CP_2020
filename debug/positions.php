<?php 
	require "db_link.php";

	if (isset($_GET["inst_pos"])) {
		$pos = $_GET["position"];
		$sql = "INSERT INTO position_instructions (id, instruction_id, position_id) VALUES ";

		$values = array();

		foreach ($_GET as $key => $value) {
			if (preg_match("/instr_/", $key)) {
				$values[] = "(NULL, $value, $pos)";
			}
		}

		$sql .= implode(",", $values);
		// echo $sql;
		mysqli_query($link, $sql);
	}
?>

<form method="GET">
	<table>
		<tr>
			<td>position</td>
			<td>instructions</td>
		</tr>
		<tr>
			<td>
				<select name="position">
					<?php
						$sql = "SELECT * FROM positions";
						$result = mysqli_query($link, $sql);


						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row["id"];
							$name = $row["name"];
							$out = "<option value='$id'>$name</option>";
							echo $out;
						}
					?>
				</select>
			</td>
			<td>
				<div style="height: 200px; overflow-y: auto;">
					<?php
						$sql = "SELECT instructions.* FROM instructions";
						$result = mysqli_query($link, $sql);


						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row["id"];
							$name = $row["name"];
							$get_name = "instr_" . $id;
							$out = "<input type='checkbox' name='$get_name' value='$id'>$name<br>";
							echo $out;
						}
					?>
				</div>
			</td>
		</tr>
	</table>

	<input type="submit" name="inst_pos" value="Add instructions to position">
</form>