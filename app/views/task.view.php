<?php

class TaskView {


    public function showUserList($tasks) {
        require 'templates/header.php';

        
        ?>

        <ul class="list-group">
        <?php foreach($tasks as $task) { ?>
        
             <li><a href="listarId/<?php echo $task->idProducto?>">Ver Producto</a><?php echo "$task->idCodigoProducto| $task->nombreProducto | $task->precio | $task->marca |$task->imagenProducto | $task->idCategoria | $task->ubicacion | $task->material |$task->disponible | $task->motor | $task->imagenCategoria "?></li>
                
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

    function showCategories($categorias){
        require 'templates/header.php';

        ?>

        <ul class="list-group">
        <?php foreach($categorias as $categoria) { ?>
        
             <li><a href="categoriaId/<?php echo $categoria->idCategoria?>">Ver Productos relacionados</a><?php echo "| $categoria->ubicacion | $categoria->material | $categoria->disponible |$categoria->motor|$categoria->imagenCategoria "?></li>
                
        <?php } ?>
        </ul>

        <?php
        require 'templates/footer.php';
    }
    function showCategoriesById($categorias){
        require 'templates/header.php';

        ?>

        <ul class="list-group">
        <?php foreach($categorias as $categoria) { ?>
        
             <li><a href="categoria">Volver</a><?php echo "| $categoria->ubicacion | $categoria->material | $categoria->disponible |$categoria->motor|$categoria->imagenCategoria "?></li>
                
        <?php } ?>
        </ul>

        <?php
        require 'templates/footer.php';
    }

    public function showUserLista($tasks) {
        require 'templates/header.php';

        
        ?>

        <ul class="list-group">
        <?php foreach($tasks as $task) { ?>
        
             <li><a href="listarId/<?php echo $task->idProducto?>">Ver Producto</a><?php echo "$task->idCodigoProducto| $task->nombreProducto | $task->precio | $task->marca |$task->imagenProducto | $task->idCategoria "?></li>
                
        <?php } ?>
        </ul>

        <?php
        require 'templates/footer.php';
    }

}
