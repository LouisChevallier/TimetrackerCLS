<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/projectModel.php';
require 'models/taskModel.php';
require 'models/groupModel.php';


if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $project = getProject($id);

    $idCreator = $project->id_users;
    $creator = getProjectCreator($idCreator);

    $idProject = $id;
    $tasks = getTasks($idProject);

    $groups = getGroups();

    $idProj = $project->id;
    $groupproj = getGroupsWorkingonProject($idProj);

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

    if(isset($_POST['addgrouptoproject'])){
        extract($_POST);
        $errors = array();

        $idProj = $project->id;
        $idGroupp = strip_tags($proj);
        var_dump($idProj);
        var_dump($idGroupp);

        if(empty($idGroupp)){
            array_push($errors, 'Choisir un groupe');
        }
        if(count($errors) == 0){
            $groupaddedtoproject = addGroupToAProject($idGroupp, $idProj);

            $success = 'Le groupe a été ajouté au projet';
            unset($idProj);
            unset($$idGroupp);

            header("Refresh:0");
        }
    }
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/project.php'; ?>

<?php include ("partials/footer.php"); ?>