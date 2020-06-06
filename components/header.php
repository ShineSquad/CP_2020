<?php
	$uid = 1;
	if (isset($_GET["uid"])) {
		$uid = $_GET["uid"];
	}
?>

<script type="text/javascript">
	var user_type = <?php echo $user_type;?>;
</script>
<header>
	<div class="changemenu">
		<div class="view" id="view" value="0">
			<select name="users" class="users" onchange="change_user(this.value)" autocomplete="off">
				<option selected disabled>Пользователь</option>
				<?php
					$user_id = 0;
					$sql = "SELECT * FROM users
					WHERE role_id=$user_type";
					$result = mysqli_query($link, $sql);
					$first = true;
					while ($row = mysqli_fetch_assoc($result)) {
						if($first) {
							$user_id = $row["id"];
							$first = false;
						}
						$id = $row['id'];
						$name = $row['name'];
						echo "
							<option value='$id'>$name</option>
						";
					}
					if(isset($_GET["change_user"])) {
						$user_id = $_GET["users"];
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
				<img src="" class="avatar">
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
