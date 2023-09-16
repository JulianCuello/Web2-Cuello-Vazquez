<?php
require_once 'app/db.php';

function showRepuestos(){
    require_once 'templates/header.php';

    $repuestos=getTasks();
    var_dump($repuestos);
    die();

}