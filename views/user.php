<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
</head>

<body>
<div>
    <h1>Profile View</h1>
</div>

<p><a href="index.php">Retour</a></p>

<h3> <?= strtoupper($user->username) ?> (<?= $user->statut ?>) </li></h3>
    <ul>
        <li>Prénom <?= $user->prenom ?></li>
        <li>Nom : <?= $user->nom ?></li>
        <li>Statut : <?= $user->role ?></li>
    </ul>

        <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>
    
</div>
</body>
</html>
