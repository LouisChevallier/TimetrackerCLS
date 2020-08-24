<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/groupModel.php';

if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $group = getGroup($id);
    $users = getUsers();

    $idGroup = $group->id;
    $numberMember = countUsersInGroup($idGroup);


    if(isset($_POST['addusertoagroup'])){
        extract($_POST);
        $errors = array();

        $idaddeduser = strip_tags($utilisateur);
        $idGroupp = $group->id;
        var_dump($idaddeduser);
        var_dump($idGroupp);

        if(empty($idaddeduser)){
            array_push($errors, 'Choisir un utilisateur');
        }
        if(count($errors) == 0){
            $useradded = addUserToAGroup($idaddeduser, $idGroupp);

            $success = 'L\'utilisateur a été ajouté au groupe';
            unset($idaddeduser);
            unset($$idGroupp);

            header("Refresh:0");
        }
    }
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/group.php'; ?>

<?php include ("partials/footer.php"); ?>