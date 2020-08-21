<?php

require 'models/database.php';
require 'models/userModel.php';

// On démarre la session
session_start ();

$is = 'offline';
updateDisconnect($is,$_SESSION['id']);
// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: index.php');
?>