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

// FONCTION QUI AJOUTE UN GROUP
function addGroup ($nameGroup, $description)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO groups (nameGroup, description) VALUES (?, ?)');
    $query->execute(array($nameGroup, $description));
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

// FONCTION QUI RECUPERE LES ID DES USERS D'UN GROUP
function getIdUserInGroup ($idGroupp)
{
    $db = connect();
    $req = "SELECT * FROM groups_member WHERE id_groups = ". $idGroupp ." ;";
    $query = $db->prepare($req);
    $query->execute(array($idGroupp));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI RECUPERE LES NO ID DES USERS D'UN GROUP
function getNoIdUserInGroup ($idGrouppNo)
{
    $db = connect();
    $req = "SELECT id_users FROM groups_member WHERE NOT id_groups = ". $idGrouppNo ." ;";
    $query = $db->prepare($req);
    $query->execute(array($idGrouppNo));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI VERIFIE SI USER EXISTE AVEC LES NO ID
function getNoIdUserInGroupVerify ($idUserGrouppNo)
{
    $db = connect();
    $req = "SELECT * FROM users WHERE id = ". $idUserGrouppNo ." ;";
    $query = $db->prepare($req);
    $query->execute(array($usernameingroup));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}


// FONCTION QUI RECUPERE LES USERNAME DES USERS D'UN GROUP
function getUsernameInGroup ($idUserr)
{
    $db = connect();
    $req = "SELECT * FROM users WHERE id = ". $idUserr ." ;";
    $query = $db->prepare($req);
    $query->execute(array($idUserr));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AJOUTE UN USER AU GROUP
function addUserToAGroup ($idaddeduser,$idGroupp)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO groups_member (id_groups, id_users) VALUES (?, ?)');
    $query->execute(array($idaddeduser, $idGroupp));
    $query->closeCursor();
}

// FONCTION QUI AJOUTE UN USER AU GROUP
function addGroupToAProject ($idGroupp,$idProj)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO project_groupmember (id_groups, id_project) VALUES (?, ?)');
    $query->execute(array($idGroupp, $idProj));
    $query->closeCursor();
}


// FONCTION QUI AMENE LES GROUPES D'UN PROJET
function getGroupsWorkingonProject($idProj)
{
    $db = connect();
    $req = "SELECT * FROM project_groupmember WHERE id_project = ". $idProj ." ;";
    $query = $db->prepare($req);
    $query->execute(array($idProj));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE 1 GROUP
function getGroupInProject ($idGroup)
{
    $db = connect();
    $req = "SELECT * FROM groups WHERE id = ". $idGroup ." ;";
    $query = $db->prepare($req);
    $query->execute(array($idGroup));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}