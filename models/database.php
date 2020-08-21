<?php

const DATABASE_CONFIG = [
    'host' => 'localhost',
    'database' => 'timetracker',
    'user' => 'root',
    'password' => 'root'
];

function connect ()
{
    try {
        return new PDO(
            sprintf('mysql:host=%s;dbname=%s', DATABASE_CONFIG['host'], DATABASE_CONFIG['database']),
            DATABASE_CONFIG['user'],
            DATABASE_CONFIG['password']
        );
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
}
