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


<?php

ini_set('date.timezone', 'Europe/Berlin');

function ConvertisseurTime($Time){
    if($Time < 3600){
        $heures = 0;

        if($Time < 60){$minutes = 0;}
        else{$minutes = round($Time / 60);}

        $secondes = floor($Time % 60);
    }
    else{
        $heures = round($Time / 3600);
        $secondes = round($Time % 3600);
        $minutes = floor($secondes / 60);
    }

    $secondes2 = round($secondes % 60);

    $TimeFinal = "$heures h $minutes min $secondes2 s";
    return $TimeFinal;
}


$h1 = strtotime("13:00:00");
$h2 = strtotime(date("H:i:s"));
$Start = gmdate("H:i", $h2-$h1);
$Startsec = gmdate("U", $h2-$h1);

$int1 = intval($Startsec);
$int2 = intval($Startsec) + 40000;

var_dump($h1);
var_dump($Start);
var_dump($Startsec);
var_dump($int2);

$horas = $int1 + $int2;

echo ConvertisseurTime ($horas);
?>
