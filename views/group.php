<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Group</title>
</head>

<body>
<div>
    <h1>Group View</h1>
</div>

<?php
    $idGroup = $group->id;
    $numberMember = countUsersInGroup($idGroup);
?>

<h3> <?= strtoupper($group->nameGroup) ?> (<?= $numberMember->total ?> membres)</li></h3>
    <ul>
                <li><a href="group.php?id=<?= $group->id ?>"><?= $group->nameGroup ?></a></li>
                <li><?= $group->description ?></li>
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
