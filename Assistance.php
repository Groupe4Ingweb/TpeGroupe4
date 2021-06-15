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
			<h1 class="header">embauche-moi.com</h1>
		</header>
			<div class="sucess">
    <h3>Bienvenue <?php echo $_SESSION['username']; ?> !
    <a href="logout.php">Déconnexion</a></h3>
    </div>
		<nav id="men">
			
				<ul>	
					<li class="menu">
						<a href="accueil.php">HOME</a>
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

                      <form action="Assistance_post.php" method="post">
<input type="text" name="search" id="search"  placeholder="Avez vous besoin d'aide?"></br>
<input type="submit" value="search">
                      </form>
    </body>
</html>
