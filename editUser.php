<!doctype html>
<html>
<head>
	<title>Edycja userów</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h2 style="font-family: Arial;">Edytuj usera</h2>
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
				$result=mysqli_query($connect, "SELECT id, login, email, uprawnienia FROM uzytkownicy WHERE id=$id");
				$row = mysqli_fetch_assoc($result);
				$id=$row['id'];
				$login=$row['login'];
				$email=$row['email'];
				$uprawnienia=$row['uprawnienia'];
			echo "<form action='editUser.php?id=$id' method='post'>
			<table class='artykul1'>
				<tr><td>Login: <input type='text' name='login' value='$login'></tr></td>
				<tr><td>E - mail:  <input type='text' name='email' value='$email'></tr></td>
				<tr><td>Uprawnienia:
					<select name='uprawnienia'>
						<option value='1'"; if($uprawnienia == 1) echo 'selected = selected'; echo ">Administrator</option>
						<option value='0'"; if($uprawnienia == 0) echo 'selected = selected'; echo ">Użytkownik</option>
					</select></tr></td>
			</table>
		<input type='submit' value='Zapisz' class='zapisz'>
				</form>";
			}
		}

		if (isset($_GET["id"]) && isset($_POST["login"])  && isset($_POST["email"]) && isset($_POST["uprawnienia"]))
		{
				
				$email=$_POST["email"];
				$login=$_POST["login"];			
				$uprawnienia=$_POST["uprawnienia"];
				$id=$_GET["id"];
				
				$connect=mysqli_connect("localhost", "root", "", "portal");
				mysqli_query($connect, "SET NAMES UTF8");
				mysqli_query($connect, "UPDATE uzytkownicy SET login='$login', email='$email', uprawnienia='$uprawnienia' WHERE id=$id");
		
				echo "Dokonano edycji usera!!!<br>";
				header('Location: admin.php');
			
		}
		
	?>




</body>
</html>

</body>
</html>