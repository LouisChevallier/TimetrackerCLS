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

    $query = $db->prepare('SELECT COUNT(*) FROM project');
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

// FONCTION QUI AJOUTE UN PROJET
function addPost ($title, $content, $idCategory, $idUser)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO project (title, content, date, idCategory, idUser) VALUES (?, ?, NOW(), ?, ?)');
    $query->execute(array($title, $content, $idCategory, $idUser));
    $query->closeCursor();
}

// FONCTION QUI SUPPRIME UN PROJET
function deletePost ($deleteId)
{
    $db = connect();

    $query = $db->prepare('DELETE FROM project WHERE id = ?');
    $query->execute(array($deleteId));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI UPDATE UN POST
function updatePost ($title, $content, $idCategory, $idPost)
{
    $db = connect();

    $query = $db->prepare('UPDATE project SET title = ?, content = ?, idCategory = ? WHERE id = ?');
    $query->execute(array($title, $content, $idCategory, $idPost));
    $query->closeCursor();
}

// FONCTION QUI AMENE TOUS PROJETS D'UN USER PARTICULIER
function getMyPosts ($idUser)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE idUser = ?');
    $query->execute(array($idUser));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI SUPPRIME LES PROJETS QUAND UN USER EST SUPPRIMÉE
function deletePostsBeforeCat ($deleteIdCat)
{
    $db = connect();

    $query = $db->prepare('DELETE FROM project WHERE idCategory = ?');
    $query->execute(array($deleteIdCat));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}


// FONCTION QUI AMENE TOUS PROJETS D'UN GROUP
function getCatPosts ($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM project WHERE idCategory = ?');
    $query->execute(array($id));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}