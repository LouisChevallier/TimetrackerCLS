<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Groups</title>
</head>

<body>

<?php
if(isset($success)){
    echo $success;
}
if(!empty($errors)):?>
    <?php foreach($errors as $error): ?>
    <p><?= $error ?></p>
    <?php  endforeach; ?>
<?php endif; ?>

<div>
    <h1>All Groups View</h1>
    <p><a href="index.php">Retour</a></p>
</div>

<div>
    <h2>Parcourir les Groupes</h2>
        <?php foreach ($groups as $group): ?>
            <ul>
                <li><a href="group.php?id=<?= $group->id ?>"><?= $group->nameGroup ?></a></li>
                <li><?= $group->description ?></li>

                <?php 
                    $idGroup = $group->id;
                    $numberMember = countUsersInGroup ($idGroup)
                ?>
                <li>Nombre membres : <?= $numberMember->total ?></li>
                <li><a href="group.php?id=<?= $group->id ?>">[Ajouter des membres]</a></li>
            </ul><hr>
        <?php endforeach; ?>
</div><br/>

<h2>Groupes</h2>
    <p>+ ADD GROUP ICI</p>
        <div class="card-body">
            <form action="groups.php" method="post">
                <p><label for="groupName">Nom de groupe :</label><br/>
                <input type="text" name="groupName" id="groupName" class="form-control" value="<?php if (isset($groupName)) echo $groupName ?>" /></p>
                <p><label for="description">Description :</label><br/>
                <textarea name="description" id="description" class="form-control" cols="30" rows="4"/><?php if (isset($description)) echo $description ?></textarea></p>
                <button type="submit" >Ajouter</button> 
            </form>
        </div>
    
</div>
</body>
</html>
