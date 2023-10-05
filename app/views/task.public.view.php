<?php


class TaskView {

    
    public function showUserList($tasks) {
        
        require './templates/header.phtml';
        ?>

        <ul class="list-group">
        <?php foreach($tasks as $task) { ?>
            <li class="list-group-item item-task <?php if($task->finalizada) echo 'finalizada' ?>">
                <div>
                    <b><?php echo $task->titulo ?></b> | (Prioridad <?php echo $task->prioridad ?>)
                </div>
                <div class="actions">
                    <?php if(!$task->finalizada) { ?> <a href="finalizar/<?php echo $task->id ?>" type="button" class='btn btn-success ml-auto'>Finalizar</a> <?php } ?>
                    <a href="eliminar/<?php echo $task->id ?>" type="button" class='btn btn-danger ml-auto'>Borrar</a>
                </div>
            </li>
        <?php } ?>
        </ul>

        <?php
        require './templates/footer.phtml';
    }

    public function showError($error) {
        require './templates/header.phtml';
        
        echo "
            <div class='alert alert-danger' role='alert'>
                $error
            </div> 
        ";
        require './templates/footer.phtml';
    }
}
