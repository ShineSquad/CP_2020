<?php
	$sql = "INSERT INTO roles (id, name) 
			VALUES (1, 'empty'),
				   (2, 'supervisor'),
				   (3, 'intern')";

	mysqli_query($link, $sql);

	$sql = "INSERT INTO users (id, name, role_id)
			VALUES (1, 'Misha', 1)";

	mysqli_query($link, $sql);

	$base = $_SERVER['DOCUMENT_ROOT'] . '/CP_2020/data/';
	echo $_SERVER['DOCUMENT_ROOT'];

	$instructions = scandir($base);

	foreach ($instructions as $key => $file) {
		if ($file == "." || $file == "..") continue;
		$f_link = "/CP_2020/data/" . $file;
		$name = "Инструкция №" . preg_replace("/[\D]/", "", $file);

		$sql = "INSERT INTO instructions (id, name, link)
				VALUES (NULL, '$name', '$f_link')";

		mysqli_query($link, $sql);
	}

	$positions = ["Токарь", "Бухгалтер", "Кабельщик", "Секретарь", "Дворник"];

	$sql = "INSERT INTO positions (id, name) VALUES ";
	$arr = array();
	foreach ($positions as $key => $value) {
		$arr[] = "(NULL, '$value')";
	}

	$sql .= implode(",", $arr);
	mysqli_query($link, $sql);
?>