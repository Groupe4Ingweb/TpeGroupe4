<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles1.css" />
    <title>Glish</title>
</head>
    <body>
    <div id="fixe">
		<header>
			<h1 class="header">embauche-moi.com</h1>
		</header>
			
		<nav id="men">
			
				<ul>	
					<li class="menu">
						<a href="index.php">HOME</a>
					</li>
					<li class="menu">
						<a href="">SERVICES</a>
							<ul class="submenu">
								<li class="submenus">
									<a href="Assistance.php">Assistance en ligne</a>
								</li>
								<li class="submenus">
									<a href="Postuler.php">Soumettre son dossier</a>
                                </li>
                             
							</ul>
					</li>
					<li class="menu">
                        <a href="">Plus</a>
                            <ul class="submenu">
                                <li class="submenus">
                                    <a href="Admin.php">Espace administrateur</a>
                                    </li>
                                    <li class="menu">
                        <a href="profile.php">Profile</a>
					</li>
                                <li class="submenus">
                         <a href="logout.php">Deconnexion</a>
                                </li>
                             </ul>    
                            </ul>
                    		</nav>
<nav id="news">                    		
<p id="new"><font color="darkred">Nos</font> <font color="darkblue">Services</font></p>
</nav>
<div id="list">
<img src="A1.jpg"> <img src="A3.jpg" <img src="A5.jpg"> <img src="A7.jpg"> <img src="A5.jpg"> 
</div>
<nav id="news">
<p id="new"><font color="darkred">Nos</font> <font color="darkblue">employés</font></p>
</nav>
<div id="list1">
 <font size="5px"><a href="">Electriciens</a>  <a href="">Plombiers</a> <a href="">Mecaniciens</a> <a href="">Jardiniers</a></font>
 </br>
 <h4><font color="darkgreen">Users Online</font>  &nbsp;&nbsp;&nbsp; <font color="red">Email</font></h4>
<hr>
<?php
// Connexion à la base de données
try
{
$bdd = new
PDO('mysql:host=localhost;dbname=resistance;charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT username, email FROM users
ORDER BY ID DESC LIMIT 0, 4');
// Affichage de chaque message (toutes les données sont protégées

while ($donnees = $reponse->fetch())
{
echo '<strong><img src="contact.jpg" width="4%" border="1%" height="4%"><font color="darkgreen" size="3%">' . htmlspecialchars($donnees['username']) .
':</strong></font> &nbsp;&nbsp;&nbsp;<font color="red">'.htmlspecialchars($donnees['email']).'&nbsp;&nbsp;</font> <a href="mailto:'.htmlspecialchars($donnees['email']).'
"><img src="mail1.jpg" width="2%"></a><a href="https://m.me/'.htmlspecialchars($donnees['username']).'"> <img src="mail4.jpg" width="2.5%"/></a> <a href="https://wa.me/00237697241071?text=I%27d%20like%20to%20chat%20with%20you"><img src="what.jfif" width="1.7%"/></a> ';
}

$reponse->closeCursor();
?>
</br></br>
<a href="usersonline.php"><font color="white">Afficher plus</font></a>
</div>
<nav id="news">
<p id="new"><font color="darkred">Soumettre</font> <font color="darkblue">Un dossier</font></p>
			</nav>

    </body>
</html>
