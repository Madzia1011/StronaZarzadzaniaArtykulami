<!doctype html>
<html>
<head>
	<title>Edycja newsow</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h2 style="font-family: Arial;">Edytuj newsa</h2>
	<button class="addNews" style="vertical-align:middle" id="home"><a class="abutton" href="admin.php" style="text-decoration: none;"><span>Powrot </span></a></button>
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
				$link=$row["link"];
			echo 
			"<form action='editNews.php?id=$id' method='post'>
			<table class='artykul1'>
				<tr><td>Podaj tytul: <input type='text' name='title' value='$title'></tr></td>
				<tr><td>Podaj tresc: <textarea name='tekst' value='$text'>$text</textarea></tr></td>
				<tr><td>Podaj status: 
					<select name='status' value='$status'>
						<option>Aktywny</option>
						<option>Nieaktywny</option>
					</select></tr></td>
		
		<tr><td>Wyrózniony?: TAK <input type='radio' name='theSlug' value='$theSlug'> NIE <input type='radio' name='theSlug' value='$theSlug' checked></tr></td>
		<tr><td>Wybierz kategorie: <select name='category' value='$category'>";
		
			$connect=mysqli_connect("localhost", "root", "", "portal");
			mysqli_query($connect, "SET NAMES UTF8");
			$result=mysqli_query($connect, "SELECT * FROM kategorie");
			while($row=mysqli_fetch_assoc($result)){
				$id=$row["id"];
				$nazwa=$row["nazwa"];
				echo "<option value='$id'>$nazwa</option>";
			}
		echo"</select></tr></td>
				
		<tr><td>Podaj tagi: <input type='text' name='tags' value='$tags'</tr></td>
				
		<tr><td>Zmień obrazek: <input type='text' name='link' value='$link'</tr></td>
		
		</table>
		<input type='submit' value='Zapisz' class='zapisz'>
				</form>";
			}
		}

		if (isset($_GET["id"]) && isset($_POST["title"])  && isset($_POST["tekst"]) && isset($_POST["status"]) && isset($_POST["theSlug"])&& isset($_POST["category"])&& isset($_POST["tags"]))
		{
				
				$title=$_POST["title"];
				$text=$_POST["tekst"];			
				$status=$_POST["status"];
				$theSlug=$_POST["theSlug"];
				$category=$_POST["category"];
				$tags=$_POST["tags"];
				$id=$_GET["id"];
				
				
				
				$connect=mysqli_connect("localhost", "root", "", "portal");
				mysqli_query($connect, "SET NAMES UTF8");
				mysqli_query($connect, "UPDATE artykuly SET tytul='$title', text='$text', status='$status', pierwszy='$theSlug', kategoria='$category', tagi='$tags' WHERE id=$id");
		
				echo "Dokonano edycji newsa!!!<br>";
			
		}
		
	?>




</body>
</html>

</body>
</html>