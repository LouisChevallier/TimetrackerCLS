<link type="text/css" rel="stylesheet" href="../css/bootstrap.css"  media="screen,projection"/>


<div>
    <ul class="navbar-nav ml-auto">

        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
        <li class="nav-item"><a class="nav-link" href="backoffice.php">Backoffice</a></li>
        <?php } ?>

        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'membre'){ ?>
        <li class="nav-item"><a class="nav-link" href="add_project.php">Démarrer un projet</a></li>
        <li class="nav-item"><a class="nav-link" href="groups.php">Groupes</a></li>
        <?php } ?>

        <?php if(empty($_SESSION)){ ?>
        <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
        <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
        <?php } else { ?>
        <!--<li class="nav-item"><a class="nav-link" href="add_post.php">Rédiger un article</a></li>-->
        <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
        <?php } ?>        

    </ul>
</div>