<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>COURSES</title>
	<style type="text/css">
		body
		{
			background-color: #EBEAFD;
			font-family: Consolas !important;
		}
		.content2
		{
			border: 2px solid black;
			max-width: 400px;
		}
		.scroll 
		{
			position: fixed;
			top: 90%;
			right: 0;
			text-decoration: none;
			background-color: lightgrey;
			width: 30px;
		}
		.scroll span
		{
			font-size: 30px;
			color: black;
		}
		.search
        {
            max-width: 600px;
            margin-left: 10px;
            margin-right: 10px;
        }
        .search input
        {
            width: 80%;
            padding: 10px;
            border: none;
            background: #f1f1f1;
            border-radius: 10px 0px 0px 10px;
            border: 1px solid;
            padding-left: 5px;

        }
        form.search button
        {
          	width: 20%;
          	padding: 8.5px;
          	color: white;
          	font-size: 17px;
          	border: 1px solid grey;
          	border-radius: 0px 10px 10px 0px;
          	cursor: pointer;

        }

        form.search button:hover
        {
          	background: limegreen;
        }

	</style>
</head>
<body>

<section>

	<?php
	if(isset($_SESSION['username']))
	{
	?>
	<a class="scroll" href="#content"><span>&#11165;</span></a>

	<center>
		<br>

		<form class="search" method="post" action="">
            <input type="text" name="search"><button type="submit" class="btn btn-success" name="searchnow"><i class="fa fa-search"></i></button>
        </form>

		<br>

		<?php
			if(isset($_POST['searchnow']))
			{
				$searchres = $_POST['search'];
				$sql2 = mysqli_query($db, "SELECT DISTINCT `coursecode` FROM `notes_hd` WHERE `coursecode` LIKE '%$searchres%';");
				$count = mysqli_num_rows($sql2);

				if($count != 0)
				{
					echo '<h2>Searched result for '; echo $searchres; echo '</h2>';
					echo '<div class="content2" id="content2">';
					while($row1 = mysqli_fetch_assoc($sql2))
					{
						echo '<h3>'.$row1['coursecode'].' <br><a href="notesview.php?id='.$row1['coursecode'].'" class="btn btn-success">click here</a></h3>';
					}
					echo '</div><br>';
					echo '<br><br>';
				}
				else
				{
					echo '<h3>No Result found.. :(</h3>';
				}
			}
		?>

		<?php
			$sql = mysqli_query($db, "SELECT DISTINCT `coursecode` FROM `notes_hd`;");

			echo '<div class="content" id="content">';
			while($row = mysqli_fetch_assoc($sql))
			{
				echo '<hr size="2" width="90%" color="red">';
				echo '<h3>'.$row['coursecode'].' <br><a href="notesview.php?id='.$row['coursecode'].'" class="btn btn-success">click here</a></h3>';
				echo '</div><br>';
			}
			echo '<hr size="2" width="90%" color="red">';

		?>
		
	</center>

	<?php
	}
	else
	{
		?>
            <script type="text/javascript">
            	location.replace('index.php');
                alert("Please login first");
            </script>
        <?php
	}
	?>
</section>

</body>
</html>