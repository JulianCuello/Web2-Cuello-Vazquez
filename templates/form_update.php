<?php function showFormUpdate($idProducto){
    
    require_once 'templates/header.php';  ?>
    <body>
    <div class="container mt-5">
        <h2>Modificacion de Producto</h2>
        <form action="update" method="POST">
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select" id="categoria" name="idCategoria">
                    <option value="1">motor</option>
                    <option value="2">carroceria</option>
                    <option value="3">suspension</option>
                    <option value="4">refrigeracion</option>
                    <option value="5">frenos</option>
                    <option value="6">iluminacion</option>
                    <option value="7">interior</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="idProducto" class="form-label">ID Producto</label>
                <input type="text" class="form-control" id="idProducto" name="idProducto" value="<?php echo $idProducto?>">
            </div>
            <div class="mb-3">
                <label for="idCodigoProducto" class="form-label">Código de Producto</label>
                <input type="text" class="form-control" id="idCodigoProducto" name="idCodigoProducto">
            </div>
            <div class="mb-3">
                <label for="nombreProducto" class="form-label">Nombre de Producto</label>
                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio">
            </div>
            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca">
            </div>
            <div class="mb-3">
                <label for="imagenProducto" class="form-label">URL de la Imagen</label>
                <input type="text" class="form-control" id="imagenProducto" name="imagenProducto">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>

    <?php

    require_once 'templates/footer.php'; 

 }