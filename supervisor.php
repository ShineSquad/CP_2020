<?php 
	require "./debug/db_link.php";
	$user_type = 2;
?>
<html>
	<?php require "components/head.htm" ?>
	<body>
		<?php require "components/header.htm" ?>
		<main>
			<div class="current-tasks">
				<div class="title">
					Задачи
				</div>
				<div class="list-container">
					<?php
						$sql = "SELECT * FROM tasks";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$title = $row['title'];
							$node_id="n_".$id;
							echo "
								<label for='$node_id' class='item' id='$id'>
									$title
									<input id='$node_id' type='radio' name='task'/>
								</label>
							";
						}
					?>
				</div>
			</div>
			<div class="documents">
				<div class="check-title">
					<div class="title-name">
						Документы
					</div>
					<form class="title-select" method="GET">
						<select name="position">
							<?php
								$sql = "SELECT * FROM positions";
								$result = mysqli_query($link, $sql);
								while ($row = mysqli_fetch_assoc($result)) {
									$id = $row['id'];
									$name = $row['name'];
									echo "
										<option id='$id' value='$id'>$name</option>
									";
								}
							?>
						</select>
						<input type="submit" name="change_position" value="Изменить профессию">
					</dorm>
				</div>
				<div class="check-container">
					<?php
						$position = 0;
						if (isset($_GET["change_position"])) {
							$position = $_GET["position"];
						}
						$sql = "SELECT instructions.* FROM instructions
								INNER JOIN position_instructions
								ON instructions.id = position_instructions.instruction_id
								WHERE position_instructions.position_id = $position";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$name = $row['name'];
							$node_id="m_".$id;
							echo "
								<label for='$node_id' class='check-item' id='$id'>
									<input id='$node_id' type='checkbox' name='document'>
									<p>$name</p>
								</label>
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
								INNER JOIN menthors ON users.id=menthors.supervisor WHERE menthors.supervisor=$user_id";
						$interns = array();
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$interns[] = $row["intern"];
						}

						$sql = "SELECT * FROM users WHERE id IN (" . implode(",", $interns) . ")";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$name = $row['name'];
							$node_id="f_".$id;
							echo "
								<label for='$node_id' class='item' id='$id'>
									$name
									<input id='$node_id' type='radio' name='intern'/>
								</label>
							";
						}
					?>
				</div>
			</div>
		</main>
		<footer>
			<button onclick="apply_task()">Выдать задание</button>
		</footer>
	</body>
</html>