<?php
// FONCTION QUI CONVERTIE DES SECONDE EN [HEURE MIN SEC]
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

    //$TimeFinal = "$heures h $minutes min $secondes2 s";
    $TimeFinal = "$heures h $minutes min";
    return $TimeFinal;
}

// FONCTION QUI AMENE TOUS TACHES
function getTasks ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM task ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AJOUTE UNE TACHE
function addTask ($title, $textTask, $date, $id_project)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO task (title, textTask, date, id_project) VALUES (?, ?, ?, ?)');
    $query->execute(array($title, $textTask, $date, $id_project));
    $query->closeCursor();
}



// TIME RECORDED//////////////////////////////////////////////////////////////////////////////////////////////////////////////

// FONCTION QUI AJOUTE UNE TACHE TIME RECORDED
function startTaskTimeRecorded ($startTime, $id_users, $id_task)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO task_timerecorded (startTime, stopTime, id_users, id_task) VALUES (?, NULL, ?, ?)');
    $query->execute(array($startTime, $id_users, $id_task));
    $query->closeCursor();
}

// FONCTION QUI UPDATE L'HEURE D'UNE TACHE TIME RECORDED
function stopTaskTimeRecorded ($stopTime, $idTask)
{
    $db = connect();

    $query = $db->prepare('UPDATE task_timerecorded SET stopTime = ? WHERE id_task = ? ORDER BY id DESC LIMIT 1');
    $query->execute(array($stopTime, $idTask));
    $query->closeCursor();
}

// FONCTION QUI SET L'ETAT D'UNE TACHE
function setTakable($statutTask, $id_task)
{
    $db = connect();

    $query = $db->prepare('UPDATE task SET statutTask = ? WHERE id = ?');
    $query->execute(array($statutTask, $id_task));
    $query->closeCursor();
}
function setTaken($statutTask, $id_task)
{
    $db = connect();

    $query = $db->prepare('UPDATE task SET statutTask = ? WHERE id = ?');
    $query->execute(array($statutTask, $id_task));
    $query->closeCursor();
}

// FONCTION QUI RECUPERE TOUTES [TACHES TIME RECORDED] D'UNE TACHE
function getAllTaskTimeRecorded ($idTaskk)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM task_timerecorded WHERE id_task = ?');
    $query->execute(array($idTaskk));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}