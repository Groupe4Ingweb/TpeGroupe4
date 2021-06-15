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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Glish</title>
</head>
    <body>
    <div id="fixe">
		<header>
			<h1 class="header">embauche-moi.com</h1>
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
<nav id="news">
				<p id="new"><font color="darkred">Soumettre</font> <font color="darkblue">Un dossier</font></p>
			</nav>

<?php
require('config.php');
if (isset($_REQUEST['nom'], $_REQUEST['autres'], $_REQUEST['number'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $nom = stripslashes($_REQUEST['nom']);
  $nom = mysqli_real_escape_string($conn, $nom); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $autres= stripslashes($_REQUEST['autres']);
  $autres = mysqli_real_escape_string($conn, $autres);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $number= stripslashes($_REQUEST['number']);
  $number = mysqli_real_escape_string($conn, $number);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (nom, autres, number)
              VALUES ('$nom', '$autres', '$number')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous etes inscrit avec succes.</h3>
             <p>Cliquez ici pour voir <a href='login.php'>la liste des employes</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
  <h1 class="box-logo box-title"><a href="">ServicesEnLigne.com</a></h1>
    <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="nom" placeholder="nom et prenom" required />
    <input type="text" class="box-input" name="autres" placeholder="domqine: ex plombier" required />
    <input type="text" class="box-input" name="number" placeholder="votre number" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Deja employe? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
    </body>        
</html>
