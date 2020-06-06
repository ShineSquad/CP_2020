<?php
	require "./debug/db_link.php";
	$user_type = 3;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Главная</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<script type="text/javascript" src="scripts/script.js"></script>
	<script type="text/javascript">
		function open_reglament() {
			var main = document.getElementById('main-content'),
				generalities = document.getElementById('generalities');
			main.style.display = "none";
			generalities.style.display = "block";
		}

		function back() {
			var main = document.getElementById('main-content'),
				generalities = document.getElementById('generalities'),
				tasks = document.getElementById('tasks'),
				responsibilities = document.getElementById('responsibilities'),
				documents = document.getElementById('documents'),
				instituteStructure = document.getElementById('institute-structure');
			main.style.display = "block";
			generalities.style.display = "none";
			tasks.style.display = "none";
			responsibilities.style.display = "none";
			documents.style.display = "none";
			instituteStructure.style.display = "none";
		}

		function open_task() {
			var main = document.getElementById('main-content'),
				tasks = document.getElementById('tasks');
			main.style.display = "none";
			tasks.style.display = "block";
		}

		function open_responsibilities() {
			var main = document.getElementById('main-content'),
				responsibilities = document.getElementById('responsibilities');
			main.style.display = "none";
			responsibilities.style.display = "block";
		}

		function open_documents() {
			var main = document.getElementById('main-content'),
				documents = document.getElementById('documents');
			main.style.display = "none";
			documents.style.display = "block";
		}

		function open_institute() {
			var main = document.getElementById('main-content'),
				instituteStructure = document.getElementById('institute-structure');
			main.style.display = "none";
			instituteStructure.style.display = "block";
		}
	</script>
</head>
<body>
	<?php require "./components/header.php"?>
	<main>
		<?php require "./components/card-style.php"?>
		<div class="title-instruction">
			Инструкция должности
		</div>
		<div class="main-content" id="main-content">
			<div class="top-content">
				<div class="main-regulations" onclick="open_reglament()">
					<div class="card-img">
						<img src="styles/icons/4.png">
					</div>
					<div class="card-title">
						<p>
							Общие <br>
							положения
						</p>
					</div>
				</div>
				<div class="active-tasks" onclick="open_task()">
					<div class="card-img">
						<img src="styles/icons/1.png">
					</div>
					<div class="card-title">
						<p>
							Задания для ознакомления с должностью
						</p>
					</div>
				</div>
			</div>
			<div class="bottom-content">
				<div class="job-responsibilities" onclick="open_responsibilities()">
					<div class="card-img">
						<img src="styles/icons/2.png">
					</div>
					<div class="card-title">
						<p>
							Должностные обязанности, права и ответственность
						</p>
					</div>
				</div>
				<div class="documents" onclick="open_documents()">
					<div class="card-img">
						<img src="styles/icons/3.png">
					</div>
					<div class="card-title">
						<p>
							Документация <br>
							и условия труда
						</p>
					</div>
				</div>
				<div class="institute-structure" onclick="open_institute()">
					<div class="card-img">
						<img src="styles/icons/5.png">
					</div>
					<div class="card-title">
						<p>
							Структура <br>
							института
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="generalities-content" id='generalities'>
			<div class="generalities-left">
				<img src="./styles/icons/arrow-back.svg" class="arrow-back" onclick="back()">
				<div class="generalities-left-content">
					<p>1. Педагог-психолог относится к категории специалистов.</p>
					<p>2. На должность педагога-психолога назначается лицо, имеющее среднее психологическое или среднее педагогическое образование с дополнительной специальностью "Психология".</p>
					<p>3. Назначение на должность педагога-психолога и освобождение производится приказом директора.</p>
					<p>
						4. Педагог-психолог должен знать: <br>
						4.1. Конституцию РФ. <br>
						4.5. Нормативные документы, регулирующие вопросы охраны труда, профориентации, занятости обучающихся (воспитанников) и их социальной защиты.
					</p>
				</div>
			</div>
			<div class="generalities-right">
				<div class="generalities-right-content">
					<p class="generalities-title">Руководители:</p>
					<div class="list-description">
						<li>Александров Макар Андреевич - Доктор наук химии</li>
						<li>Брежнев Леонид Ильич - Доктор наук химии</li>
					</div>
				</div>
				<div class="generalities-right-content">
					<p class="generalities-title">Дрес-код:</p>
					<div class="list-description">
						<li>Описание одежды. На должность педагога-психолога назначается лицо.</li>
						<li>Описание одежды.</li>
					</div>
				</div>
				<div class="generalities-right-content">
					<p class="generalities-title">Расписание:</p>
					<div class="list-description">
						<li>Описание тайминга. Обед или расписание работы или вообще, что угодно.</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
		</div>

		<div class="tasks-content" id="tasks">
			<div class="tasks-left">
				<img src="./styles/icons/arrow-back.svg" class="arrow-back" onclick="back()">
				<div class="task-title">
					Задачи
				</div>
				<div class="task-list">
					<?php
						$sql = "SELECT * FROM tasks WHERE to_id=$user_id";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$title = $row['title'];

							$out = "<form method='GET'>
								<input type='text' name='task_id' value='$id' style='display:none'>
								<input type='submit' name='see_task' class='task-item' value='$title'>
							</form>";

							echo $out;
						}
					?>
				</div>
			</div>
			<div class="tasks-right">
				<div class="tasks-right-content">
					<div class="active-title">
						Активные задачи
					</div>
					<div class="active-list">
						<?php
							if (isset($_GET["see_task"])) {
								$id = $_GET["task_id"];

								$sql = "SELECT * FROM tasks WHERE id=$id";
								$result = mysqli_query($link, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$title = $row["title"];
									$description = $row["description"];

									echo "<div class='active-item'>";
									echo "<div class='item-title'>$title</div>";
									echo "<div class='item-description'>$description</div>";
								}

								echo "<div class='item-documents'>";
								
								$sql = "SELECT instructions.* FROM task_instructions
										INNER JOIN instructions
										ON task_instructions.instruction_id = instructions.id
										WHERE task_instructions.task_id = $id";
								$result = mysqli_query($link, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$d_link = $row["link"];
									$d_name = $row["name"];

									echo "<a href='$d_link' download>$d_name</a>";
								}

									echo "</div>";
								echo "</div>";
							}
						?>
					</div>
				</div>
			</div>
		</div>

		<div class="responsibilities-content" id="responsibilities">
			<div class="responsibilities-left">
				<img src="./styles/icons/arrow-back.svg" class="arrow-back" onclick="back()">
				<div class="responsibilities-title">
					Должностные обязанности
				</div>
				<div class="duties-list">
					<div class="list-item">
						<p class="title">Заголовок</p>
						<li>Текст</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
			<div class="responsibilities-right">
				<div class="responsibilities-title">
					Права
				</div>
				<div class="rights-list">
					<div class="list-item">
						<p class="title">Заголовок</p>
						<li>Текст</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
		</div>

		<div class="documents-content" id="documents">
			<div class="documents-left">
				<img src="./styles/icons/arrow-back.svg" class="arrow-back" onclick="back()">
				<div class="documents-title">
					Документы ...
				</div>
				<div class="documents-list">
					<div class="list-item">
						<p class="title">Заголовок</p>
						<li>Текст</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
			<div class="documents-right">
				<div class="documents-title">
					Документы ...
				</div>
				<div class="documents-list">
					<div class="list-item">
						<p class="title">Заголовок</p>
						<li>Текст</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
		</div>

		<div class="institute-content" id="institute-structure">
			<div class="institute-left">
				<img src="./styles/icons/arrow-back.svg" class="arrow-back" onclick="back()">
				<div class="institute-title">
					Описание ...
				</div>
				<div class="institute-list">
					<div class="list-item">
						<p class="title">Заголовок</p>
						<li>Текст</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
			<div class="institute-right">
				<div class="institute-title">
					Описание ...
				</div>
				<div class="institute-list">
					<div class="list-item">
						<p class="title">Заголовок</p>
						<li>Текст</li>
						<li>Текст</li>
					</div>
				</div>
			</div>
		</div>

	</main>
	<?php require"./components/footer-style.htm"?>
</body>
</html>