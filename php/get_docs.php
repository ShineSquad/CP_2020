<?php
	require "../debug/db_link.php";

	$intern_id = $_GET["intern_id"];

	$sql = "SELECT * FROM users_position WHERE user_id=$intern_id";
	$result = mysqli_query($link, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		$position = $row["position_id"];
	}

		$sql = "SELECT * FROM positions WHERE id=$position";
		$result = mysqli_query($link, $sql);
		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$pos_name = $row["name"];
			}
		}

	$sql = "SELECT instructions.* FROM instructions
			INNER JOIN position_instructions
			ON instructions.id = position_instructions.instruction_id
			WHERE position_instructions.position_id = $position";
	$result = mysqli_query($link, $sql);

	$out = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$id = $row['id'];
		$name = $row['name'];
		$node_id="m_".$id;
		// echo "
		// 	<label for='$node_id' class='document-item' id='$id'>
		// 		<input id='$node_id' type='checkbox' name='document'  value='$id'>
		// 		<p>$name</p>
		// 	</label>
		// ";
		$out[] = array(
			"doc_id" => $id,
			"doc_name" => $name
		);
	}

	echo json_encode($out, JSON_UNESCAPED_UNICODE);
?>