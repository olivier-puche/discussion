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
  <title>Accueil : Forum des Élèves</title>
</head>

<body>

  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">BIENVENUE SUR LE FORUM DES ÉLÈVES DE LA PLATEFORME</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>

        <?php 
          if (isset ($_SESSION['id'])) 
          {?> 
          <li class="nav-item">
          <a class="nav-link" href="profil.php">Modifier profil</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="discussion.php">Forum discussion</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">Déconnexion</a>
          </li>
          <?php }  
          else 
          {?>
          <li class="nav-item">
          <a class="nav-link" href="inscription.php">Formulaire Inscription</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
          <?php }      
          ?>

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Saisir votre recherche" aria-label="search">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
      </form>
    </div>
  </div>
  </nav>
  </header>

  <main>
    <p><br>
    Le lorem ipsum (également appelé faux-texte, lipsum, ou bolo bolo1) est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée.

Généralement, on utilise un texte en faux latin (le texte ne veut rien dire, il a été modifié), le Lorem ipsum ou Lipsum. L'avantage du latin est que l'opérateur sait au premier coup d'œil que la page contenant ces lignes n'est pas valide et que l'attention du lecteur n'est pas dérangée par le contenu, lui permettant de demeurer concentré sur le seul aspect graphique.

Il circule des centaines de versions différentes du lorem ipsum, mais ce texte aurait originellement été tiré de l'ouvrage écrit par Cicéron en 45 av. J.-C., De finibus bonorum et malorum (Liber Primus, 32), texte populaire à cette époque, dont l'une des premières phrases est : « Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit… » (« Il n'existe personne qui aime la souffrance pour elle-même, ni qui la recherche ni qui la veuille pour ce qu'elle est… »).
    </p><br>
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