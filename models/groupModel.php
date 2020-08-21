<?php
// FONCTION QUI AMENE TOUS GROUPS
function getGroups ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM groups ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI COMPTE NOMBRE TOTAL GROUPS
function countGroups ()
{
    $db = connect();

    $query = $db->prepare('SELECT COUNT(*) FROM groups');
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE 1 GROUP
function getGroup ($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM groups WHERE id = ?');
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

// FONCTION QUI COMPTE NOMBRE USERS TOTAL DANS 1 GROUP
function countUsersInGroup ($idGroup)
{
    $db = connect();

    $query = $db->prepare('SELECT COUNT(*) AS total FROM groups_member WHERE id_groups = ?');
    $query->execute(array($idGroup));
    $data = $query->fetch(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}