<!doctype html>
<html>
<head>
	<title>Wyswietlanie newsow</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h2 style="font-family: Arial;">Wyswietl newsa</h2>
	<button class="addNews" style="vertical-align:middle" id="home"><a class="abutton" href="<?php echo $_SERVER['HTTP_REFERER'];?>" style="text-decoration: none;"><span>Powrot </span></a></button>
	<article>

	<?php
		
		if (isset($_GET["identyfikator"]))
		{
			if (!empty($_GET["identyfikator"]))
			{
				$id=$_GET["identyfikator"];
				$connect=mysqli_connect("localhost", "root", "", "portal");
				mysqli_query($connect, "SET NAMES UTF8");
				$result=mysqli_query($connect, "SELECT * FROM artykuly WHERE id=$id");
				$row = mysqli_fetch_assoc($result);
				$title=$row["tytul"];
				$text=$row["text"];
				$status=$row["status"];
				$theSlug=$row["pierwszy"];
				$category=$row["kategoria"];
				$tags=$row["tagi"];
				$id=$row["id"];
			echo 
			"<form action='wyswietl.php?id=$id' method='post'>
			<table class='artykul1'>
				<tr><td>Tytul: $title </tr></td>
				<tr><td>Tresc: $text </tr></td>
				<tr><td>Status: $status</tr></td>
		
		<tr><td>Czy wyrozniony?:";
			if($theSlug==1)
			{echo" Tak";}
			else {echo" Nie";}
			
		echo "</tr></td>
		<tr><td>Kategoria: $category </tr></td>
				
		<tr><td>Tagi: $tags</tr></td>
		
		</table>
		
				</form>";
			}
		}

		
		
	?>




</body>
</html>

</body>
</html>