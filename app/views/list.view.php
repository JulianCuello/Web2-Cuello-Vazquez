<?php

class ListView {

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
                        <td><img src="<?php echo $item->imagenProducto; ?>"class="imagen"></td>
                        <td><?php echo $item->categoria; ?></td>
                        <td><a href="listId/<?php echo $item->idProducto; ?>" class="btn btn-primary">Ver Producto</a></td>
                    </tr>      
                <?php } ?>
            </tbody>
        </table>
        <?php
        require 'templates/footer.php';
    }
    
    public function showItemListById($list) {
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
                    <th>Material</th>
                    <th>Disponible</th>
                    <th>Motor</th>
                    <th>Imagen Categoría</th>
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
                        <td><img src="<?php echo $item->imagenProducto; ?>"class="imagen"></td>
                        <td><?php echo $item->categoria; ?></td>
                        <td><?php echo $item->material; ?></td>
                        <td><?php echo $item->disponible; ?></td>
                        <td><?php echo $item->motor; ?></td>
                        <td><img src="<?php echo $item->imagenCategoria; ?>"class="imagen"></td>
                        <td><a href="list" class="btn btn-primary">Volver</a></td>
                    </tr>      
                <?php } ?>
            </tbody>
        </table>
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
