<?php
session_start();
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
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO employes (nom,prenom,number,jour,ville,classe,motif,autres)
VALUES(?,?,?,?,?,?,?)');
$req->execute(array($_POST['nom'], $_POST['prenom'],$_POST['number'],$_POST['classe'],$_POST['autres'],$_POST['jour'],$_POST['ville'],$_POST['motif']));
// Redirection du visiteur vers la page du minichat
header('Location:Postuler.php');
?>
