<div class="main-supervisor" id="main-content">
	<div class="task-container">
		<div class="title">
			Задачи
		</div>
		<div class="task-list">
			<?php
				$sql = "SELECT * FROM tasks WHERE status=0";
				$result = mysqli_query($link, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					$title = $row['title'];
					$node_id="n_".$id;
					echo "
						<label for='$node_id' class='task-item' id='$id'>
							$title
							<input id='$node_id' type='radio' name='task' value='$id'/>
						</label>
					";
				}
			?>
		</div>
	</div>
	<div class="document-container">
		<div class="title">
			Документы
		</div>
		<div class="document-list">
			
		</div>
	</div>
	<div class="intern-container">
		<div class="title">
			Стажеры
		</div>
		<div class="intern-list">
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
							<label for='$node_id' class='intern-item' id='$id'>
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
	<div class="button-container">
		<button onclick="apply_task(); return false;">Выдать задание</button>
	</div>
</div>