<?php
session_start();

$baseddonnees = new PDO('mysql:host=localhost;dbname=discussion', 'root', '');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="YYY.css">
    <title>Discussion</title>
</head>

<body>

    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand">BIENVENUE SUR LE FORUM DES ÉLÈVES DE LA PLATEFORME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Saisir votre recherche" aria-label="search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
        </div>
    </nav>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php 
                if (isset ($_SESSION['id'])) 
                {?> 
                    <li class="active"><a href="profil.php">Modifier profil</a></li>
                    <li class="active"><a href="discussion.php">Forum discussion</a></li>
                    <li class="active"><a href="deconnexion.php">Déconnexion</a></li>
                <?php }  
                else 
                {?>
                    <li class="active"><a href="inscription.php">Formulaire Inscription</a></li>
                    <li class="active"><a href="connexion.php">Connexion</a></li> 
                <?php }
            ?> 
        </ul>
    </nav>
   
    <main>
        <div align="center">    
            <h2>Discussion<h2>
        </div>     

    <?php

    if(isset($_SESSION['id'])) 
    {
    $dataquerycom = $baseddonnees->prepare("SELECT c.commentaire, u.login, c.date FROM commentaires AS c INNER JOIN utilisateurs AS u ON c.id_utilisateur = u.id ORDER BY date DESC");
    $dataquerycom->execute();

    $resultcoms = $dataquerycom-> fetchAll(PDO::FETCH_ASSOC);
    // var_dump($resultcoms);

    foreach ($resultcoms as $commentaire)
    {
        echo 'Posté le : '.$commentaire['date'].'<br>';
        echo 'Utilisateur : '.$commentaire['login'].'<br>';
        echo 'Commentaire : '.$commentaire['commentaire'].'<br><br>';
    }   

   if(isset($_POST['submit_commentaire'])) 
   {
       $commentaire = $_POST['commentaire'];
       $id_utilisateur = $_SESSION['id'];

       if(isset($commentaire) AND !empty($_POST['commentaire']))
       {
           date_default_timezone_set('Europe/Paris');
           $date = date("Y-m-d");
           $insertioncom = $baseddonnees->prepare("INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES(?, ?, ?)");
           $insertioncom->execute(array($commentaire, $id_utilisateur, $date));
           $c_msg ="Votre commentaire a bien été posté";
           
           //var_dump($insertioncom);
           //header("location:livre-or.php");
       }
       else 
       {
           $c_msg = "<span style='color:green'>Nous n'avons pas pu publier votre commentaire</span>";
       }
    }
}           
?>
        <div align="center">    
            <h2>Commentaire</h2>

            <form method="post" action="discussion.php">
                <textarea name="commentaire" placeholder="Veuillez saisir votre commentaire..."></textarea><br /><br>
                <input type="submit" name="submit_commentaire" value="Publier votre commentaire" />
            </form>

            <?php
            if(isset($c_msg ))
                {echo '<font color="red">'.$c_msg."</font>";}
            ?>
        </div>
    </main>

    <footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
    <h5 class="text-uppercase">LIENS UTILES<h5>

      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2020 Copyright Interdit - Tous droits réservés <a class="text-dark" href="https://laplateforme.io/">La Plateforme</a>
      </div>        
    <!-- Grid container -->
    </footer>

</body>

</html>