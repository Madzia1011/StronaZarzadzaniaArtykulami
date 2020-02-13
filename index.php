
<?php
session_start(); 

?>
<!DOCTYPE html>
<html>

	<head>
	
		<title>Strona Główna</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700italic,700,400italic|PT+Serif:400,700,400italic,700italic|Vollkorn|Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
		<link rel="stylesheet" href="menu/css/style.css">
		
	</head>
		<script>
					function zmienRozmiar(){
						var rozmiarCzcionki = document.getElementById("rozmiar").value;
						document.getElementById("box").style.fontSize = rozmiarCzcionki + "px";
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
					document.getElementById("box").style.backgroundColor = "rgb("+sR+","+ sG+","+ sB+")";
						else if(obszarTlo=="oPanel")
					document.getElementById("panel").style.backgroundColor = "rgb("+sR+","+ sG+","+ sB+")";
						
			
					}
		</script>
	
	<body>
	
		<header>
			 <nav id="naglowek">
				<a href="index.php" id="userPLink">
				<span></span>
					Artykuły
				</a>
				<div id="sideMenu">
					<span class="fa fa-navicon" id="sideMenuClosed"></span>
				</div>
			</nav>
			
			<div id="sideMenuContainer">
			
				  <h2>Menu</h2>
				  
				  <?php
				  
					if(isset($_SESSION["zalogowany"]))
					{
						echo '<a href="logout.php" title="Wyloguj się"><span class="fa fa-bolt"></span></a>';
					}
				  
					else {
						echo '<a href="login.php" title="Zaloguj się"><span class="fa fa-bolt"></span></a>
				  
						<a href="register.php" title="Zarejestruj się"><span class="fa fa-map"></span></a>';
			
					}
				  ?>
				  
			</div>
			
		
		</header>
	
		
		<article id="box" style="">
			
	
			<?php
				$connect=mysqli_connect("localhost", "root", "", "portal");
				mysqli_query($connect, "SET NAMES UTF8");
				$result=mysqli_query($connect, "SELECT * FROM artykuly WHERE status = 'Aktywny' ORDER BY pierwszy DESC, id DESC");
					
				while($row = mysqli_fetch_assoc($result))
				{
					$title=$row["tytul"];
					$text=$row["text"];
					$status=$row["status"];
					$theSlug=$row["pierwszy"];
					$category=$row["kategoria"];
					$tags=$row["tagi"];
					$id=$row["id"];
					$link=$row["link"];
					
					$skrotTresc= substr($text, 0, 100);
					$skrotTytul= substr($title, 0, 30);
					
					$cat=mysqli_query($connect, "SELECT * FROM kategorie WHERE id = $category");
					while($row=mysqli_fetch_assoc($cat)){
						$id=$row["id"];
						$nazwa=$row["nazwa"];
						
					}
				if($theSlug=="1"){
					echo"<div class='wysw'>
							<h2>WYRÓŻNIONY! .$title</h2>
							<p style='text-indent: 20px;'>$text</p>
							<p value='$id'>Kategoria: $nazwa</p>
							<p>Tagi: $tags</p>
							<img src='$link' style='width: 300px;'></img>
						</div>";
				}
				
				else {
					echo"<div class='wysw'>
							<h2>$title</h2>
							<p style='text-indent: 20px;'>$text</p>
							<p value='$id'>Kategoria: $nazwa</p>
							<p>Tagi: $tags</p>
							<img src='$link' style='width: 300px;'></img>
						</div>";
				}
							
				}
			mysqli_free_result($result);	
			
			
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
				</select><br>
				R: <input id="R" type="range" min="0" max="255"><br>
				G: <input id="G" type="range" min="0" max="255"><br>
				B: <input id="B" type="range" min="0" max="255"><br>
				<input type="submit" onClick="kolorTla()" value="Zastosuj"></input><br>
				<br>
		</div>
		
		<footer></footer>
		
		<pre>
			<code id='sourceCode'>
				<script type="text/javascript">
					$(document).ready(function(){
					  $('#sideMenu').sideToggle({
						moving: '#sideMenuContainer',
						direction: 'right'
					  });
					});
				</script>
			</code>
		</pre>	
		
		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js'></script>
		<script src='menu/sideToggleExtended.js'></script>
		<script src="menu/js/index.js"></script>
	
	</body>

</html>