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


    <?php

ini_set('date.timezone', 'Europe/Berlin');

function ConvertisseurTime($Time){
    if($Time < 3600){
        $heures = 0;

        if($Time < 60){$minutes = 0;}
        else{$minutes = round($Time / 60);}

        $secondes = floor($Time % 60);
    }
    else{
        $heures = round($Time / 3600);
        $secondes = round($Time % 3600);
        $minutes = floor($secondes / 60);
    }

    $secondes2 = round($secondes % 60);

    $TimeFinal = "$heures h $minutes min $secondes2 s";
    return $TimeFinal;
}


$h1 = strtotime("13:00:00");
$h2 = strtotime(date("H:i:s"));
$Start = gmdate("H:i", $h2-$h1);
$Startsec = gmdate("U", $h2-$h1);

$int1 = intval($Startsec);
$int2 = intval($Startsec) + 40000;

var_dump($h1);
var_dump($Start);
var_dump($Startsec);
var_dump($int2);

$horas = $int1 + $int2;

echo ConvertisseurTime ($horas);
?>
