<?php
session_start();

$baseddonnees = new PDO('mysql:host=localhost;dbname=discussion', 'root', '');  

if(isset($_POST['forminscription']))
{
    $login = htmlspecialchars($_POST['login']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);

    if(!empty($_POST['login']) AND !empty($_POST['password'])AND !empty($_POST['password2']))
    {  
        $loginlength = strlen($login);

        if ($loginlength <= 255)
             {
                $reqlogin = $baseddonnees->prepare("SELECT * FROM utilisateurs WHERE login = ?");
                $reqlogin->execute(array($login));
                $loginexist = $reqlogin->rowCount();
                
                if($loginexist == 0) 
                { 
                   if($password == $password2)
                   {
                      $insertuser = $baseddonnees->prepare("INSERT INTO utilisateurs(login, password) VALUES(?, ?)");
                      $insertuser->execute(array($login, $password));
                      $erreur = "Votre compte a bien été créé, veuillez vous connecter à nouveau pour valider définitivement votre inscription ! <a href=\"connexion.php\">Me connecter</a>";
                   } 
                   else 
                   {
                      $erreur = "Votre mots de passes ne correspondent pas !";
                   }
                }
            }   
       else 
       {
          $erreur = "Votre nom ne doit pas dépasser 255 caractères !";
       }
    } 
    else 
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
 } 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="YYY.css">
    <title>Inscription</title>
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
                    <li class="active"><a href="deconnexion.php">Déconnexion</a></li>
                <?php }  
                else 
                { ?>
                    <li class="active"><a href="inscription.php">Formulaire Inscription</a></li>
                    <li class="active"><a href="connexion.php">Connexion</a></li> 
                <?php }
            ?> 
        </ul>
    </nav>

    <main>
    <div align="center">    
         <h2>Inscription</h2>

        <form method="post" action="inscription.php">
            <div>
            <label for="name">Login</label>
            <input type="text" id="login" name="login" placeholder="Saisir un pseudo unique">
            <br><br>
            </div>
            <div>
            <label for="name">Password</label>
            <input type="password" id="password" name="password" placeholder="10 caractères minimum">
            <br><br>
            </div>
            <div>
            <label for="name">Confirmer Password</label>
            <input type="password" id="password2" name="password2">
            <br><br>
            </div>
            <div>
            <input type="submit" name="forminscription" value="Je m'inscris"/>
            </div>
        </form>

<?php
    if(isset($erreur))
     
        {echo '<font color="red">'.$erreur."</font>";}
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

<!-- placeholder="nomutilisateur@beststartupever.com" pattern=".+@beststartupever.com"  
title="Merci de fournir uniquement une adresse Best Startup Ever"  -->
         