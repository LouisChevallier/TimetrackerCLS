<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Project</title>
</head>

<body>
<div>
    <h1>Project View</h1>
</div>

<h3> <?= strtoupper($project->name) ?> (<?= $project->statutProject ?>) </li></h3>
    <ul>
        <li>Description : <?= $project->description ?></li>
        <li>Créé le <?= $project->dateCreation ?> par <a href="user.php?id=<?= $project->id_users ?>"><?= $creator->username ?></a></li>
    </ul>

                
                <p><a href="index.php">Retour</a></p>
        <br/><br/><br/>

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
