<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/projectModel.php';

if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $project = getProject($id);

    $idCreator = $project->id_users;
    $creator = getProjectCreator($idCreator);
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/project.php'; ?>

<?php include ("partials/footer.php"); ?>