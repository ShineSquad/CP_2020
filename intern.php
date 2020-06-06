<?php require "./debug/db_link.php" ?>
<html>
	<?php require "components/head.htm" ?>
	<body>
		<?php require "components/header.htm" ?>
		<main>
			<div class="tasks">
				<div class="title">Задачи</div>
				<div class="list-container">
					<div class="item">
						Сделать мне кофе
					</div>
					<?php
						$sql = "SELECT * FROM tasks";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$title = $row['title'];
							echo "
								<div class='item' id='$id'>
									$title
								</div>
							";
						}
					?>
				</div>
			</div>
			<div class="active-tasks">
				<div class="active-tasks-title">
					Текущие задачи
				</div>
				<div class="active-tasks-container">
					<div class="active-item">
						<div class="item-title">Название</div>
						<div class="item-description">Описание Описание ОписаниеОписаниеОписаниеОписание Описание ОписаниеОписаниеОписаниеОписание Описание Описание Описание Описание</div>
						<div class="item-documents">
							<a href="#" download>Документ 1</a>
							<a href="#" download>Документ 2</a>
						</div>
					</div>
				</div>
			</div>
			<div class="check-list">
				<div class="title">
					Чек лист
				</div>
				<div class="list-container">
					<div class="item">
						Ну тут что-то
					</div>
				</div>
			</div>
		</main>
	</body>
</html>