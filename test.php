<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/groupModel.php';
require 'models/taskModel.php';



    $users = getUsers();




    $idGroupp = 1;
    $idGroupp = getIdUserInGroup($idGroupp);
    var_dump($idGroupp);
    $result = $idGroupp->id_users;
    var_dump($result);


    $idGrouppNo = $group->id;
    $idGrouppNoRes = getNoIdUserInGroup($idGrouppNo);
    var_dump($idGrouppNoRes);
    
?>

<?php foreach ($idGroupp as $task): ?>
            <ul>
                <li><?= $task->title ?>tt</li>
            </ul>
                <?php endforeach; ?>


<!-- Pour recuperer les nom qui sont pas dans le groupe actuel -->
                <h2>+ Add membres ici</h2>
    <div class="card-body">
        <form action="group.php?id=<?= $group->id ?>" method="post">
            <label for="groupName">Utilisateur :</label><br/>
            <select name="utilisateur" id="utilisateur" >
                <?php foreach ($idGrouppNoRes as $userno):
                    $idUserGrouppNo = $userno->id_users;
                    $usernameingroup = getNoIdUserInGroupVerify ($idUserGrouppNo);
                        foreach ($usernameingroup as $detail): ?>
                            <option value="<?= $userno->id_users ?>"><?= $userno->id_users ?></option>
                        <?php endforeach;
                    endforeach; ?>
            </select>
            <button type="submit" name="addusertoagroup">Ajouter</button> 
        </form>
    </div>