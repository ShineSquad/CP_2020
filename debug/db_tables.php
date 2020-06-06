<?php
	require "db_link.php";

	if (isset($_GET["create"])) {
		require "tables_sql.php";
		require "tables_fiction.php";
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
?>

<?php require "nav.php";?>
<form method="GET">
	<input type="submit" name="create" value="Create tables">
	<input type="submit" name="remove" value="Remove tables">
	<input type="submit" name="clear" value="Clear tables">
</form>