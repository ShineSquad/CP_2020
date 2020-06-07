<style type="text/css">
	body {
		text-align: center;
	}
	img {
		margin: 5px;
	}
</style>
<?php require "img.php";
	foreach ($img_links as $key => $value) {
		// echo "<img src='$value'>";
		echo $value . "<img src='$value'><br>";
	}
?>
