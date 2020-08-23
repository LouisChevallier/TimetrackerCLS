<?php
// FONCTION QUI AMENE TOUS PROJETS
function getProjects ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI COMPTE NOMBRE TOTAL PROJETS
function countProjects ()
{
    $db = connect();

    $query = $db->prepare('SELECT COUNT(*) AS totalp FROM project');
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE 1 PROJET
function getProject ($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE id = ?');
    $query->execute(array($id));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else{
        header('Location:index.php');
    }
    $query->closeCursor();
}

// FONCTION QUI AMENE LE CREATOR D'UN PROJET
function getProjectCreator ($idCreator)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute(array($idCreator));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else{
        header('Location:index.php');
    }
    $query->closeCursor();
}