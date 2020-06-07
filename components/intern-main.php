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
		<?php
			$sql = "SELECT * FROM tasks
					WHERE to_id=$uid";
			$result = mysqli_query($link, $sql);
			$count = 0;
			while ($row = mysqli_fetch_assoc($result)) $count++;
			
			echo "<div class='active-tasks' onclick='open_task()' task-count='$count'>";
		?>
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