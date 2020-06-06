<?php 
	require "./debug/db_link.php";
	$user_type = 3;
?>
<html>
	<?php require "components/head.htm" ?>
	<body>
		<?php require "components/header.htm" ?>
		<main>
			<div class="tasks">
				<div class="title">Текущие задачи</div>
				<div class="list-container">
					<div class="item">
						Сделать мне кофе
					</div>
					<?php
						$sql = "SELECT * FROM tasks WHERE to_id=$user_id";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$title = $row['title'];

							$out = "<form method='GET'>
								<input type='text' name='task_id' value='$id' style='display:none'>
								<input type='submit' name='see_task' value='$title'>
							</form>";

							echo $out;
						}
					?>
				</div>
			</div>
			<div class="active-tasks">
				<div class="active-tasks-title">
					Текущие задачи
				</div>
				<div class="active-tasks-container">
					
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
										ON task_instructions.instruction_id = instructions.id";
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