<?php
$user = "root";
$pass = "";
$host = "localhost";
$name = "NEWBIE";

$link = mysqli_connect($host, $user, $pass, $name);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_set_charset($link, "utf8");

function insert_into($db_link, $t_name, $JSON_columns) {
	$JSON = json_decode($JSON_columns, true);
	
	$columns = "(";
	$_values = "(";

	foreach ($JSON as $key => $value) {
		if ($value != "NULL" && !is_numeric($value)) $value = "'$value'";

		$columns .= $key . ", ";
		$_values .= $value . ", ";
	}

	$columns = substr($columns, 0, -2) . ")";
	$_values = substr($_values, 0, -2) . ")";

	$sql = "INSERT INTO $t_name $columns VALUES $_values";

	//echo $sql;
	mysqli_query($db_link, $sql);
}

function JSONtoTABLE($db_link, $JSONstr) {
	$JSON = json_decode($JSONstr, true);
	$name = $JSON["name"];

	$sql = "CREATE TABLE IF NOT EXISTS $name (";
	foreach ($JSON["columns"] as $key => $value) {
		$sql .= "$key $value, ";
	}

	$sql .= 'PRIMARY KEY (' . $JSON["primary_key"] . ')';

	if (isset($JSON["foreign_keys"])) {
		foreach ($JSON["foreign_keys"] as $key => $value) {
			$sql .= ", FOREIGN KEY (" . $value["column"] . ") REFERENCES " . $value["ref"];
			if (isset($value["options"])) {
				$sql .= " " . $value["options"];
			}
		}
	}

	$sql .= ") DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";

	// echo $sql . '<br>';
	mysqli_query($db_link, $sql);
};

$t_list = [
	"menthors",
	"task_instructions",
	"tasks",
	"position_instructions",
	"users",
	"instructions",
	"roles",
	"positions"
];
?>