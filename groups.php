<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/groupModel.php';


$groups = getGroups();

if(!empty($_POST)){
    extract($_POST);
    $errors = array();
    var_dump($_POST);

    $nameGroup = $_POST["groupName"];
    $nameGroup = strip_tags($nameGroup);
    $description = $_POST["description"];
    $description = strip_tags($description);

    if(empty($nameGroup)){
        array_push($errors, 'Entrez un nom de groupe');
    }
    if(empty($description)){
        array_push($errors, 'Entrez une description');
    }

    if(count($errors) == 0){

    $addGroup = addGroup ($nameGroup, $description);
    $success = 'Votre groupe est créé';

    unset($nameGroup);
    unset($description);
    header("Refresh:0");
    }
}
?>

<?php include ("partials/header.php"); ?>

<?php require 'views/groups.php'; ?>

<?php include ("partials/footer.php"); ?>