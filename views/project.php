<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Project</title>
</head>

<body>
<div>
    <h1>Project View</h1>
    <p><a href="index.php">Retour</a></p>
</div>

<h3> <?= strtoupper($project->name) ?> (<?= $project->statutProject ?>) </li></h3>
    <ul>
        <li>Description : <?= $project->description ?></li>
        <li>Créé le <?= $project->dateCreation ?> par <a href="user.php?id=<?= $project->id_users ?>"><?= $creator->username ?></a></li>
    </ul>


<div>
    <h2>Groupe(s) assignés </h2>
        <?php foreach ($groupproj as $gj):
            $idGroup = $gj->id_groups;
            $groupID = getGroupInProject ($idGroup);
                foreach ($groupID as $detGroup): ?>
                    <ul>
                        <li><a href="group.php?id=<?= $detGroup->id ?>"><?= $detGroup->nameGroup ?></a></li>
                        <li><?= $detGroup->description ?></li>

                        <?php 
                            $idGroup = $detGroup->id;
                            $numberMember = countUsersInGroup ($idGroup)
                        ?>
                        <li>Nombre membres : <?= $numberMember->total ?></li>
                        <li><a href="group.php?id=<?= $detGroup->id ?>">[Ajouter des membres]</a></li>
                    </ul><hr>
                <?php endforeach;
         endforeach; ?>
</div><br/>



<div>
    <h2>Tâches</h2>
    <p>+ ADD TÂCHE ICI</p>
        <div class="card-body">
            <form action="project.php?id=<?= $project->id ?>" method="post">
                <p><label for="author">Title :</label><br/>
                <input type="text" name="title" id="title" class="form-control" value="<?php if (isset($title)) echo $title ?>" /></p>
                <p><label for="textTask">textTask :</label><br/>
                <textarea name="textTask" id="title" class="form-control" cols="30" rows="4"/><?php if (isset($textTask)) echo $textTask ?></textarea></p>
                <button type="submit" name="addtask">Ajouter</button> 
            </form>
        </div>

        <?php $TimeFinal = 0; $superhoras = 0 ?>

        <?php foreach ($tasks as $task): ?>
            <ul>
                <li><?= $task->id ?></li>
                <li><?= $task->title ?></li>
                <li><?= $task->textTask ?></li>
                <li><?= $task->date ?></li>

                <li>
                <?php
                    $takenornot = $task->statutTask;
                    if ($takenornot == "takable"){
                ?>
                <form action="project.php?id=<?= $project->id ?>" method="post">
                    <button type="submit" name="startTask" value="<?= $task->id ?>">Start</button>
                    </form><?php } else { ?>
                <form action="project.php?id=<?= $project->id ?>" method="post">
                    <button type="submit" name="stopTask" value="<?= $task->id ?>">Stop</button>
                </form>
                    <?php } ?>
                </li>

                <?php
                    if(isset($_POST['startTask'])){
                        extract($_POST);
                        $errors = array();
                
                        $startTime = date("H:i:s");
                        $id_users = $_SESSION['id'];
                        $id_task = $_POST['startTask'];

                        $taskStart = startTaskTimeRecorded ($startTime, $id_users, $id_task);
                        $statutTask = "taken";
                        setTaken($statutTask, $id_task);
                        $success = 'Votre tâche démarre';

                        unset($startTime);
                        unset($id_users);
                        unset($id_task);
                        header("Refresh:0");
                    }

                    if(isset($_POST['stopTask'])){
                        extract($_POST);
                        $errors = array();
                
                        $stopTime = date("H:i:s");
                        $id_task = $_POST['stopTask'];

                        $taskStart = stopTaskTimeRecorded ($stopTime, $id_task);
                        $statutTask = "takable";
                        setTakable($statutTask, $id_task);
                        $success = 'Votre tâche a été stoppé';

                        unset($stopTime);
                        unset($id_task);
                        header("Refresh:0");
                    }

                    $idTaskk = $task->id;
                    $task_timerecorded = getAllTaskTimeRecorded($idTaskk);
                    //var_dump($task_timerecorded);
                    $totalintsec = 0;
                    foreach ($task_timerecorded as $detail):
                        $h1 = strtotime($detail->startTime);
                        $h2 = strtotime($detail->stopTime);
                        $Startsec = gmdate("U", $h2-$h1);
                        $intsec = intval($Startsec);
                        if ($intsec > 0){
                        $totalintsec = $totalintsec + $intsec;
                        }
                        $h1 = 0;
                        $h2 = 0;
                        $intsec = 0;
                        $Startsec = 0;
                    endforeach;

                    /* puis on traduit en secondes */
                    $horas = $totalintsec;
                    //var_dump($horas);

                    if ($horas > 0){
                    $TimeFinal = ConvertisseurTime ($horas);
                    }

                    $superhoras = $superhoras + $horas;
                ?>
                <li>Temps passé : <?= $TimeFinal ?></li>
            </ul><hr>
        <?php endforeach; ?>
        
        <?php $TimeFinalALL = ConvertisseurTime ($superhoras); ?>
    <div>
        <h2>Temps total sur ce projet : <?= $TimeFinalALL ?></h2>
    </div>
</div><br/>


<h2>+ Assigner groupe(s)</h2>
    <div class="card-body">
        <form action="project.php?id=<?= $project->id ?>" method="post">
            <label for="proj">Groupes :</label><br/>
            <select name="proj" id="proj" >
                <?php foreach ($groups as $groupo): ?>
                    <option value="<?= $groupo->id ?>"><?= $groupo->nameGroup ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="addgrouptoproject">Ajouter</button> 
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
