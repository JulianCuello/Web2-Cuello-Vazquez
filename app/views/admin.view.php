<?php

class AdminView {

    public function showItemList($list) {
        require 'templates/header.php';        
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Código Producto</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Imagen Producto</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $item) { ?>      
                    <tr>
                        <td><?php echo $item->idCodigoProducto; ?></td>
                        <td><?php echo $item->nombreProducto; ?></td>
                        <td><?php echo $item->precio; ?></td>
                        <td><?php echo $item->marca; ?></td>
                        <td><?php echo $item->imagenProducto; ?></td>
                        <td><?php echo $item->categoria; ?></td>
                        <td>
                            <a href="listId/<?php echo $item->idProducto; ?>" class="btn btn-primary">Ver Producto</a>
                            <a href="removeItem/<?php echo $item->idProducto; ?>" type="button" class='btn btn-danger ml-auto'>Eliminar</a>
                            <a href="updateItem/<?php echo $item->idProducto; ?>" type="button" class='btn btn-success ml-auto'>Modificar</a>

                        </td>
                        </tr>      
                <?php } ?>
            </tbody>
        </table>
        <?php
        require 'templates/footer.php';
    }

}