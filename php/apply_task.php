<?php
	require "../debug/db_link.php";
	
	$task   = $_GET["task"];
	$intern = $_GET["intern"];
	$super  = $_GET["super"];

	$sql = "UPDATE tasks SET from_id=$super, to_id=$intern, status=1
			WHERE id=$task";
	mysqli_query($link, $sql);

	$sql = "INSERT INTO task_instructions (id, task_id, instruction_id)
			VALUES ";

	$values = array();
	foreach ($_GET as $key => $value) {
		if (preg_match("/d_/", $key)) {
			$values[] = "(NULL, $task, $value)";
		}
	}

	$sql .= implode(",", $values);
	mysqli_query($link, $sql);
?>