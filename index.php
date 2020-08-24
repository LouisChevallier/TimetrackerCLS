<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/projectModel.php';
require 'models/groupModel.php';

var_dump($_SESSION);
$users = getUsers();
$projects = getProjects();
$groups = getGroups();

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/homepage.php'; ?>

<?php include ("partials/footer.php"); ?>
