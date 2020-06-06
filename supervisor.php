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
						$sql = "SELECT * FROM tasks WHERE status=0";
						$result = mysqli_query($link, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$id = $row['id'];
							$title = $row['title'];
							$node_id="n_".$id;
							echo "
								<label for='$node_id' class='item' id='$id'>
									$title
									<input id='$node_id' type='radio' name='task' value='$id'/>
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
				</div>
				<div class="check-container">
					<?php
						$position = 1;
						if (isset($_GET["change_position"])) {
							$position = $_GET["position"];
						}
						if (isset($_GET["change_docs"])) {
							$intern_id = $_GET["intern_id"];

							$sql = "SELECT * FROM users_position WHERE user_id=$intern_id";
							$result = mysqli_query($link, $sql);

							while ($row = mysqli_fetch_assoc($result)) {
								$position = $row["position_id"];
							}
						}

							$sql = "SELECT * FROM positions WHERE id=$position";
							$result = mysqli_query($link, $sql);
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$pos_name = $row["name"];
								}
								// echo $pos_name;
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
									<input id='$node_id' type='checkbox' name='document'  value='$id'>
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
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$interns[] = $row["intern"]; }
						}
						
						$sql = "SELECT * FROM users WHERE id IN (" . implode(",", $interns) . ")";
						$result = mysqli_query($link, $sql);

						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$id = $row['id'];
								$name = $row['name'];
								$node_id="f_".$id;
								$selected = "";
								if (isset($intern_id) && $intern_id == $id) $selected = "checked";

								echo "
									<label for='$node_id' class='item' id='$id'>
										$name
										<input id='$node_id' type='radio' name='intern' value='$id'
										oninput='change_docs($id)'
										$selected />
									</label>
								";
							}
						}
					?>
				</div>
			</div>
		</main>
		<footer>
			<button onclick="apply_task(); return false;">Выдать задание</button>
		</footer>
	</body>
</html>

<?php
// http://localhost/CP_2020/supervisor.php?apply_task=1&task=4&d_1=1&d_2=2&intern=4
	if (isset($_GET["apply_task"])) {
		$task = $_GET["task"];
		$intern = $_GET["intern"];

		$sql = "UPDATE tasks SET from_id=$user_id, to_id=$intern, status=1 WHERE id=$task";
		mysqli_query($link, $sql);

		$sql = "INSERT INTO task_instructions (id, task_id, instruction_id)
				VALUES ";

		$values = array();
		foreach ($_GET as $key => $value) {
			if (preg_match("/d_/", $key)) {
				$values[] = "(NULL, $task, $value)";
			}
		}
		
		$sql .= implode(",", $values);
		// echo $sql;
		mysqli_query($link, $sql);
	}
?>