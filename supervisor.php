<?php require "./debug/db_link.php" ?>
<html>
	<?php require "components/head.htm" ?>
	<body>
		<?php require "components/header.htm" ?>
		<main>
			<div class="current-tasks">
				<div class="title">
					Текущие задачи
				</div>
				<div class="list-container">
					<div class="item">
						Сделать мне кофе
					</div>
				</div>
			</div>
			<div class="documents">
				<div class="check-title">
					Документы
				</div>
				<div class="check-container">
					<?php
						$sql = "SELECT * FROM instructions";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$name = $row['name'];
							echo "
								<div class='check-item' id='$id'>
									<input type='checkbox'>
									<p>$name</p>
								</div>
							";
						}
					?>
				</div>
			</div>
			<div class="intern-list">
				<div class="title">
					Стажеры
				</div>
				<div class="list-container">
					<?php
						$sql = "SELECT * FROM users
								WHERE role_id=1";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$name = $row['name'];
							$role_id = $row['role_id'];
							echo "
								<div class='item' id='$id'>
									$name
								</div>
							";
						}
					?>
				</div>
			</div>
		</main>
	</body>
</html>