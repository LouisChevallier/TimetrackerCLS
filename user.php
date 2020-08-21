<?php
session_start();

require 'models/database.php';
require 'models/userModel.php';

if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $user = getUser($id);
}

?>

<?php include ("partials/header.php"); ?>

<?php require 'views/user.php'; ?>

<?php include ("partials/footer.php"); ?>