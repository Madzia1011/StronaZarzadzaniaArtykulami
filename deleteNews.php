<!doctype html>
<html>
<head>
	<title>Kasowanie newsow</title>
</head>
<body>

<?php
	
	if (isset($_GET["identyfikator"]))
	{
		if (!empty($_GET["identyfikator"]))
		{
			$id=$_GET["identyfikator"];
			$connect=mysqli_connect("localhost", "root", "", "portal");
			mysqli_query($connect, "DELETE FROM artykuly WHERE id=$id");
			
			echo "Skasowano newsa!!!<br>";
			
			
			
		}else{
			echo "Id nie moze byc puste";
		}
	}else{
		echo "Niepoprawne uzycie pliku kasujacego";
	}
	header('Location: '.$_SERVER['HTTP_REFERER']);
?>

<a href="index.php">Strona glowna</a>
</body>
</html>