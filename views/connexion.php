<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
<h1>Connexion</h1>

<?php
if(isset($success)){
    echo $success;
}

if(!empty($errors)):?>
    <?php foreach($errors as $error): ?>
        <p><?= $error ?></p>
    <?php  endforeach; ?>
<?php endif; ?>


<form action="connexion.php" method="post">
    <p><label for="username">Pseudo :</label><br/>
        <input type="text" name="username" id="username" class="form-control" value="<?php if (isset($username)) echo $username ?>" /></p>
    <p><label for="mdp">Mot de passe :</label><br/>
        <input type="password" name="mdp" id="mdp" class="form-control"/></p>
    <button type="submit">Se connecter</button>
</form><br/>


</body>
</html>
