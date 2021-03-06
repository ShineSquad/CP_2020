<?php
	$uid = -1;
	if (isset($_GET["uid"])) {
		$uid = $_GET["uid"];
	}
	require "debug/img.php";
?>
<header>
	<div class="changemenu">
		<div class="view" id="view" value="0">
			<div class="links">
				<a href="./intern.php">Стажеры</a>
				<a href="./supervisor.php">Руководители</a>
			</div>
			<select name="users" class="users" onchange="change_user(this.value)" autocomplete="off">
				<option selected disabled>Пользователь</option>
				<?php
					$sql = "SELECT * FROM users
					WHERE role_id=$user_type";
					$result = mysqli_query($link, $sql);
					$first = true;
					while ($row = mysqli_fetch_assoc($result)) {
						if($first && $uid == -1) {
							$uid = $row["id"];
							$first = false;
						}
						$id = $row['id'];
						$name = $row['name'];
						echo "
							<option value='$id'>$name</option>
						";
					}
					if(isset($_GET["change_user"])) {
						$uid = $_GET["users"];
					}
				?>
			</select>
		</div>
		<div class="triangle" onclick="change_select()"></div>
	</div>
	<div class="header-container">
		<div class="logo-container">
			<img src="styles/icons/logo.png">
		</div>
		<div class="title-container">
			<p class="title">Программа по введению в должность специалиста</p>
		</div>
		<div class="user-container">
			<div class="avatar-container">
				<?php echo "<img src='$avatar' class='avatar'>"?>
			</div>
			<div class="fio-container">
				<p class="fio">
					<?php
						$sql = "SELECT name FROM users WHERE id=$uid";
						$result = mysqli_query($link, $sql);
						$row = mysqli_fetch_assoc($result);
						echo $row["name"];
					?>
				</p>
			</div>
		</div>
	</div>
</header>
<script type="text/javascript">
	var user_type = <?php echo $user_type;?>,
		uid = <?php echo $uid;?>;
</script>
