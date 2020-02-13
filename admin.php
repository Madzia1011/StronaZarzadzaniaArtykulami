
<?php
session_start(); 
if (empty($_SESSION["zalogowany"]==1)){ 
 header("Location: login.php"); 
exit(); 
}

?>
	
<!DOCTYPE html>
<html>

	<head>
	
		<title>Portal</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css">
	
	</head>
		<script>
					function zmienRozmiar(){
						var rozmiarCzcionki = document.getElementById("rozmiar").value;
						document.getElementById("box1").style.fontSize = rozmiarCzcionki + "px";
					}
					
					function zmienKolor(){
						var rodzajKoloru = document.getElementById("kolorTekstu").value;
						document.body.style.color = rodzajKoloru;
					}
					
					function kolorTla(){
						var sR = document.getElementById("R").value;
						var sG = document.getElementById("G").value;
						var sB = document.getElementById("B").value;
						var obszarTlo = document.getElementById("obszar").value;
						
						if(obszarTlo=="oBody")
					document.body.style.backgroundColor = "rgb("+sR+","+ sG+","+ sB+")";
						else if(obszarTlo=="oHeader")
					document.getElementById("naglowek").style.backgroundColor = "rgb("+sR+","+ sG+","+ sB+")";
						else if(obszarTlo=="oArtykuly")
					document.getElementById("box1").style.backgroundColor = "rgb("+sR+","+ sG+","+ sB+")";
						else if(obszarTlo=="oPanel")
					document.getElementById("panel").style.backgroundColor = "rgb("+sR+","+ sG+","+ sB+")";
						
			
					}
		</script>
	<body>
	
		<button class="addNews" style="vertical-align:middle" id="home"><a class="abutton" href="index.php" style="text-decoration: none;"><span>Powrót </span></a></button>
	
		<header>
		
			<div class="admin" id="naglowek"> <div style="padding-left: 10px">Portal</div></div>
			<div class="artykuly">Artykuły
			<button class="addNews" id="home1" style="vertical-align:middle"><a class="abutton" href="addNews.php" style="text-decoration: none;"><span>Dodaj </span></a></button>
			</div>
			
			<div class="logowanie">
			<a href="logout.php" class="wyloguj">Wyloguj</a>				
			</div>
		
		</header>
		
		<article id="box1">
	
			<?php
				$connect=mysqli_connect("localhost", "root", "", "portal");
				mysqli_query($connect, "SET NAMES UTF8");
				$result=mysqli_query($connect, "SELECT * FROM artykuly ORDER BY id DESC");
				echo '<table class="artykul2">
				 <thead>
					<tr>
						 <th>Tytul</th> <th size="50" >Kontent</th> <th>Tagi</th> <th>Edytuj</th>
					 </tr>
				 </thead>
				<tbody>';
				
				while($row = mysqli_fetch_assoc($result))
				{
					$title=$row["tytul"];
					$text=$row["text"];
					$status=$row["status"];
					$theSlug=$row["pierwszy"];
					$category=$row["kategoria"];
					$tags=$row["tagi"];
					$id=$row["id"];
					
					$skrotTresc= substr($text, 0, 100);
					$skrotTytul= substr($title, 0, 30);
					
					echo"<tr>
						 <td style='width:150px;'>$skrotTytul...</td> <td>$skrotTresc...</td> <td>$tags</td> 
						 <td>
							<a href='editNews.php?identyfikator=$id'><img class='ikona' src='edit.png'></a>
							<a href='deleteNews.php?identyfikator=$id'> <img class='ikona' src='remove.png'> </a>
							<a href='wyswietl.php?identyfikator=$id'><img class='ikona' src='lupa.png'></a>
						</td>
					 </tr>";
							
				}
			mysqli_free_result($result);	
			echo'</tbody>
			</table>';
			
			?>
			
		</article>
		<article id="box1">
		<?php
			$result=mysqli_query($connect, "SELECT * FROM uzytkownicy");
			echo '<table class="artykul2">
				 <thead>
					<tr>
						 <th>Użytkownik</th><th>E - mail</th> <th>Uprawnienia</th> <th>Zmień</th>
					 </tr>
				 </thead>
				<tbody>';
				while($row = mysqli_fetch_assoc($result))
				{
					$login=$row["login"];
					$uprawnienia=$row["uprawnienia"];
					$email=$row["email"];
					$id=$row["id"];
										
					echo"<tr>
						 <td>$login</td> <td>$email</td> <td>";
							if($uprawnienia=='1'){
								echo 'administrator';
								
							}
							else{
								echo 'użytkownik';
							}
						echo "</td> 
						 <td>
							<a href='editUser.php?identyfikator=$id'><img class='ikona' src='edit.png'></a>
							<a href='deleteUser.php?identyfikator=$id'> <img class='ikona' src='remove.png'> </a>
						</td>
					 </tr>";
							
				}
			mysqli_free_result($result);	
			echo'</tbody>
			</table>';
		?>
		</article>
		
		<div class="panel" id="panel">
		
		<h4 style="color: #222">Panel dla niedowidzących</h4>
		
		
			Czcionka: <input id="rozmiar" type="range" min="8" max="72" onchange="zmienRozmiar()"><br>
			
			
			Kolor tekstu:<select  id="kolorTekstu" >
				<option value="red">Czerwony</option>
				<option value="blue">Niebieski</option>
				<option value="green">Zielony</option>
				<option value="white">Bialy</option>
			</select>
			<input type="submit" onClick="zmienKolor()" value="Zastosuj"></input><br>
			
			Zmień tło dla: <select id="obszar">
				<option value="oBody"> Ciało strony </option>
				<option value="oHeader"> Nagłówek strony </option>
				<option value="oArtykuly"> Artykuly </option>
				<option value="oPanel"> Panel </option>
				</select>
				R: <input id="R" type="range" min="0" max="255"><br>
				G: <input id="G" type="range" min="0" max="255"><br>
				B: <input id="B" type="range" min="0" max="255"><br>
				<input type="submit" onClick="kolorTla()" value="Zastosuj"></input><br>
				<br>
				
				
			
		</div>
		
		<footer></footer>
		
	
	</body>

</html>

