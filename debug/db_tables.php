<?php
	require "db_link.php";

	if (isset($_GET["create"])) {
		$tables = array();
		$tables[] = '{
			"name": "roles",
			"columns": {
				"id":   "INT AUTO_INCREMENT",
				"name": "TEXT NOT NULL"
			},
			"primary_key": "id"
		}';
		$tables[] = '{
			"name": "instructions",
			"columns": {
				"id":   "INT AUTO_INCREMENT",
				"name": "TEXT NOT NULL",
				"link": "TEXT NOT NULL"
			},
			"primary_key": "id"
		}';
		$tables[] = '{
			"name": "users",
			"columns": {
				"id":      "INT AUTO_INCREMENT",
				"name":    "TEXT NOT NULL",
				"role_id": "INT NOT NULL"
			},
			"primary_key": "id",
			"foreign_keys": {
				"0": {
					"column": "role_id",
					"ref":    "roles(id)",
					"options": "ON DELETE CASCADE"
				}
			}
		}';
		$tables[] = '{
			"name": "roles_instructions",
			"columns": {
				"id":             "INT AUTO_INCREMENT",
				"instruction_id": "INT NOT NULL",
				"role_id":        "INT NOT NULL"
			},
			"primary_key": "id",
			"foreign_keys": {
				"0": {
					"column": "instruction_id",
					"ref":    "instructions(id)",
					"options": "ON DELETE CASCADE"
				},
				"1": {
					"column": "role_id",
					"ref":    "roles(id)",
					"options": "ON DELETE CASCADE"
				}
			}
		}';
		$tables[] = '{
			"name": "tasks",
			"columns": {
				"id":          "INT AUTO_INCREMENT",
				"title":       "TEXT NOT NULL",
				"description": "TEXT NOT NULL",
				"from_id":        "INT",
				"to_id":          "INT",
				"status":      "INT NOT NULL"
			},
			"primary_key": "id",
			"foreign_keys": {
				"0": {
					"column": "from_id",
					"ref":    "users(id)",
					"options": "ON DELETE CASCADE"
				},
				"1": {
					"column": "to_id",
					"ref":    "users(id)",
					"options": "ON DELETE CASCADE"
				}
			}
		}';
		$tables[] = '{
			"name": "task_instructions",
			"columns": {
				"id":             "INT AUTO_INCREMENT",
				"task_id":        "INT NOT NULL",
				"instruction_id": "INT NOT NULL"
			},
			"primary_key": "id",
			"foreign_keys": {
				"0": {
					"column": "instruction_id",
					"ref":    "instructions(id)",
					"options": "ON DELETE CASCADE"
				},
				"1": {
					"column": "task_id",
					"ref":    "tasks(id)",
					"options": "ON DELETE CASCADE"
				}
			}
		}';

		foreach ($tables as $key => $value) {
			JSONtoTABLE($link, $value);
		}

		$sql = "INSERT INTO roles (id, name) 
				VALUES (1, 'empty'),
					   (2, 'supervisor'),
					   (3, 'intern')";

		mysqli_query($link, $sql);

		$sql = "INSERT INTO users (id, name, role_id)
				VALUES (1, 'Misha', 1)";

		mysqli_query($link, $sql);
	}
	if (isset($_GET["remove"])) {
		foreach ($t_list as $key => $t_name) {
			$sql = "DROP TABLE $t_name";
			mysqli_query($link, $sql);
		}
	}
	if (isset($_GET["clear"])) {
		foreach ($t_list as $key => $t_name) {
			$sql = "DELETE FROM $t_name";
			mysqli_query($link, $sql);
		}
	}

	$instructions = scandir(__DIR__);
	print_r($instructions);
?>
<form method="GET">
	<input type="submit" name="create" value="Create tables">
	<input type="submit" name="remove" value="Remove tables">
	<input type="submit" name="clear" value="Clear tables">
</form>