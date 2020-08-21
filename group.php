<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';
require 'models/groupModel.php';

if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $group = getGroup($id);
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/group.php'; ?>

<?php include ("partials/footer.php"); ?>