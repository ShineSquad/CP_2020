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
					<div class="check-item">
						<input type="checkbox">
						<p>Название документа</p>
					</div>
				</div>
			</div>
			<div class="intern-list">
				<div class="title">
					Стажеры
				</div>
				<div class="list-container">
					<?php
						$sql = "SELECT * FROM users";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$name = $row['name'];
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