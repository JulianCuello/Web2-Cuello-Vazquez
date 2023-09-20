<?php
require_once 'app/db.php';

function showRepuestos(){
    require_once 'templates/header.php';

    $repuestos=getTasks();
    
    foreach($repuestos as $repuesto){
        echo "<li>$repuesto->idProducto</li>";
    }

}