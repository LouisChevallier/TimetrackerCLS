<?php
// FONCTION QUI AMENE TOUS POSTS
function getUsers ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

function getUser ($idUser)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute(array($idUser));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}

// FONCTION QUI AJOUTE UN USER
function addUser ($username, $prenom, $nom, $hashMdp, $role, $statut)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO users (username, prenom, nom, password, role, statut) VALUES (?, ?, ?, ?, ?, ?)');
    $query->execute(array($username, $prenom, $nom, $hashMdp, $role, $statut));
    $query->closeCursor();
}

// FONCTION QUI PERMET DE SE CONNECTER
function getConnect ($username)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute(array($username));
    if($query->rowCount() > 0) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}

function updateConnect ($is, $id)
{
    $db = connect();

    $query = $db->prepare('UPDATE users SET statut = ? WHERE id = ?');
    $query->execute(array($is, $id));
    $query->closeCursor();
}
function updateDisconnect ($is, $id)
{
    $db = connect();

    $query = $db->prepare('UPDATE users SET statut = ? WHERE id = ?');
    $query->execute(array($is, $id));
    $query->closeCursor();
}

function verifyDispo ($username)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute(array($username));
    if($query->rowCount() > 0) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}