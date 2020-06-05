<?php
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
$tables[] = '{
	"name": "menthors",
	"columns": {
		"id":         "INT AUTO_INCREMENT",
		"supervisor": "INT NOT NULL",
		"intern":     "INT NOT NULL"
	},
	"primary_key": "id",
	"foreign_keys": {
		"0": {
			"column": "supervisor",
			"ref":    "users(id)",
			"options": "ON DELETE CASCADE"
		},
		"1": {
			"column": "intern",
			"ref":    "users(id)",
			"options": "ON DELETE CASCADE"
		}
	}
}';

foreach ($tables as $key => $value) {
	JSONtoTABLE($link, $value);
}
?>