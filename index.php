<?php
	require "./debug/db_link.php";
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
				generalities = document.getElementById('generalities');
			main.style.display = "block";
			generalities.style.display = "none";
		}
	</script>
</head>
<body>
	<?php require "./components/header-style.htm"?>
	<main>
		<?php require "./components/card-style.htm"?>
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
				<div class="active-tasks" onclick="window.location.href = './intern.php';">
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
				<div class="job-responsibilities">
					<div class="card-img">
						<img src="styles/icons/2.png">
					</div>
					<div class="card-title">
						<p>
							Должностные обязанности, права и ответственность
						</p>
					</div>
				</div>
				<div class="documents">
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
				<div class="institute-structure">
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

		<div class="tasks-content" id="tasks" style="display: none;">
			<div class="tasks-left">
				<div class="task-title">
					Задачи
				</div>
				<div class="task-list">
					<div class="task-item">
						Название
					</div>
				</div>
			</div>
			<div class="tasks-right">
				<div class="tasks-right-content">
					<div class="active-title">
						Активные задачи
					</div>
					<div class="active-list">
						<div class="active-item">
							<div class="item-title">Название</div>
							<div class="item-description">Описание Описание Описание ОписаниеОписаниеОписаниеОписание Описание Описание Описание Описание</div>
							<div class="item-documents">
								<a href="#" download="">Документ 1</a>
								<a href="#" download="">Документ 2</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php require"./components/footer-style.htm"?>
</body>
</html>