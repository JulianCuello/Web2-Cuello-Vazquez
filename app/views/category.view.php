<?php

    class CategoryView{


    function showCategories($categorias){
        require 'templates/header.php';

        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Material</th>
                    <th>Disponible</th>
                    <th>Motor</th>
                    <th>Imagen Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categorias as $item) { ?>      
                    <tr>
                        <td><?php echo $item->categoria; ?></td>
                        <td><?php echo $item->material; ?></td>
                        <td><?php echo $item->disponible; ?></td>
                        <td><?php echo $item->motor; ?></td>
                        <td><img src="<?php echo $item->imagenCategoria; ?>"class="imagen"></td>
                        <td><a href="categoryId/<?php echo $item->idCategoria; ?>">Productos relacionados</a></td>
                    </tr>      
                <?php } ?>
            </tbody>
        </table>
        <?php
        require 'templates/footer.php';
    }
    function showItemsCategoriesById($categorias){
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
                <?php foreach($categorias as $item) { ?>      
                    <tr>
                        <td><?php echo $item->idCodigoProducto; ?></td>
                        <td><?php echo $item->nombreProducto; ?></td>
                        <td><?php echo $item->precio; ?></td>
                        <td><?php echo $item->marca; ?></td>
                        <td><?php echo $item->imagenProducto; ?></td>
                        <td><?php echo $item->categoria; ?></td>
                            
                        <td><a href="category">Volver</a></td>
                    </tr>      
                <?php } ?>
            </tbody>
        </table>
        <?php
        require 'templates/footer.php';
    }
}