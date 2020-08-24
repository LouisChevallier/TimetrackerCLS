<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/groupModel.php';
require 'models/projectModel.php';


if(isset($_POST['addproject'])){
        extract($_POST);
        $errors = array();

        $name = strip_tags($name);
        $description = strip_tags($description);
        $dateCreation = date("Y-m-d");
        $statut = "In progress";
        $statutProject = strip_tags($statut);
        $idCreator = $_SESSION['id'];

        if(empty($name)){
            array_push($errors, 'Entrez un nom de projet');
        }
        if(empty($description)){
            array_push($errors, 'Entrez une description');
        }
        if(count($errors) == 0){
            $projectadded = addProject($name, $description, $dateCreation, $statutProject, $idCreator);

            $success = 'Le projet a été créé';
            unset($name);
            unset($description);

            $projectcreated = getProjectCreated($idCreator);
            foreach ($projectcreated as $lid):
                $lidd = $lid->id;
            endforeach;
            echo '<a href="project.php?id='.$lidd.'">Accèdez au projet !</a> Et assignez un groupe de travail au projet et commencer à créer des tâches dès maintenant';
        }
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/add_project.php'; ?>

<?php include ("partials/footer.php"); ?>