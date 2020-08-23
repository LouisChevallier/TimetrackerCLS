<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Homepage</title>
</head>

<body>
<div>
    <h1>Homepage View</h1>
    <p>En construction</p>

<div>
    <h2>Parcourir les users</h2>
        <ul>
            <?php foreach ($users as $user): ?>
                        <li><a href="user.php?id=<?= $user->id ?>"><?= $user->username ?></a></li>
            <?php endforeach; ?>
        </ul>
</div><br/>

<div>
    <h2>Parcourir les projets</h2>
        <?php foreach ($projects as $projet): ?>
            <ul>
                <li><a href="project.php?id=<?= $projet->id ?>"><?= $projet->name ?></a></li>
                <li><?= $projet->description ?></li>
                <li><?= $projet->dateCreation ?></li>
                <li><?= $projet->statutProject ?></li>
                
                <?php 
                    $idCreator = $projet->id_users;
                    $creator = getProjectCreator($idCreator);
                ?>
                <li>Créé par <a href="user.php?id=<?= $projet->id_users ?>"><?= $creator->username ?></a></li>
            </ul><hr>
        <?php endforeach; ?>
</div><br/>
    
</div>
</body>
</html>
