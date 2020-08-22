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

<div>
    <h2>Tâches</h2>
    <a>+ Add tache ici</a>
        <div class="card-body">
            <form action="project.php?id=<?= $project->id ?>" method="post">
                <p><label for="author">Title :</label><br/>
                <input type="text" name="title" id="title" class="form-control" value="<?php if (isset($title)) echo $title ?>" /></p>
                <p><label for="textTask">textTask :</label><br/>
                <textarea name="textTask" id="title" class="form-control" cols="30" rows="8"/><?php if (isset($textTask)) echo $textTask ?></textarea></p>
                <button type="submit" name="addtask">Envoyer</button> 
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
