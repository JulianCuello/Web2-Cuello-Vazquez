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

    public function showCategory($categories) {
        require 'templates/header.php';        
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Ubicacion</th>
                    <th>Material</th>
                    <th>Disponible</th>
                    <th>Motor</th>
                    <th>Imagen Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $category) { ?>      
                    <tr>
                        <td><?php echo $item->ubicacion; ?></td>
                        <td><?php echo $item->material; ?></td>
                        <td><?php echo $item->disponible; ?></td>
                        <td><?php echo $item->motor; ?></td>
                        <td><?php echo $item->imagenCategoria; ?></td>
                       
                        <td>
                            <a href="categoryId/<?php echo $item->idCategory; ?>" class="btn btn-primary">Ver Producto</a>
                            <a href="removeCategory/<?php echo $item->idCategory; ?>" type="button" class='btn btn-danger ml-auto'>Eliminar</a>
                            <a href="updateCategory/<?php echo $item->idCategory; ?>" type="button" class='btn btn-success ml-auto'>Modificar</a>

                        </td>
                        </tr>      
                <?php } ?>
            </tbody>
        </table>
        <?php
        require 'templates/footer.php';
    }

}