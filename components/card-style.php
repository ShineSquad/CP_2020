<div class="user-card">
	<div class="card-left">
		<div class="card-avatar-container">
			<img src="" class="card">
		</div>
		<div class="card-personal-data">
			<?php
				$sql = "SELECT users.name AS user, positions.name AS position
						FROM users
						INNER JOIN users_position
							ON users.id = users_position.user_id
						INNER JOIN positions
							ON users_position.position_id = positions.id
						WHERE users.id = $uid";
				$result = mysqli_query($link, $sql);
				$row = mysqli_fetch_assoc($result);

				$u_name = $row["user"];
				$p_name = $row["position"];
			?>
			<p class="card-fio"><?php echo $u_name;?></p>
			<p class="card-position"><?php echo $p_name;?></p>
		</div>
	</div>
	<div class="card-right">
		<div class="card-info">
			<p class="card-department">Кафедра - Медицинской биохимии и биофизики</p>
			<p class="card-faculty">Факультет - Биологии и медицины</p>
		</div>
		<div class="cab-count">
			<p>Каб. 308</p>
		</div>
	</div>
</div> 
