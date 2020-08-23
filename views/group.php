<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Group</title>
</head>

<body>
<div>
    <h1>Group View</h1>
    <p><a href="groups.php">Retour</a></p>
</div>

<?php 
    $idGroupp = $group->id;
    $idGroupp = getIdUserInGroup($idGroupp);

    $idGrouppNo = $group->id;
    $idGrouppNoRes = getNoIdUserInGroup($idGrouppNo);
?>

<h3> <?= strtoupper($group->nameGroup) ?></h3>
    <ul>
                <li><a href="group.php?id=<?= $group->id ?>"><?= $group->nameGroup ?></a></li>
                <li><?= $group->description ?></li>
                <li>Nombre membres : <?= $numberMember->total ?></li>
    </ul><br/>

<div>
    <h2>Membres</h2>
        <ul>
            <?php foreach ($idGroupp as $user):
                $idUserr = $user->id_users;
                $usernameingroup = getUsernameInGroup ($idUserr);
                    foreach ($usernameingroup as $detail): ?>
                        <li><a href="user.php?id=<?= $user->id_users ?>"><?= $detail->username ?></a></li>
                    <?php endforeach;
                endforeach; ?>
        </ul>
</div>
    
<h2>+ Add membres ici</h2>
    <div class="card-body">
        <form action="group.php?id=<?= $group->id ?>" method="post">
            <label for="groupName">Utilisateur :</label><br/>
            <select name="utilisateur" id="utilisateur" >
                <?php foreach ($users as $userno):
                    $idUserr = $userno->id;
                    $usernamerecup = getUsernameInGroup ($idUserr);

                        foreach ($usernamerecup as $detail): ?>
                                <option value="<?= $userno->id ?>"><?= $detail->username ?></option>
                        <?php endforeach; 
                endforeach; ?>
            </select>
            <button type="submit" name="addusertoagroup">Ajouter</button> 
        </form>
    </div>


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
