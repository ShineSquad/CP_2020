<?php
	require "../debug/db_link.php";

	$id = $_GET["id"];

	$sql = "SELECT * FROM tasks WHERE id=$id";
	$result = mysqli_query($link, $sql);

	$info = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$title = $row["title"];
		$description = $row["description"];

		$info["title"]       = $title;
		$info["description"] = $description;
	}
	
	$sql = "SELECT instructions.* FROM task_instructions
			INNER JOIN instructions
			ON task_instructions.instruction_id = instructions.id
			WHERE task_instructions.task_id = $id";
	$result = mysqli_query($link, $sql);

	$docs = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$d_link = $row["link"];
		$d_name = $row["name"];

		$docs[] = array(
			"link" => $d_link,
			"name" => $d_name
		);
	}

	$info["documents"] = $docs;

	echo json_encode($info, JSON_UNESCAPED_UNICODE);
?>