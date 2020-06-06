<?php
	require "./debug/db_link.php";
	$user_type = 3;
?>
<!DOCTYPE html>
<html>
<?php require "./components/head.htm"?>
<body>
	<?php require "./components/header.php"?>
	<main>
		<?php require "./components/card-style.php"?>

		<div class="title-instruction">
			Инструкция должности
		</div>
		<?php require "./components/intern-main.htm"?>
		
		<?php require "./components/intern-generalities.htm"?>

		<?php require "./components/intern-tasks.php"?>

		<?php require "./components/intern-responsibilities.htm"?>

		<?php require "./components/intern-documents.htm"?>

		<?php require "./components/intern-institute.htm"?>
	</main>
	<?php require"./components/footer-style.htm"?>
</body>
</html>