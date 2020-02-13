<?php
session_start();
?>
<html>
	<head>
		<title>Logowanie uzytkownika</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<button class="addNews" style="vertical-align:middle" id="home"><a class="abutton" href="index.php" style="text-decoration: none;"><span>Powrot </span></a></button>
		
	
	<div class="log">
	
		<h1>Zaloguj się</h1>
		<form action="login.php" method="post">
			Podaj login: <input type="text" name="login"><br><br>
			Podaj haslo: <input type="password" name="pass"><br><br>
			<input type="submit" value="Zaloguj">
		</form>
		
	</div>
	
	<?php
			$login="";
			$pass="";
				if (isset($_POST["login"]) && isset($_POST["pass"])){
					$login=$_POST["login"];
					$pass=$_POST["pass"];
							
					$kodowaneHaslo=sha1(sha1($pass));
					$connect=mysqli_connect("localhost", "root", "", "portal");
					$result=mysqli_query($connect, "SELECT login, haslo, uprawnienia FROM uzytkownicy WHERE login='$login' AND haslo='$kodowaneHaslo'");
					$user = mysqli_fetch_assoc($result);

					if (mysqli_num_rows($result) > 0){
						if($user['uprawnienia']==1){
							//echo "Porawne logowanie<br>";
							$_SESSION["zalogowany"]=1;
							header("Location: admin.php"); 
						}
						else {
							//echo "Poprawne logowanie<br>";
							$_SESSION["zalogowany"]=2;
							header("Location: user.php"); 
						}
						
						
					}else{
						echo "Wprowadzono bledne dane<br>";
						
					}
				}	
		?> 


	</body>
</html>