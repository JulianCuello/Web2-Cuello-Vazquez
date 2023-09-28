<?php

class TaskView {


    public function showUserList($tasks) {
        require 'templates/header.php';

        
        ?>

        <ul class="list-group">
        <?php foreach($tasks as $task) { ?>
        
             <li><a href="listarId/<?php echo $task->idProducto?>">Ver Producto</a><?php echo "| $task->nombreProducto | $task->precio | $task->marca |$task->imagenProducto | $task->idCategoria | $task->ubicacion | $task->material |$task->disponible | $task->motor | $task->imagenCategoria "?></li>
                
        <?php } ?>
        </ul>

        <?php
        require 'templates/footer.php';
    }

    public function showError($error) {
        require 'templates/header.php';
        
        echo "
            <div class='alert alert-danger' role='alert'>
                $error
            </div> 
        ";
        require 'templates/footer.php';
    }
}
