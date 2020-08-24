<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Démarrer un projet</title>
    </head>
    <body>
        <h1>Démarrer un projet</h1>

        <?php
        if(isset($success)){
            echo $success;
        }

        if(!empty($errors)):?>
            <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
            <?php  endforeach; ?>
        <?php endif; ?>


        <form action="add_project.php" method="post">
            <p><label for="name">Nom du projet :</label><br/>
            <input type="text" name="name" id="name" class="form-control" value="<?php if (isset($username)) echo $username ?>" /></p>

            <p><label for="description">Description :</label><br/>
                <textarea name="description" id="description" class="form-control" cols="30" rows="4"/><?php if (isset($textTask)) echo $textTask ?></textarea></p>
            
            <button type="submit" name="addproject">Créer</button> 
        </form><br/>


    </body>
</html>