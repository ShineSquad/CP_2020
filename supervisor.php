<?php
	require "./debug/db_link.php";
	$user_type = 2;
?>
<!DOCTYPE html>
<html>
	<?php require "./components/head.htm" ?>
<body>
	<?php require "./components/header.php"?>
	<main>
		<?php require "./components/card-style.php"?>
		<div class="title-instruction">
			Управление стажерами
		</div>
		<?php require "./components/supervisor-main.php"?>
	</main>
	<?php require"./components/footer-style.htm"?>
</body>
</html>