<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/projectModel.php';
require 'models/taskModel.php';

if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $project = getProject($id);

    $idCreator = $project->id_users;
    $creator = getProjectCreator($idCreator);

    $idProject = $id;
    $tasks = getTasks($idProject);

    if(isset($_POST['addtask'])){
        extract($_POST);
        $errors = array();

        ini_set('date.timezone', 'Europe/Berlin');
        $title = strip_tags($title);
        $textTask = strip_tags($textTask);
        $date = date("Y-m-d");
        
        $id_project = $id;

        if(empty($title)){
            array_push($errors, 'Entrez un titre');
        }
        if(empty($textTask)){
            array_push($errors, 'Décrivez la tâche');
        }
        if(count($errors) == 0){
            $taskadded = addTask($title, $textTask, $date, $id_project);

            $success = 'Votre tâche a été publié';
            unset($title);
            unset($textTask);
            unset($date);
            unset($idProject);

            header("Refresh:0");
        }
    }
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/project.php'; ?>

<?php include ("partials/footer.php"); ?>