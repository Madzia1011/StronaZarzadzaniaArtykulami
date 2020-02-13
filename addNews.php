<?php
session_start(); 
if (empty($_SESSION["zalogowany"])){ 
 header("Location: login.php"); 
exit(); 
}
?>
<!doctype html>
<html>
<head>
	<title>Dodawanie newsow</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h2 style="font-family: Arial;">Dodaj nowego newsa</h2>

	
			<button class="addNews" style="vertical-align:middle" id="home">
				<a class="abutton" href= "<?php echo $_SERVER['HTTP_REFERER'];?>"	style="text-decoration: none;">
					<span>Powrot </span>
				</a>
			</button> 

<article>
<form action="addNews.php" method="post">
	<table class="artykul1">
		<tr><td>Podaj tytul: <input type="text" name="title"></td></tr>
		<tr><td>Podaj tresc: <textarea name="tekst"></textarea></td></tr>
		<tr><td>Podaj status: 
				<select name="status">
				  <option>Aktywny</option>
				  <option>Nieaktywny</option>
				</select></td></tr>
		
		<tr><td>Wyrozniony?: TAK <input type="radio" name="theSlug" value="1"> NIE <input type="radio" name="theSlug" value="0" checked></td></tr>
		<tr><td>Wybierz kategorie: <select name="category">
		<?php
			$connect=mysqli_connect("localhost", "root", "", "portal");
			mysqli_query($connect, "SET NAMES UTF8");
			$result=mysqli_query($connect, "SELECT * FROM kategorie");
			while($row=mysqli_fetch_assoc($result)){
				$id=$row["id"];
				$nazwa=$row["nazwa"];
				echo "<option value='$id'>$nazwa</option>";
			}
		?>
				  

				</select></td></tr>
				
		<tr><td>Podaj tagi: <input type="text" name="tags"></td></tr>
		<tr><td>Dodaj obrazek (skorzystaj z  <a href="https://ifotos.pl/">hostingu</a> i wklej link): <input type="text" name="image"></td></tr>

	</table>
	
	
	<input type="submit" value="Zapisz" class="zapisz">
	
		
	
	
	
</form>


</article>

<?php

	
	$title="domyslny";
	$text="pusty";
	$status="";
	$theSlug="";
	$category="";
	$tags="";
	$link="";

	

	
	
	if (isset($_POST["title"])  && isset($_POST["tekst"]) && isset($_POST["status"]) 
		&& isset($_POST["theSlug"])&& isset($_POST["category"])&& isset($_POST["tags"]))
	{
		if (!empty($_POST["title"]) && !empty($_POST["tekst"])&& !empty($_POST["status"])&& !empty($_POST["category"])&& !empty($_POST["tags"]))
		{
			$title=$_POST["title"];
			$text=$_POST["tekst"];
			$status=$_POST["status"];
			$theSlug=$_POST["theSlug"];
			$category=$_POST["category"];
			$tags=$_POST["tags"];
			$link=$_POST["image"];
			
			
			$connect=mysqli_connect("localhost", "root", "", "portal");
			mysqli_query($connect, "SET NAMES UTF8");
			mysqli_query($connect, "INSERT INTO artykuly VALUES('', '$status', '$title',$theSlug, '$text', $category, '$tags', '$link')");
			
			header('Location: index.php');
		}
	}
	
?>



</body>
</html>