<html>
	<head>
		<title>Rejestracja uzytkowniki</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
	
		<button class="addNews" style="vertical-align:middle" id="home"><a class="abutton" href="index.php" style="text-decoration: none;"><span>Powrot </span></a></button>
	
		<div class="log1">
	
			<h1>Zarejestruj się</h1>
			<form action="register.php" method="post">
				Podaj login: <input type="text" name="login"><br><br>
				Podaj hasło: <input type="password" name="pass"><br><br>
				Podaj hasło ponownie: <input type="password" name="pass2"><br><br>
				Podaj e-mail: <input type="text" name="email"><br><br>
				<input type="submit" value="Zarejestruj">
			</form>
			
		</div>
		
		<?php
			$login="";
			$pass="";
			$pass2="";
			if (isset($_POST["login"]) && isset($_POST["pass"]) && isset($_POST["pass2"])){
				$login = $_POST["login"];
				$pass = $_POST["pass"];
				$pass2 = $_POST["pass2"];
				$email =  $_POST["email"];
			
				$connect=mysqli_connect("localhost", "root", "", "portal");
				$query = mysqli_query($connect, "SELECT * FROM uzytkownicy WHERE login='$login'");
				$ile = mysqli_num_rows($query); 
				
				if ($ile==0){	
					
					if ($pass == $pass2){
							$kodowaneHaslo=sha1(sha1($pass));
							$connect=mysqli_connect("localhost", "root", "", "portal");
							mysqli_query($connect, "INSERT INTO uzytkownicy VALUES('', '$login','$kodowaneHaslo', '$email', '".date(DATE_ATOM)."', '".date(DATE_ATOM)."', 0)");
							//header("Location: index.php");
							echo"Udalo sie";
						}
					
					else
						echo "Hasla nie zgadzaja sie ze soba";
					}
				else
					echo "Uzytkownik o podanej nazwie juz istnieje!";
				
				
			}

		?>


	</body>
</html>