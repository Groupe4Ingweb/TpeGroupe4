<?php
// Connexion à la base de données
try
{
$bdd = new
PDO('mysql:host=localhost;dbname=glish-data;charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>
