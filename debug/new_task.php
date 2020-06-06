<?php
$tasks = array(
	array(
		"title" => "Сделай кофе",
		"description" => "Сладкий с молоком, не слишком теплый, жду через 5 минут"
	),
	array(
		"title" => "Посидеть на Pikabu",
		"description" => "Составь список трендов, мне в личку 5 постов с рейтингов выше 3500"
	),
	array(
		"title" => "Посидеть на Хабре",
		"description" => "Жду пять лучших постов по PHP за последний месяц, с рейтингом выше 250"
	),
	array(
		"title" => "Приготовь обед",
		"description" => "Хочу роллов и колы"
	),
	array(
		"title" => "Пентагон",
		"description" => "Напиши бота, который будет взламывать сайты пентагона"
	),
	array(
		"title" => "Экзамен",
		"description" => "Сделай бота, который составит твой итоговый тест"
	),
	array(
		"title" => "Экзамен доп.",
		"description" => "Сделай бота, который пройдет итоговый тест за тебя"
	),
	array(
		"title" => "Штрафы",
		"description" => "Придумай, за что тебя можно оштрафовать, список из пяти пунктов жду через 15 минут"
	),
	array(
		"title" => "Командировка",
		"description" => "Найди билеты на ближайший самолет до озера Байкал, или лучше на Волгу? Проанализируй, где лучше туризм, туда и закажи билеты, жду через час"
	),
	array(
		"title" => "Чай с пончиком",
		"description" => "Чай без сахара и пончик с шоколадной низкокалорийной глазурью"
	),
	array(
		"title" => "Кондиционер",
		"description" => "Почини кондиционер"
	),
	array(
		"title" => "Изготовление 3 образцов партии",
		"description" => "Изготовить 3 тестовых образца партии имя детали со следующими размерами: 20х30, 40х50, 60х80. После выполнения задачи подготовить отчет."
	)
);

if (isset($_GET["add"])) {
	require "db_link.php";

	$l = count($tasks);
	$i = rand(0, $l-1);
	$t = $tasks[$i];

	$title = $t['title'];
	$description = $t['description'];

	$sql = "INSERT INTO tasks (id, title, description, from_id, to_id, status) VALUES (NULL, '$title', '$description', 1,1,0)";
	
	mysqli_query($link, $sql);
}
?>

<?php require "nav.php";?>

<form method="GET">
	<input type="submit" name="add" value="Add task">
</form>