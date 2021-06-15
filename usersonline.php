<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
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
			<h1 class="header">S.O.S SERVICES</h1>
		</header>
			<div class="sucess">
    <h3><font color="white">Bienvenue <?php echo $_SESSION['username']; ?> !</font>
    <a href="logout.php">Déconnexion</a></h3>
    </div>
		<nav id="men">
			
				<ul>	
					<li class="menu">
						<a href="index.php">HOME</a>
					</li>
					<li class="menu">
						<a href="usersonline.php">SERVICES</a>
							<ul class="submenu">
								<li class="submenus">
									<a href="index.php">Assistance en ligne</a>
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

    </div>
<br/>
<div id="tabmessage1">
<h4><font color="darkblue">Users Online</font>  &nbsp;&nbsp;&nbsp; <font color="red">Email</font></h4>
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
ORDER BY ID DESC LIMIT 0, 10000');
// Affichage de chaque message (toutes les données sont protégées

while ($donnees = $reponse->fetch())
{
echo '<p><strong><img src="contact.jpg" width="4%" border="1%" height="4%"><font color="darkblue" size="3%">' . htmlspecialchars($donnees['username']) .
'</strong></font> &nbsp;&nbsp;&nbsp;<font color="red">'.htmlspecialchars($donnees['email']).'&nbsp;&nbsp;</font><a href="mailto:'.htmlspecialchars($donnees['email']).'
"><img src="mail1.jpg" width="4.3%"></a><a href="https://m.me/'.htmlspecialchars($donnees['username']).'"> <img src="mail4.jpg" width="4.9%"/></a> <a href="https://wa.me/00237697241071?text=I%27d%20like%20to%20chat%20with%20you"><img src="what.jfif" width="3.8%"/></a> ';
}
$reponse->closeCursor();
?>
</div>
</div>
  </body>
</html>
