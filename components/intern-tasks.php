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