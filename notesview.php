<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $_GET['id']; ?></title>

	<style type="text/css">
		body
		{
            background-image: url('background/1.jpg');
            font-family: Consolas !important;
		}
		.border
		{
			border: 5px solid red;
		}
	</style>
</head>
<body>
	<section class="section1">
		<center>
			<div class="border">
				<h1><?php echo $_GET['id']; ?></h1>
			<?php

				$sql = ($db, "SELECT * FROM `notes_hd` WHERE `coursecode` = '{$_GET["id"]}';");

				while($row = mysqli_fetch_assoc($sql))
				{
					?>
						<h2><?php echo $row['module']; ?></h2>
						</div>
						<br><br>
					<?php
				}
			?>
			
		</center>
	</section>
</body>
</html>