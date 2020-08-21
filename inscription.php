<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';

if(!empty($_POST)){
    extract($_POST);
    $errors = array();

    $username = strip_tags($username);
    $prenom = strip_tags($prenom);
    $nom = strip_tags($nom);
    $mdp = strip_tags($mdp);
    $mdp2 = strip_tags($mdp2);

    if(empty($username)){
        array_push($errors, 'Entrez un pseudo');
    }
    if(empty($mdp)){
        array_push($errors, 'Entrez un mot de passe');
    }
    if($mdp !== $mdp2){
        array_push($errors, 'Le mot de passe confirmé est différent');
    }
    else{
        $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);
    }

    if(count($errors) == 0){

        $dispo = verifyDispo($username);
        if(empty($dispo)){
            $role = 'membre';
            $statut = 'offline';
            $newUser = addUser($username, $prenom, $nom, $hashMdp, $role, $statut);

            $success = 'Inscription réussie !';

            unset($username);
            unset($mdp);
        }
        else{
            array_push($errors, 'Ce pseudo n\'est pas disponible');
        }
    }
}
?>

<?php include("partials/header.php"); ?>

<?php require 'views/inscription.php'; ?>

<?php include("partials/footer.php"); ?>

