<?php
require 'config1.php'; 
if(!empty($_FILES)){
    $file_name=$_FILES['fichier']['name'];
    $file_tmp_name=$_FILES['fichier']['tmp_name'];
    $file_desc='files/'.$file_name;
    $file_extension=strrchr($file_name, ".");
    $extensions_autorisees=array('.jpg', '.JPG', '.png', '.PNG','.pdf', '.PDF');
if(in_array($file_extension, $extensions_autorisees))
{
if(move_uploaded_file($file_tmp_name,$file_desc )) 
{
    $req=$bdd->prepare('INSERT INTO files(name, file_url) VALUES(?,?)');
    $req->execute(array($file_name,$file_desc));
    echo 'Fichier envoye avec succes';
}
}
else{
    echo 'seul les images sont autorisees';
}

}


?>
<!doctype html>
    <html>
        <head>
            <title>Glish Upload file</title>
            <meta charset="UTF-8" />
        </head>
            <body>
        <h1>Uploader un fichier</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="fichier" /><br/><br/>
            <input type="submit" value="Envoyer le fichier" />
        </form>
        <h1>Fichier envoyes</h1>
        <?php
        $req=$bdd->query('SELECT name, file_url FROM files');
        while($data=$req->fetch())
        {
            echo '<a href="'.$data['file_url'].'">'.$data['file_url'].' </a>'; 
            echo '<br/></br>';
        }
        
        ?>
            </body>
</html>
